<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use DB;
use File;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {

        $this->middleware('role:admin-moderator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subTitle'] = "| Category";
        $data['category'] =  Category::all();
        $view['index'] = view('admin.category.index',$data);
        return view('layouts.dashboard', $view);
    }

    public function addItem()
    {
        $data['subTitle'] = "| Category";
        $view['category'] = view('admin.category.add-category',$data);
        return view('layouts.dashboard', $view);
    }
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required|unique:categories',
            'cat_image' => 'required | mimes:png',
            'status' => 'required',
        ]);
            $data = new Category();
            $data->name = $request->name;
            $data->slug = str_slug($request->name);
            $data->position = $request->position;
            $data->status = $request->status;

            $image = $request->file('cat_image');
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(60,60)->save($location);

            $data->cat_image = $image_full_name;
            $data->save();

            alert()->success('Good Job', ' Successfully Inserted !!');
           return redirect()->route('addItem');
    }

    public function editItem($id)
    {
        $data['category'] = Category::find($id);
        $data['subTitle'] = "| Category";
        $view['category'] = view('admin.category.edit-category',$data);
        return view('layouts.dashboard', $view);
    }
    public function updateItem(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'position' => 'required|unique:categories,position,'.$id
        ]);

        $data =  Category::find($request->id);
        $data->name = $request->name;
        $data->slug = str_slug($request->name);
        $data->position = $request->position;
        $data->status = $request->status;
        $data->save();
        alert()->success('Good Job', ' Successfully Updated !!');
        return redirect()->back();
    }

    public function catImage(Request $request)
    {
        $request->validate([
            'cat_image' => 'required | mimes:png',
        ]);
        
        $id = $request->id;

        if($request->hasFile('cat_image')){

        $update =  Category::find($id);
        $update_path = public_path('images'). '/' .$update->cat_image;
            if($update->cat_image != null)
            {
                unlink($update_path);
            }

            $image = $request->file('cat_image');
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(60,60)->save($location);
            $data['cat_image'] = $image_full_name;
            $update->update($data);

            alert()->success('Good Job', ' Successfully Updated !!');
            return redirect()->back();
        }

            
    }
    
    public function destroy($id)
    {
        $data = Category::find($id);
        $path = public_path('images'). '/' .$data->cat_image;
         if($data->cat_image == null)
            {
                $data->delete();
            }else{
                unlink($path);
            }
        $data->delete();

        alert()->success('Good Job', ' Successfully Deleted !!');
        return back();
    }
}
