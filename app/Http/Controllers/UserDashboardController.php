<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;
use DB;
use App\AddList;
use Carbon\Carbon;
class UserDashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('role:user');
    }
    public function index()
    {
        $AddList = AddList::all();
    	$data['content'] = view('users.mainContent',compact('AddList'));
    	return view('layouts.user_dashboard',$data);
    }

    public function view(){
    	$user = Sentinel::getUser();
		$data['content'] = view('users.profile.index',compact('user'));
		return view('layouts.user_dashboard',$data);
    }
    public function edit(){
    	$user = Sentinel::getUser();
		$data['content'] = view('users.profile.edit',compact('user'));
		return view('layouts.user_dashboard',$data);
    }
}
