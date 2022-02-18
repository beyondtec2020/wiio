<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AddList;
use App\Advertise;
use App\Category;
use App\City;
use App\Subscriber;
use App\User;
class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:moderator');

    }
    public function index()
    {
    	$AddList = AddList::all();
    	$Advertise = Advertise::all();
    	$Category = Category::all();
    	$City = City::all();
    	$Subscriber = Subscriber::all();
    	$User = User::all();

    	$view['content'] = view('admin.maincontent',compact('AddList','Advertise','Category','City','Subscriber','User'));
    	return view('layouts.dashboard',$view);
    }
}
