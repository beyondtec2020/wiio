<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Controllers\UserRegisterController;

class UserRegisterApiController extends Controller
{
    //

    public function regiUser(Request $request){

        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
            
        if ($validator->fails()) {
            return response()->json(['status'=>false,'message'=>$validator->errors()],422);
        }

        $user = Sentinel::registerAndActivate($request->all());

        // $roleforUser = Sentinel::findUserById(1);
        $user->roles()->attach(3);

        //add mailchimp
        if(isset($user->id)){
            $uRC = new UserRegisterController();    
            $uRC->addToMailchimpSubscription($request);

            return response()->json(['status'=>true,'message'=>'Success']);
        }
        
    }
}
