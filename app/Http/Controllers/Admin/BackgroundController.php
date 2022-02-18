<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;
use App\Background;
class BackgroundController extends Controller
{
	 public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
    	$Background = Background::first();
    	$data['content'] = view('admin.generalSetting.bg',compact('Background'));
    	return view('layouts.dashboard',$data);
    }
    public function searchbg(Request $request)
    {
    	$request->validate([
        'search_bg' => 'required',
    	]);
    	$r = Background::find($request->id);

        if($request->hasFile('search_bg')){
            File::delete(public_path('images'). '/' .$r->search_bg);
            $image = $request->file('search_bg');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(1920,860)->save($location);
            $data['search_bg'] = $image_full_name;
         }
        $r->update($data);
        alert()->success('Good Job', 'Image Successfully Uploaded !!');
        return redirect()->route('background');
    }

    public function testimonialbg(Request $request)
    {
    	$request->validate([
        'testimonial_bg' => 'required',
    	]);
    	$r = Background::find($request->id);

        if($request->hasFile('testimonial_bg')){
            File::delete(public_path('images'). '/' .$r->testimonial_bg);
            $image = $request->file('testimonial_bg');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(1920,736)->save($location);
            $data['testimonial_bg'] = $image_full_name;
         }
        $r->update($data);
        alert()->success('Good Job', 'Image Successfully Uploaded !!');
        return redirect()->route('background');
    }

    public function timerbg(Request $request)
    {
    	$request->validate([
        'timer_bg' => 'required',
    	]);
    	$r = Background::find($request->id);

        if($request->hasFile('timer_bg')){
            File::delete(public_path('images'). '/' .$r->timer_bg);
            $image = $request->file('timer_bg');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(1920,1060)->save($location);
            $data['timer_bg'] = $image_full_name;
         }
        $r->update($data);
        alert()->success('Good Job', 'Image Successfully Uploaded !!');
        return redirect()->route('background');
    }

    public function subscriberbg(Request $request)
    {
    	$request->validate([
        'subscriber_bg' => 'required',
    	]);
    	$r = Background::find($request->id);

        if($request->hasFile('subscriber_bg')){
            File::delete(public_path('images'). '/' .$r->subscriber_bg);
            $image = $request->file('subscriber_bg');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(1920,1060)->save($location);
            $data['subscriber_bg'] = $image_full_name;
        }
        $r->update($data);
        alert()->success('Good Job', 'Image Successfully Uploaded !!');
        return redirect()->route('background');
    }

    public function aboutbg(Request $request)
    {
    	$request->validate([
        'about_bg' => 'required',
    	]);
    	$r = Background::find($request->id);

        if($request->hasFile('about_bg')){
            File::delete(public_path('images'). '/' .$r->about_bg);
            $image = $request->file('about_bg');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(1920,1060)->save($location);
            $data['about_bg'] = $image_full_name;
        }
        $r->update($data);
        alert()->success('Good Job', 'Image Successfully Uploaded !!');
        return redirect()->route('background');
    }


    public function contactbg(Request $request)
    {
    	$request->validate([
        'contact_bg' => 'required',
    	]);
    	$r = Background::find($request->id);

        if($request->hasFile('contact_bg')){
            File::delete(public_path('images'). '/' .$r->contact_bg);
            $image = $request->file('contact_bg');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(1920,650)->save($location);
            $data['contact_bg'] = $image_full_name;
        }
        $r->update($data);
        alert()->success('Good Job', 'Image Successfully Uploaded !!');
        return redirect()->route('background');
    }


}
