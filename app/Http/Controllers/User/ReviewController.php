<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use App\Report;
use Session;
class ReviewController extends Controller
{
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|max:80',
        ]);
         $data = new Review();
         $data->addlist_id = $request->postId;
         $data->title = $request->title;
         $data->user_id = $request->userId;
         $data->description = $request->review;
        if($request->rating){
            $data->rating = $request->rating;
        }else{
            $data->rating = 0;
        }
         $data->save();
         
         if($data->save()){
            $notification =  array(
                'message' => 'Your Feedback Send Successfully.', 
                'alert-type' => 'success', 
            );
            return back()->with($notification);
        }else{
            $notification =  array(
                'message' => 'Something wrong !!', 
                'alert-type' => 'error', 
            );
            return back()->with($notification);
        }
         
    }
    public function report(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'report_type' => 'required',
            'problem_desc' => 'required',
        ]);
    	$data = new Report();
        $data->addlist_id = $request->postId;
        $data->user_id = $request->userId;
        $data->problem_desc = $request->problem_desc;
        $data->report_type  = $request->report_type;
       	$data->save();

        if($data->save()){
            $notification =  array(
                'message' => 'Your report send successfully.', 
                'alert-type' => 'success', 
            );
            return back()->with($notification);
        }else{
            $notification =  array(
                'message' => 'Something wrong !!', 
                'alert-type' => 'error', 
            );
            return back()->with($notification);
        }
    }
}
