<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
// use Cartalyst\Support\Validator;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\TraitsFolder\CommonTrait;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class UserController extends Controller
{
    use CommonTrait;
    use SendsPasswordResetEmails;

    public function userDetail(Request $request){

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        return response()->json(compact('user'));

    }

    public function updateProfile(Request $request){

        if(!JWTAuth::parseToken()->authenticate()){
            return response()->json(['success'=>'false','message'=>'Unaunthicated'],403);
        }

        $id = $request->user_id;

        if(JWTAuth::parseToken()->authenticate()->id == $id){
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $phone = $request->phone;

            $user = JWTAuth::parseToken()->authenticate();

            $user->update(['first_name'=>$first_name, 'last_name'=>$last_name, 'phone'=> $phone]);

            return response()->json(['status'=>true,'user'=>$user]);
        }else{
            return response()->json(['status'=>false]);
        }
    }

    public function updatePass(Request $request){
        $user = JWTAuth::parseToken()->authenticate();

        if(!$user){
            return response()->json(['success'=>'false','message'=>'Unaunthicated'],403);
        }

        $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>false,'message'=>$validator->errors()],422);
        }
        $hasher = Sentinel::getHasher();
        $oldPassword = $request->old_password;
        $password = $request->password;
        $passwordConf = $request->password_confirmation;

        if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
            return response()->json(['status'=>false,'message'=>'Password Donot match !!.']);
        }

        Sentinel::update($user->id, array('password' => $password));
        return response()->json(['status'=>true,'message'=>'Password Updated !!.']);
    }

    public function sendResetLinkEmail(Request $request) {
        $this->validateEmail($request);

        $user = User::whereEmail($request->email)->first();

        if (empty($user)) {
            $notification =  array(
                'message' => 'We can\'t find a user with that e-mail address.',
                'alert-type' => 'warning',
            );
        } else {
            $route = 'admin.password.reset';

            $this->userPasswordReset($user->email, $user->first_name, $route);

            $notification =  array(
                'message' => 'Password Reset Link Send Your E-mail',
                'alert-type' => 'success',
            );
        }

        return response()->json($notification);
    }
}
