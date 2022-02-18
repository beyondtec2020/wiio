<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use DB;
use File;
use App\Menu;

class MenuController extends Controller
{
    public function __construct()
    {

        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subTitle'] = "| Menu";
        $data['category'] =  Menu::all();
        $view['index'] = view('admin.menu.index',$data);
        return view('layouts.dashboard', $view);
    }

    public function addItem()
    {
        $data['subTitle'] = "| Menu";
        $view['category'] = view('admin.menu.add',$data);
        return view('layouts.dashboard', $view);
    }
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
            $data = new Menu();
            $data->name = $request->name;
            $data->slug = str_slug($request->name);
            $data->description = $request->description;
            $data->status = $request->status;
            $data->save();

            alert()->success('Good Job', ' Successfully Inserted !!');
           return redirect()->route('addMenu');
    }

    public function editItem($id)
    {
        $data['category'] = Menu::find($id);
        $data['subTitle'] = "| Menu";
        $view['category'] = view('admin.menu.edit',$data);
        return view('layouts.dashboard', $view);
    }
    public function updateItem(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required',
        ]);
        $data =  Menu::find($request->id);
        $data->name = $request->name;
        $data->slug = str_slug($request->name);
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();
        alert()->success('Good Job', ' Successfully Updated !!');
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $data = Menu::find($id);
        $data->delete();
        alert()->success('Good Job', ' Successfully Deleted !!');
        return back();
    }
}
