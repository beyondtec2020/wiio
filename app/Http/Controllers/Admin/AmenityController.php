<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Amenity;

class AmenityController extends Controller
{
 public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
    	$Amenity = Amenity::all();
        $data['social'] = view('admin.Amenity.index',compact('Amenity'));
        return view('layouts.dashboard', $data);
    }

    public function addItem(Request $request)
    {
    
        $this->validate($request,[
            'name' => 'required',
            'status' => 'required',
        ]);
            $data = new Amenity();
            $data->name = $request->name;
            $data->slug = str_slug($request->name);
            $data->status = $request->status;
            $data->save();
            return response()->json($data);

    }
    public function editItem($id)
    {
        $data = Amenity::find($id);
        return response()->json($data);
    }
    public function updateItem(Request $request, $id)
    {
        $data = Amenity::find($id);
        $data->name = $request->name;
        $data->slug = str_slug($request->name);
        $data->status = $request->status;
        $data->save();
        return response()->json($data);
    }
    public function deleteItem($id)
    {
       $d = Amenity::find($id)->delete();
        return response()->json($d);
    }   
}
