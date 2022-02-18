<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');

    }
    public function index()
    {
    	$data = Testimonial::all();
    	$view['Testimonial'] = view('admin.testimonial.index',compact('data'));
        return view('layouts.dashboard', $view);
    }

    public function add()
    {
    	$view['Testimonial'] = view('admin.testimonial.add');
        return view('layouts.dashboard', $view);	
    }
    public function store(Request $request)
    {
        // dd($request->all());
    	 $request->validate([
            'text' => 'required',
	        'name' => 'required',
            'status' => 'required',
            'image' => 'required',
	        'designation' => 'required',
	    ]);

        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
    	$data['description'] = $request->text;
    	$data['status'] = $request->status == 'on' ? '1' : '0';   
    	
        if($request->hasFile('image')){
        $image = $request->file('image');
        $image_name = str_random(20);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $location = public_path('images'). '/' . $image_full_name;
        Image::make($image)->resize(160,160)->save($location);
        $data['image'] = $image_full_name;
        }

        Testimonial::create($data);
         alert()->success('Good Job', 'Successfully Saved !!');
         return redirect()->back();
    }

    public function edit($id)
    {
    	$data = Testimonial::find($id);
    	$view['Testimonial'] = view('admin.testimonial.edit', compact('data'));
        return view('layouts.dashboard', $view);

    }
    public function update(Request $request)
    {
        $id = $request->id;
        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
        $data['description'] = $request->text;
        $data['status'] = $request->status == 'on' ? '1' : '0';   
         
         $r = Testimonial::find($id);
            $r->update($data);

    	alert()->success('Good Job', 'Testimonial Update Successfully  !!');
    	return back();
    }

    public function destroy($id)
    {
    	$data = Testimonial::find($id);
        File::delete(public_path('images'). '/' .$data->image);
    	$data->delete();

    	alert()->success('Good Job', 'Testimonial  Successfully Deleted !!');
    	return back();
    }

}
