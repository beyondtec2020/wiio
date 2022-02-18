<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Activation;
use Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;
use DB;
use App\AddList;
use App\AllImage;
use App\City;
use App\Category;
use Carbon\Carbon;
use App\Bookmark;

class BookmarkController extends Controller
{
	public function __construct()
    {
        $this->middleware('role:user-admin-moderator');
    }
    public function add(Request $request)
    {
        $check = Bookmark::where('addlist_id',$request->postId)->where('user_id',$request->UserID)->first();
        if($check == null)
        {   
            $data = new Bookmark();
            $data->addlist_id = $request->postId;
            $data->user_id = $request->UserID;
            $data->save();   
            return back();
        }
        else{
            $notification =  array(
                'message' => 'Already added this in bookmark !!', 
                'alert-type' => 'warning', 
            );
            return back()->with($notification);
        }
        
    }

    public function delete($id)
    {
    	$data = Bookmark::find($id);
    	$data->delete();
    	return back();
    }
    public function view()
    {
    	$userId = Sentinel::getUser()->id;
    	$Bookmark = Bookmark::with('AddList')->latest()->where('user_id',$userId)->get();
      
      $title = "Bookmark";
      $view['content'] = view('users.bookmark.index',compact('Bookmark','title'));
        return view('layouts.user_dashboard',$view);
    }


}
