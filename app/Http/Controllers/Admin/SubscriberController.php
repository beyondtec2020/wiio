<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;
use Carbon\Carbon;
use Response;
use Input;
use DB;
use Excel;
class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except('store');
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::orderBy('created_at', 'desc')->get();
     	$data['subscribers'] = view('admin.subscribers.index',compact('subscribers'));
        return view('layouts.dashboard', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
                 'email' => 'unique:subscribers,email'
          ]);
        $subscriber = $request->all();
       $success = Subscriber::create($subscriber);

       if($success){
            $notification =  array(
                'message' => 'Thanks For Subscribe', 
                'alert-type' => 'success', 
            );
            return back()->with($notification);
        }
    }

     public function downloadExcel($type)
    {
        $data = Subscriber::get()->toArray();
        return Excel::create('download', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['email' => $value->email, 'created_at' => $value->created_at];
                }
                if(!empty($insert)){
                    DB::table('subscribers')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }
}
