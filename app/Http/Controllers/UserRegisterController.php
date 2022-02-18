<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
class UserRegisterController extends Controller
{
    public function index()
    {
    	$data['register'] = view('form.register');
    	return view('form.layouts',$data);
    }
    public function store(Request $request)
    {
    	$request->validate([
		    'first_name' => 'required',
	        'last_name' => 'required',
	        'email' => 'required|unique:users',
	        'password' => 'required|min:6|confirmed',
		]);

    	$user = Sentinel::registerAndActivate($request->all());
        // $roleforUser = Sentinel::findUserById(1);
        $user->roles()->attach(3);

        //add mailchimp
        if(isset($user->id)){
            $this->addToMailchimpSubscription($request);
        }


        $notification =  array(
                'message' => 'Registration  has been Successful !!', 
                'alert-type' => 'success', 
            );
            return redirect('/login')->with($notification);
    }

    public function addToMailchimpSubscription($request){
        $authToken = '90d3e185d7a354df35ed101c321c20d9-us20';
        $list_id='b5e3762148';
        // The data to send to the API
        $postData = array(
            "email_address" => $request->input('email'),
            "status" => "subscribed",
            "merge_fields" => array(
                "FNAME"=> $request->input('first_name'),
                "LNAME"=>$request->input('last_name'),
                "PHONE"=> "")
        );

        // Setup cURL
        $ch = curl_init('https://us20.api.mailchimp.com/3.0/lists/'.$list_id.'/members/');
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic '.$authToken,
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));
        // Send the request
        $response = curl_exec($ch);
    }
}
