<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;  
use Sentinel;
use Activation;
use Session;
use View;
use App\User;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Sentinel::getUserRepository()->with('roles','activations')->get();
        $data['content'] = view('admin.staffs.index',compact('users'));
        return view('layouts.dashboard',$data);
    }

    public function addstaffs()
    {
        $roles = Sentinel::getRoleRepository()->get();
        $data['content'] = view('admin.staffs.add-staffs',compact('roles'));
        return view('layouts.dashboard',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'password' => 'required|min:6|confirmed',
            ]);

        $data = array();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = $request->password;
        $role = $request->role;


        $user = Sentinel::registerAndActivate($data);
        $user->roles()->attach($role); 
        alert()->success('Good Job', 'Thank you for registration !!');
        return redirect()->back();
    }

    


    public function edit($id)
    { 
        $user = Sentinel::findById($id);
        $roles = Sentinel::getRoleRepository()->get();
        $data['content'] = view('admin.staffs.edit-staffs',compact('roles', 'user'));
     	return view('layouts.dashboard',$data);
    }
    
 

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {    
            $id = $request->id;
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $email = $request->email;
            $phone = $request->phone;
            
		$user = Sentinel::findUserById($id);
        Sentinel::update($user, array('first_name'=>$first_name, 'last_name'=>$last_name, 'email' => $email, 'phone'=> $phone));     
        alert()->success('Good Job', 'Successfully Updated !!');     
        return redirect()->back();
    }

    public function updateRole(Request $request)
    {
        $this->validate($request, [
                'role' => 'required',
            ]);
        $id = $request->id;   
        $role = $request->role;
        $user = Sentinel::findUserById($id);
        // $user->roles()->attach($role);  
      
        if ($role) {
            // Get the user roles
            $userRoles = $user->roles->first();
            // dd($userRoles);
            // Detach the user roles
            if (! empty($userRoles)) {
                $user->roles()->detach($userRoles);
            }
            // Attach the user roles
            if (! empty($role)) {
                $user->roles()->attach($role);
            }
        }

		alert()->success('Good Job', 'Successfully Updated !!');
        return redirect()->back();
    }
    public function updatePass(Request $request)
    {
        $id = $request->id;
        $password = $request->password;
        $passConf = $request->password_confirmation;
        if($password != $passConf){
            return back()->with('message', 'password donot match!!');
        }
        $user = Sentinel::findUserById($id);
        Sentinel::update($user, array('password' => $password));
        alert()->success('Good Job', 'Successfully Updated !!');
        return redirect()->back();
    }
    public function changPass(Request $request)
    {
             $hasher = Sentinel::getHasher();

        $oldPassword = $request->old_password;
        $password = $request->password;
        $passwordConf = $request->password_confirmation;

        $user = Sentinel::getUser();

        if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
            Session::flash('error', 'Check input is correct.');
            return view('layouts.password.reset');
        }

        Sentinel::update($user, array('password' => $password));

        return redirect()->back();
    }


    public function publish($id){
     // $user = Sentinel::findById($id);   
     // $credentials = [
     //        'status' => 1,
     //    ];
     // Sentinel::update($user, $credentials);
    User::where('id', $id)->update(['status' => 1]);

     alert()->success('Good Job', 'Successfully Activated !!');
        return back();
    }

    public function unpublish($id){
        User::where('id', $id)->update(['status' => 0]);
     alert()->success('Good Job', 'Successfully Deactivated !!');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = User::find($id);
        $d->delete();
        alert()->success('Good Job', 'Successfully Deleted !!');
        return back();
    }
}
