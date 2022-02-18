<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;
use Sentinel;
class ForgetPasswordController extends Controller
{
    
    public function resetFrom()
    {
        $data['passwordReset'] = view('form.password-reset');
        return view('form.layouts',$data);   
    }

    public function PostForgetPassword(Request $request)
    {
    	$user = User::whereEmail($request->email)->first();

    	if(count($user) == 0)
    		return redirect()->back()->with([
    			'success' => 'Reset code was sent to your email.'
    		]);

    	$reminder = Reminder::exists($user) ? : Reminder::create($user);

    	$this->sendEmail($user, $reminder->code);
    	return redirect()->back()->with([
    			'success' => 'Reset code was sent to your email.'
    		]);
    }

    private function sendEmail($user, $code)
    {
    	Mail::send('form.forgot-password',[
    		'user' => $user, 
    		'code' => $code
    	], function($message) use ($user) {
    		$message->to($user->email);
    		$message->subject("Hello $user->first_name, reset your password.");
    	});

    }

    public function resetPassword($email, $resetCode)
    {
    	$user = User::byEmail($email);

    	if(count($user) == 0)
    		abort(404);

	    if($reminder = Reminder::exists($user)){
	    	if($resetCode == $reminder->code){
	    		$view['resetPasswordForm'] = view('form.reset-passwordform');
	    		return view('form.layouts',$view);
	    	}
	    	else
	    		return redirect('/');
	    }else{
	    	return redirect('/');
	    }
    }

    public function PostResetPassword(Request $request, $email, $resetCode)
    {
    	$request->validate([
		    'password' => 'required|min:6|confirmed',
		]);

		$user = User::byEmail($email);

		if(count($user) == 0)
			abort(404);
		if($reminder = Reminder::exists($user)){
			if($resetCode == $reminder->code){
				Reminder::complete($user, $resetCode, $request->password);
				return redirect('/login')->with('success', 'Please login with your new password.');
			}else
			return redirect('/');
		}else{
			return redirect('/');
		}
    }
}
