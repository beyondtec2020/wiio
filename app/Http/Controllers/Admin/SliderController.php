<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use DB;
use File;
use App\Slider;

class SliderController extends Controller
{
	 public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
        $data['slider'] =  Slider::all();
        $view['allClient'] = view('admin.slider.index',$data);
        return view('layouts.dashboard', $view);
    }

    public function add()
    {
    	$data['category'] = view('admin.slider.add');
        return view('layouts.dashboard', $data);
    }
    public function store(Request $request)
    {
    	 $request->validate([
            'image' => 'required',
        ]);
            $data = new Slider();
            $image = $request->file('image');
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images/slider'). '/' . $image_full_name;
            Image::make($image)->resize(1920,600)->save($location);

            $data->image = $image_full_name;
            $data->save();

            alert()->success('Good Job', ' Successfully Inserted !!');
           return redirect('add-slider');
    }
    public function destroy($id)
    {
    	$data = Slider::find($id);
        File::delete(public_path('images/slider'). '/' .$data->image);
        $data->delete();
        alert()->success('Good Job', ' Successfully Deleted !!');
        return back();
    }

}
