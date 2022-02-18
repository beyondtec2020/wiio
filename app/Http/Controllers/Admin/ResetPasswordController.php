<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest:admin');
    }

    public function showResetForm(Request $request, $token = null)
    {
        $request->email = '';
        return view('form.reset-passwordform')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    


    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $user = User::whereEmail($request->email)->first();
        if(!$user)
        {

            $notification =  array(
                'message' => 'Email don\'t match!!', 
                'alert-type' => 'warning', 
            );
            return redirect()->back()->with($notification);
        }
        $user->password = bcrypt($request->password);
        $user->save();

            $notification =  array(
                'message' => 'Successfully Password Reset.', 
                'alert-type' => 'success', 
            );
            return redirect('/login')->with($notification);
    }

}
