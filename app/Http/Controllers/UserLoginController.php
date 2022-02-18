<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use Session;

class UserLoginController extends Controller
{
    public function index()
    {
        $data['login'] = view('form.login');
        return view('form.layouts', $data);
    }

    public function login(Request $request)
    {
        $redirect_to = $request->get('redirect_to');
        $notification = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($user = Sentinel::Authenticate($request->all())) {
            if ($activation = Activation::completed($user)) {
                // return "Authentication activate";
                if ($redirect_to) {
                    return redirect($redirect_to);
                } else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin') {
                    return redirect('/admin');
                } elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'moderator') {
                    return redirect('/moderator');
                } elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user') {
                    return redirect('/user');
                }
            } else {
                return "Authentication not activate";
            }
        } else {
            $notification = array(
                'message' => 'Email or password do not match!!',
                'alert-type' => 'warning',
            );
            return back()->with($notification);
        }
    }

    public function loginReview(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($user = Sentinel::Authenticate($request->all())) {
            if ($activation = Activation::completed($user)) {
                // return "Authentication activate";
                if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin') {
                    return redirect()->back();
                } elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'moderator') {
                    return redirect()->back();
                } elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user') {
                    return redirect()->back();
                }
            } else {
                return "Authentication not activate";
            }
        } else {
            // return back()->with('error', 'Credentials do not match!!');
            $notification = array(
                'message' => 'Email or password do not match!!',
                'alert-type' => 'warning',
            );
            return back()->with($notification);
        }
    }

    public function logout()
    {
        Sentinel::logout();
        $notification = array(
            'message' => 'Succesfully Logout !!',
            'alert-type' => 'success',
        );
        return redirect('/login')->with($notification);
    }

}

