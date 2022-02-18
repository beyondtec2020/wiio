<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Social;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
    	$social = Social::all();
        $data['social'] = view('admin.social.index',compact('social'));
        return view('layouts.dashboard', $data);
    }

    public function addItem(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
            $data = new Social();
            $data->name = $request->name;
            $data->code = $request->code;
            $data->link = $request->link;
            $data->status = $request->status;
            $data->save();
            return response()->json($data);

    }
    public function editItem($id)
    {
        $data = Social::find($id);
        return response()->json($data);
    }
    public function updateItem(Request $request, $id)
    {
        $data = Social::find($id);
        $data->name = $request->name;
        $data->code = $request->code;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->save();
        return response()->json($data);
    }
    public function deleteItem($id)
    {
       $d = Social::find($id)->delete();
        return response()->json($d);
    }
}
