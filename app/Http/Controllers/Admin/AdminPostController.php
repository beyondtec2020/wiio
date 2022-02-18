<?php

namespace App\Http\Controllers\Admin;

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
use App\Review;
use App\Report;
use App\Amenity;
use App\addlistAmenity;
use Carbon\Carbon;
use App\Bookmark;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin-moderator');
    }

    public function addlist()
    {
    	$city = City::where('status',1)->get();
        $category = Category::where('status',1)->get();
    	$Amenity = Amenity::where('status',1)->get();
    	$view['content'] = view('admin.post.add',compact('city','category','Amenity'));
        return view('layouts.dashboard',$view);
    }

    public function store(Request $request)
    {
     $request->validate([
        'title' => 'required|max:30',
        'short_description' => 'required|min:30|max:80',
        'address' => 'required',
        'city' => 'required',
        'zip_code' => 'required',
        'phone' => 'required',
        'description' => 'required',
        'min_price' => 'required',
        'max_price' => 'required',
        'images' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048'
        // 'images' =>  'required|mimes:jpeg,png,jpg',
        // 'images' =>  'required',
    ]);
    	
    	$data = array();
        $data['title'] = $request->title;
        $data['slug'] = str_slug($request->title);
        $data['short_desc'] = $request->short_description;
        $data['cat_id'] = $request->catgory;
        $data['user_id'] = Sentinel::getUser()->id;
        $data['address'] = $request->address;
        $data['city_id'] = $request->city;
        $data['zip_code'] = $request->zip_code;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['website'] = $request->website;
        $data['facebook'] = $request->facebook;
        $data['linkdin'] = $request->linkdin;
        $data['twitter'] = $request->twitter;
        $data['google'] = $request->google;
        $data['description'] = $request->description;
        $data['min_price'] = $request->min_price;
        $data['max_price'] = $request->max_price;
        $data['video'] = $request->video;
        $data['location'] = $request->location;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        $id = DB::table('add_lists')->insertGetId($data);
        
        
        if(count($request->amenities) != 0){
		foreach ($request->amenities as  $s) {
	            addlistAmenity::create([
	                'addlist_id' => $id,
	                'amenities_id' => $s
	            ]);
	        }
	}
        

 

        foreach ($request->images as $image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(750,490)->save($location);

           $msg =  AllImage::create([
                'addlist_id' => $id,
                'image' => $image_full_name
            ]);
        }

        alert()->success('Good Job', ' Successfully Updated !!');
        return redirect('/add-lists-user');
    }


    public function update(Request $request)
    {
         $request->validate([
        'title' => 'required|max:30',
        'short_description' => 'required|min:30|max:80',
        'address' => 'required',
        'city' => 'required',
        'zip_code' => 'required',
        'phone' => 'required',
        'description' => 'required',
        'min_price' => 'required',
        'max_price' => 'required',
    ]);
        $data = array();
        $data['title'] = $request->title;
        $data['slug'] = str_slug($request->title);
        $data['short_desc'] = $request->short_description;
        $data['cat_id'] = $request->catgory;
        $data['user_id'] = Sentinel::getUser()->id;
        $data['address'] = $request->address;
        $data['city_id'] = $request->city;
        $data['zip_code'] = $request->zip_code;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['website'] = $request->website;
        $data['facebook'] = $request->facebook;
        $data['linkdin'] = $request->linkdin;
        $data['twitter'] = $request->twitter;
        $data['google'] = $request->google;
        $data['description'] = $request->description;


        $data['min_price'] = $request->min_price;
        $data['max_price'] = $request->max_price;
        $data['video'] = $request->video;
        $data['location'] = $request->location;
        $data['status'] = 0;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

      $dataid =  AddList::find($request->id);
      $dataid->update($data);

      $data2 = addlistAmenity::where('addlist_id',$dataid->id)->delete();
      
      
        
        if(count($request->amenities) != 0){
		foreach ($request->amenities as  $s) {
	            addlistAmenity::create([
	                'addlist_id' => $dataid->id,
	                'amenities_id' => $s
	            ]);
	        }
	}

      

        if($request->hasFile('images')){

$data23 = AllImage::where('addlist_id',$dataid->id)->get();
		foreach ($data23 as  $val) {
	            File::delete(public_path('images'). '/' .$val->image);
	            $val->delete();
	        }

            foreach ($request->images as $image) {
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $location = public_path('images'). '/' . $image_full_name;
                Image::make($image)->resize(750,490)->save($location);

                AllImage::create([
                    'addlist_id' => $dataid->id,
                    'image' => $image_full_name
                ]);
            }
        }
        alert()->success('Good Job', ' Successfully Updated !!');
        return back();        
    }
    public function deleteSingleImage($id)
    {
        $data = AllImage::find($id);
        File::delete(public_path('images'). '/' .$data->image);
        $data->delete();
        // alert()->success('Good Job', ' Image Successfully Deleted !!');
        return back();
    }
    
    public function posts()
    {
        $AddList =  AddList::latest()->get();
        $data['category'] = view('admin.post.index',compact('AddList'));
        return view('layouts.dashboard', $data);
    }


    public function previewList($id, $slug)
    {
        $AddList =   AddList::with(['user','cat','city','CountImage','totalAmenity'])->where('id', $id)->where('slug', $slug)->first();
        $Amenity = Amenity::where('status',1)->get();       
        $data['preview'] = view('admin.post.view',compact('AddList','Amenity'));
        return view('layouts.dashboard', $data);
    }

    public function previewReport($id, $slug)
    {
        $AddList =   AddList::with(['user','cat','city','CountImage','totalAmenity'])->where('id', $id)->where('slug', $slug)->first();
        $Amenity = Amenity::where('status',1)->get();       
        $data['preview'] = view('admin.post.report',compact('AddList','Amenity'));
        return view('layouts.dashboard', $data);
    }
    public function previewReview($id, $slug)
    {
        $AddList =   AddList::with(['user','cat','city','CountImage','totalAmenity'])->where('id', $id)->where('slug', $slug)->first();
        $Amenity = Amenity::where('status',1)->get();       
        $data['preview'] = view('admin.post.review',compact('AddList','Amenity'));
        return view('layouts.dashboard', $data);
    }

    public function activeStatus($id)
    {
        AddList::where('id', $id)->update(['status' => 1]);
        alert()->success('Good Job', ' Successfully Activated !!');
        return back();
    }
    public function expiredStatus($id)
    {
        AddList::where('id', $id)->update(['status' => 2]);
        alert()->success('Good Job', ' Successfully Expired !!');
        return back();
    }
    public function pendingStatus($id)
    {
        AddList::where('id', $id)->update(['status' => 0]);
        alert()->success('Good Job', ' Successfully Pending !!');
        return back();
    }

    public function allowFetured($id)
    {
        AddList::where('id', $id)->update(['is_featured' => 1]);
        alert()->success('Good Job', ' Successfully Added to Fetured !!');
        return back();
    }

    public function disallowFetured($id)
    {
        AddList::where('id', $id)->update(['is_featured' => 0]);
        alert()->success('Good Job', ' Successfully Remove to Fetured !!');
        return back();
    }

    public function authorBookmark()
    {
    	$userId = Sentinel::getUser()->id;
    	$Bookmark = Bookmark::with('AddList')->latest()->where('user_id',$userId)->get();      
      	$title = "My Bookmark";
      	$view['content'] = view('admin.post.bookmark',compact('Bookmark','title'));
        return view('layouts.dashboard', $view);
    }

    public function deleteBookmark($id)
    {
    	$data = Bookmark::find($id);
    	$data->delete();
    	return back();
    }

    public  function activeList()
    {
        $userId = Sentinel::getUser()->id;
      $AddList = AddList::latest()->where('user_id', $userId)->where('status',1)->paginate(10);
      $title = "Active";
      $view['content'] = view('admin.post.activelist',compact('AddList','title'));
        return view('layouts.dashboard', $view);
    }
    public  function pendingList()
    {
        $userId = Sentinel::getUser()->id;
      $AddList = AddList::latest()->where('user_id',$userId)->where('status',0)->paginate(10);
      $title = "Pending";
      $view['content'] = view('admin.post.activelist',compact('AddList','title'));
        return view('layouts.dashboard', $view);
    }
    public  function expiredList()
    {
        $userId = Sentinel::getUser()->id;
      $AddList = AddList::latest()->where('user_id',$userId)->where('status',2)->paginate(10);
      $title = "Expired";
      $view['content'] = view('admin.post.activelist',compact('AddList','title'));
        return view('layouts.dashboard', $view);
    }
    public function destroy($id, $slug)
    {
         $data = AddList::find($id);
         $data->delete();

        $data2 = AllImage::where('addlist_id',$id)->get();
        foreach ($data2 as  $value) {
            File::delete(public_path('images'). '/' .$value->image);
            $value->delete();
        }
        $data3 = addlistAmenity::where('addlist_id',$id)->get();
            foreach ($data3 as  $value) {
                $value->delete();
        }
        $Review = Review::where('addlist_id',$id)->get();
            foreach ($Review as  $value) {
                $value->delete();
        }
       $Report = Report::where('addlist_id',$id)->get();
            foreach ($Report as  $value) {
                $value->delete();
        }
    alert()->success('Good Job', ' Successfully Deleted !!');
        return back();
    }
    public function edit($id, $slug)
    {
        $category = Category::where('status',1)->get();
        $city = City::where('status',1)->get();
        $Amenity = Amenity::where('status',1)->get();       
        $AddList = AddList::find($id);
        $addlistAmenity = addlistAmenity::where('addlist_id',$AddList->id)->get();
        
        
    $view['content'] = view('admin.post.edit',compact('category','city','AddList','Amenity','addlistAmenity'));
        return view('layouts.dashboard',$view);   
    }
}
