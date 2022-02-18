<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\Advertise;
use File;
class AdvertiseController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
    	$data['Advertise'] = Advertise::all();
        $data['subTitle'] = "| Advertisements";
    	$view['content'] = view('admin.advertisement.index',$data);
    	return view('layouts.dashboard',$view);
    }
    public function addAdvert()
    {
        $view['subTitle'] = "| Advertisements";
    	$data['content'] = view('admin.advertisement.add-advertise',$view);
    	return view('layouts.dashboard',$data);	
    }
    public function store(Request $request)
    {
    	// dd($request->all());
    	$request->validate([
	        'advert_type' => 'required',
            'advert_size' => 'required',
            'title' => 'required',
            // 'val1' => 'required|mimes:png,jpg,jpeg,gif|max:2000'
	    ]);

          $data['advert_type'] = $request->advert_type;
          $data['advert_size'] = $request->advert_size;
          $data['title'] = $request->title;
          $data['link'] = $request->link;
          $data['val2'] = $request->val2;
          $data['status'] = $request->status == 'on' ? '1' : '0';            

        if($request->hasFile('val1')){
            $image = $request->file('val1');
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images/advertise'). '/' . $image_full_name;
            if($request->advert_size == 1){
                Image::make($image)->resize(300,600)->save($location);   
            }elseif($request->advert_size == 2){
                Image::make($image)->resize(300,250)->save($location);   
            }
            elseif($request->advert_size == 3){
                Image::make($image)->resize(728,90)->save($location);   
            }
            elseif($request->advert_size == 4){
                Image::make($image)->resize(970,90)->save($location);   
            }
            elseif($request->advert_size == 5){
                Image::make($image)->resize(970,250)->save($location);   
            }
            $data['val1'] = $image_full_name;
        }

        Advertise::create($data);
        alert()->success('Good Job', 'Successfully Inserted !!');
        return redirect()->back();
	}
	public function edit($id)
	{
        $view['advert']  = Advertise::find($id);
        $view['subTitle'] = "| Advertisements";
    	$data['content'] = view('admin.advertisement.edit-advertise',$view);
    	return view('layouts.dashboard',$data);	
	}

	public function update(Request $request)
	{
		   $id = $request->id;
        $data['advert_size'] = $request->advert_size;
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $data['val2'] = $request->val2;
        $data['status'] = $request->status == 'on' ? '1' : '0';            

        if($request->hasFile('val1')){
            $image = $request->file('val1');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images/advertise'). '/' . $image_full_name;
            if($request->advert_size == 1){
                Image::make($image)->resize(300,600)->save($location);   
            }
            elseif($request->advert_size == 2){
                Image::make($image)->resize(300,250)->save($location);   
            }
            elseif($request->advert_size == 3){
                Image::make($image)->resize(728,90)->save($location);   
            }
            elseif($request->advert_size == 4){
                Image::make($image)->resize(970,90)->save($location);   
            }
            elseif($request->advert_size == 5){
                Image::make($image)->resize(970,250)->save($location);   
            }

            $del = Advertise::find($id);
            $link = public_path('images/advertise'). '/' .$del->val1;
            if (file_exists($link)){
                    unlink($link);
                }

            $data['val1'] = $image_full_name;
        }

        $r = Advertise::find($id);

        $r->update($data);

        alert()->success('Good Job', 'Successfully Updated !!');
        return redirect()->route('advertise');

	}

	public function destroy($id)
	{
        $data = Advertise::find($id);
        File::delete(public_path('images/advertise'). '/' .$data->val1);
        $data->delete();
        alert()->success('Good Job', ' Successfully Deleted !!');
        return back();
	}
}
