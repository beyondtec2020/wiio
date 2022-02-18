<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\GeneralSetting;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use DB;
use File;
class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
    	$GeneralSetting = GeneralSetting::first();
    	$data['content'] = view('admin.generalSetting.index',compact('GeneralSetting'));
    	return view('layouts.dashboard',$data);
    }
    public function text()
    {
    	$GeneralSetting = GeneralSetting::first();
    	$data['content'] = view('admin.generalSetting.text',compact('GeneralSetting'));
    	return view('layouts.dashboard',$data);
    }

    public function about(Request $req)
    {
    	$data = GeneralSetting::find($req->id);
        $data->about = $req->about;
        $data->update();
        alert()->success('Good Job', 'About us Successfully Updated !!');
        return redirect()->route('gsettingText');
    }
    public function privacy(Request $req)
    {
    	$data = GeneralSetting::find($req->id);
        $data->privacy = $req->privacy;
        $data->update();
        alert()->success('Good Job', 'Prvacy & Policy Successfully Updated !!');
        return redirect()->route('gsettingText');
    }
    public function sitemap(Request $req)
    {
        $data = GeneralSetting::find($req->id);
        $data->sitemap = $req->sitemap;
        $data->update();
        alert()->success('Good Job', 'Sitemap Successfully Updated !!');
        return redirect()->route('gsettingText');
    }
    public function terms(Request $req)
    {
    	$data = GeneralSetting::find($req->id);
        $data->terms = $req->terms;
        $data->update();
        alert()->success('Good Job', 'Terms & Condition Successfully Updated !!');
        return redirect()->route('gsettingText');
    }
    public function address(Request $req)
    {
    	$data = GeneralSetting::find($req->id);
        $data->address = $req->address;
        $data->phone = $req->phone;
        $data->fax = $req->fax;
        $data->color = $req->color;
        $data->office_email = $req->office_email;
        $data->update();
        alert()->success('Good Job', 'Office Address Successfully Updated !!');
        return redirect()->route('gsetting');
    }
    public function footer(Request $req)
    {
        $data = GeneralSetting::find($req->id);
        $data->footer = $req->footer;
        $data->update();
        alert()->success('Good Job', 'Footer Successfully Updated !!');
        return redirect()->route('gsetting');
    }
    public function gmaps(Request $req)
    {
    	$data = GeneralSetting::find($req->id);
        $data->gmaps = $req->gmaps;
        $data->update();
        alert()->success('Good Job', 'Google map Successfully Updated !!');
        return redirect()->route('gsetting');
    }
    public function webContent(Request $request)
    {
        $request->validate([
        'short_bio' => 'required | max:200',
        ]);
    	$data = GeneralSetting::find($request->id);
        $data->title = $request->title;
        $data->short_bio = $request->short_bio;
        $data->metakeywords = $request->metakeywords;
        $data->update();
        alert()->success('Good Job', ' Successfully Updated !!');
        return redirect()->route('gsetting');
    }

    public function logo(Request $request)
    {
    	$request->validate([
        'logo' => 'required | mimes:jpeg,jpg,png',
    	]);

    	$r = GeneralSetting::find($request->id);

        if($request->hasFile('logo')){
            File::delete(public_path('images'). '/' .$r->logo);
            $image = $request->file('logo');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(195,40)->save($location);
            $data['logo'] = $image_full_name;
         }
        $r->update($data);
        alert()->success('Good Job', 'Logo Successfully Uploaded !!');
        return redirect()->route('gsetting');
    }

    public function preloader(Request $request)
    {
        $request->validate([
            'preloader' => 'required|mimes:gif',
        ]);

        if($request->hasFile('preloader')){
            $image = $request->file('preloader');
            $filename = 'Preloader_2'.'.'.$image->getClientOriginalExtension();
            $location = public_path('assets/images');
            $image->move($location,$filename);
        }
        alert()->success('Good Job', 'Gif Successfully Uploaded !!');
        return redirect()->back();
    }

    public function favico(Request $request)
    {
    	 $request->validate([
        'favico_ico' => 'required | mimes:jpeg,jpg,png',
    	]);

    	$r = GeneralSetting::find($request->id);

        if($request->hasFile('favico_ico')){
            File::delete(public_path('images'). '/' .$r->favico_ico);
            $image = $request->file('favico_ico');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(60,60)->save($location);
            $data['favico_ico'] = $image_full_name;
         }
        $r->update($data);

        alert()->success('Good Job', 'Favicon image Successfully Uploaded !!');
        return redirect()->route('gsetting');
    }

}
