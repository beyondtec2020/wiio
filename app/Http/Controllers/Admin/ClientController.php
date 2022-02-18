<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use DB;
use File;
use App\Client;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
        $data['client'] =  Client::all();
        $view['allClient'] = view('admin.clients.index',$data);
        return view('layouts.dashboard', $view);
    }

    public function addItem()
    {
        $data['category'] = view('admin.clients.add');
        return view('layouts.dashboard', $data);
    }
   public function store(Request $request)
    {
        $request->validate([
            'website' => 'required',
            'logo' => 'required',
            'status' => 'required',
        ]);
            $data = new Client();
            $data->website = $request->website;
            $data->status = $request->status;

            $image = $request->file('logo');
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(170,90)->save($location);

            $data->logo = $image_full_name;
            $data->save();

            alert()->success('Good Job', ' Successfully Inserted !!');
           return redirect()->route('addClient');
    }

    public function editItem($id)
    {
        $category = Client::find($id);
        $data['category'] = view('admin.clients.edit',compact('category'));
        return view('layouts.dashboard', $data);
    }
    public function updateItem(Request $request)
    {
        $request->validate([
            'website' => 'required',
        ]);

        $id = $request->id;
        $data =  Client::find($request->id);
        $data->website = $request->website;
        $data->status = $request->status;
        $data->save();
        alert()->success('Good Job', ' Successfully Updated !!');
        return redirect()->back();
    }

    public function catImage(Request $request)
    {
        $request->validate([
            'logo' => 'required | mimes:jpeg,jpg,png,gif',
        ]);
        
    	$id = $request->id;
    	$data = Client::find($id);
    	if($request->hasFile('logo')){
    		 File::delete(public_path('images'). '/' .$data->logo);

            $image = $request->file('logo');
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(160,160)->save($location);
            $p = $image_full_name;
        
            $data->logo = $p;
            $data->update();
         
         alert()->success('Good Job', 'Successfully Uploaded !!');
         return redirect()->back();
         }  
    }
    
    public function destroy($id)
    {
        $data = Client::find($id);
        File::delete(public_path('images'). '/' .$data->logo);
        $data->delete();

        alert()->success('Good Job', ' Successfully Deleted !!');
        return back();
    }

}
