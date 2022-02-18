<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use App\UserAPI;
// use Cartalyst\Sentinel\Laravel\Facades\Activation;
use App\Http\Controllers\UserRegisterController;

use Validator;
use Activation;
use Reminder;

class UserAuthController extends Controller {
  protected $apiGuard = 'api';

  public function login(Request $request) {
    $validator = Validator::make(request(['email', 'password']), [
      'email' => 'required',
      'password' => 'required|min:numeric',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'message' => 'Password and Email is required'
      ],403);
    }

    $credentials = request(['email', 'password']);

    if (!$token = auth($this->apiGuard)->setTTL(1400)->attempt($credentials)) {
      return response()->json([
        'status' => false,
        'error' => 'Unauthorized'
      ], 401);
    }

    $user = auth($this->apiGuard)->user();

    if (Sentinel::findUserById($user->id)->roles()->first()->slug == 'user') {
      return $this->respondWithToken($token);
    } else {
      auth($this->apiGuard)->logout();
      return response()->json([
        'status' => false,
        'error' => 'Unauthorized'
      ], 401);
    }
  }

  public function socialLogin($social_account, Request $request) {
    if ($social_account == 'fb') {
      $req_social = 'facebook_id';
    } else {
      $req_social = 'google_id';
    }

    $validator = Validator::make($request->all(), [
      $req_social => 'required',
      'first_name' => 'required',
      'last_name' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'message' => $validator->errors()
      ], 422);
    }

    $registered_user_query = UserAPI::query()->where($req_social,$request->$req_social);

    if ($request->has('email') && $request->email != '' &&  $request->email != null ) {
      $registered_user_query->orWhere('email', $request->email);
    }

    $registered_user = $registered_user_query->first();

    if (!empty($registered_user)) {
      $registered_user->$req_social = $request->$req_social;
      if ($request->has('email') && $request->email != '' &&  $request->email != null) {
        $registered_user->email = $request->email;
      }
      $registered_user->save();

      $user = $registered_user;
    } else {
      $new_user = UserAPI::create([
        'email' => ($request->has('email') && $request->email != '' && $request->email != null) ? $request->email : null,
        'first_name' => ($request->has('first_name') && $request->first_name != '' &&  $request->first_name != null) ? $request->first_name : null,
        'last_name' => ($request->has('last_name') && $request->last_name != '' &&  $request->last_name != null ) ? $request->last_name : null,
        $req_social => $request->$req_social
      ]);

      $user_1 = Sentinel::findById($new_user->id);

      $activation = Activation::create($user_1);

      $user_1->roles()->attach(3);

      //add mailchimp
      if (isset($user_1->id) && $user_1->email != null) {
        $uRC = new UserRegisterController();
        $uRC->addToMailchimpSubscription($request);
      }

      $user = $new_user;
    }

    $token = auth($this->apiGuard)->setTTL(1400)->login($user);

    $loggedin_user = auth($this->apiGuard)->user();

    if (Sentinel::findUserById($loggedin_user->id)->roles()->first()->slug == 'user') {
      return $this->respondWithToken($token);
    } else {
      auth($this->apiGuard)->logout();
      return response()->json(['status'=>false,'error' => 'Unauthorized'], 401);
    }
  }

  protected function respondWithToken($token) {
    return response()->json([
      'status' => true,
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth($this->apiGuard)->factory()->getTTL() * 60
    ]);
  }
}
