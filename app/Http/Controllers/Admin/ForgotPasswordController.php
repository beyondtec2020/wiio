<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Password;
use App\User;
use Illuminate\Http\Request;
use App\TraitsFolder\CommonTrait;

class ForgotPasswordController extends Controller {

    use CommonTrait;
    use SendsPasswordResetEmails;

    public function __construct() {

    }

    public function showLinkRequestForm() {
        return view('form.password-reset');
    }

    public function sendResetLinkEmail(Request $request) {
        $this->validateEmail($request);

        $user = User::whereEmail($request->email)->first();

        if ($user->count() == 0) {
            $notification =  array(
                'message' => 'We can\'t find a user with that e-mail address.',
                'alert-type' => 'warning',
            );
            return redirect()->back()->with($notification);
        } else {
            $general = GeneralSetting::first();

            Config::set('mail.from', $general->office_email);
            Config::set('mail.name', $general->title);

            $route = 'admin.password.reset';

            $this->userPasswordReset($user->email, $user->first_name, $route);

            $notification =  array(
                'message' => 'Password Reset Link Send Your E-mail',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }
}
