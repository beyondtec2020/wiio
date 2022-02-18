<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;
use DB;
use App\City;
class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin-moderator');
    }
    public function index()
    {
        $city =  City::all();
        $data['city'] = view('admin.city.index',compact('city'));
        return view('layouts.dashboard', $data);
    }
    public function addItem()
    {
        $data['city'] = view('admin.city.add');
        return view('layouts.dashboard', $data);
    }
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city_image' => 'required | mimes:jpeg,png,jpg,gif,svg', 
            'status' => 'required',
        ]);
            $data = new City();
            $data->name = $request->name;
            $data->slug = str_slug($request->name);
            $data->status = $request->status;

            $image = $request->file('city_image');
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(400,400)->save($location);

            $data->city_image = $image_full_name;
            $data->save();

            alert()->success('Good Job', ' Successfully Inserted !!');
           return redirect()->back();
    }

    public function editItem($id)
    {
        $city = City::find($id);
        $data['city'] = view('admin.city.edit',compact('city'));
        return view('layouts.dashboard', $data);
    }
    public function updateItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $data =  City::find($request->id);
        $data->name = $request->name;
        $data->slug = str_slug($request->name);
        $data->status = $request->status;
        $data->save();
        alert()->success('Good Job', ' Successfully Updated !!');
        return redirect()->back();
    }

    public function catImage(Request $request)
    {
        $request->validate([
            'city_image' => 'required | mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $id = $request->id;

        if($request->hasFile('city_image')){

        $update =  City::find($id);
        	File::delete(public_path('images'). '/' .$update->city_image);
            
            $image = $request->file('city_image');
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(400,400)->save($location);
            $data['city_image'] = $image_full_name;
            $update->update($data);

            alert()->success('Good Job', ' Successfully Updated !!');
            return redirect()->back();
        }

            
    }
    
    public function destroy($id)
    {
        $data = City::find($id);
		File::delete(public_path('images'). '/' .$data->city_image);
        $data->delete();

        alert()->success('Good Job', ' Successfully Deleted !!');
        return back();
    }
}
