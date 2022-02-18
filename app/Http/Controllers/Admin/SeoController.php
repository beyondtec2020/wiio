<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seo;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
    	$seo = Seo::first();
    	$data['content'] = view('admin.seo.index',compact('seo'));
    	return view('layouts.dashboard',$data);
    }

    public function metakeyword(Request $req)
    {
    	$data = Seo::find($req->id);
        $data->metakeyword = $req->metakeyword;
        $data->update();
        alert()->success('Good Job', 'meta-keyword Successfully Updated !!');
        return redirect()->route('seo');
    }

    public function analytics(Request $req)
    {
    	$data = Seo::find($req->id);
        $data->analytics = $req->analytics;
        $data->update();
        alert()->success('Good Job', ' Successfully Updated !!');
        return redirect()->route('seo');
    }

    public function fbcomment(Request $req)
    {
    	$data = Seo::find($req->id);
        $data->fbcomment = $req->fbcomment;
        $data->siteurl = $req->siteurl;
        $data->update();
        alert()->success('Good Job', ' Successfully Updated !!');
        return redirect()->route('seo');
    }
}
