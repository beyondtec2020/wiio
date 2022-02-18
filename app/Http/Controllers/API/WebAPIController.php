<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\City;
use App\AddList;
use App\InteractionsLog;
use App\Amenity;

class WebAPIController extends Controller
{   
    public function search(Request $request){            
        
        $resultsQuery = AddList::query();
        
        if($request->has('category_id') && $request->category_id != 0){
            $resultsQuery->where('cat_id', $request->get('category_id'));
        }

        if($request->has('city_id')){
            $resultsQuery->where('city_id', $request->get('city_id'));   
        }
        
        if($request->has('keyword')){
            $resultsQuery->where('title','like','%'.$request->get('keyword').'%');
        }

        $results = $resultsQuery->paginate(10);

        $resp = $this->addlist($results);
        
        return response()->json([
            'data' => $resp,
            'next_url' => $results->nextPageUrl(),
            'success' => true
        ],200);
    }

    public function categories(){

        $catgories = Category::orderBy('position','asc')->where('status',1)->get();        
        
        $resp = [];
        foreach($catgories as $category){
            $resp[]=[
                'id'=>$category->id,
                'name'=>$category->name,
                'image'=>$category->category_image
            ];
        }

        return response()->json([
            'data'=>$resp,
            'success'=>true
        ],200);

    }

    public function cities(){

        $cities = City::where('status',1)->get();
        
        $resp = [];
        foreach($cities as $city){
            $resp[]=[
                'id'=>$city->id,
                'name'=>$city->name,
                'image'=>$city->image_url
            ];
        }

        return response()->json([
            'data'=>$resp,
            'success'=>true
        ],200);
    }
    public function addlist($lists){

        $resp = [];
        
        foreach($lists as $list){
            
            $images = [];
            if($list->CountImage()){                
               foreach($list->CountImage as $image) {
                   if($image->image_url){
                    $images =  $image->image_url;
                    break;
                   }                   
               }
            }

            $resp[] = [
                'id'=>$list->id,
                'title'=>$list->title,                
                'slug'=>$list->slug,                
                'cat_id'=>$list->cat_id,                
                'user_id'=>$list->user_id,                
                'short_desc'=>$list->short_desc,                
                'address'=>$list->address,                
                'city_id'=>$list->city_id,                
                'zip_code'=>$list->zip_code,                
                'phone'=>$list->phone,                
                'email'=>$list->email,                
                'website'=>$list->website,                
                'facebook'=>$list->facebook,                
                'linkdin'=>$list->linkdin,                
                'twitter'=>$list->twitter,                
                'google'=>$list->google,                
                'description'=>$list->description,                
                'total_allowed_coupon'=>$list->total_allowed_coupon,                
                'users_coupon_per_day'=>$list->users_coupon_per_day,                
                'coupon_begin_hour'=>$list->coupon_begin_hour,                
                'coupon_end_hour'=>$list->coupon_end_hour,                
                'coupon_start_date'=>$list->coupon_start_date,                
                'coupon_end_date'=>$list->coupon_end_date,                
                'min_price'=>$list->min_price,
                'max_price' => $list->max_price,                
                'video'=>$list->video,                
                'status'=>$list->status,                
                'is_featured'=>$list->is_featured,                
                'reviews'=>$list->reviews,                
                'location'=>$list->location,
                'images'=>$images
            ];
        }

        return $resp;

    }
    public function getPopular(){
        
        $populars = AddList::with('CountImage')->where('status', 1)->orderby('reviews', 'desc')->take(12)->get();
        
        $resp = $this->addlist($populars);

        return response()->json([
            'data'=>$resp,
            'success'=>true
        ],200);

    }

    public function getLatest(){        
        
        $latest = AddList::latest()->where('status', 1)->take(12)->get();        
        
        $resp = $this->addlist($latest);

        return response()->json([
            'data'=>$resp,
            'success'=>true
        ],200);
    }

    public function getFeatured(){        
        
        $featured = AddList::latest()->where('status', 1)->where('is_featured', 1)->take(21)->get();
        
        $resp = $this->addlist($featured);


        return response()->json([
            'data'=>$resp,
            'success'=>true
        ],200);
    }

    public function coupons(Request $request){

        /*Coupon Status:
            1 - Issued
            2 - Used
            3 - Expired             
        */

        $interactionsQuery = InteractionsLog::query()->with('addlist')->where('coupon_code','!=',null);    
        
        if($request->has('coupon_status')){            
            $original_status  = (string)($request->coupon_status - 1);
            $interactionsQuery->where('status','=',$original_status);
        }
        
        $interactions = $interactionsQuery->paginate(5);
        
        $resp = [];

        foreach($interactions as $interaction){
            $image = '';
            if($interaction->addlist() && $interaction->addlist->CountImage()){                
                foreach($interaction->addlist->CountImage as $image) {
                    if($image->image_url){
                        $image =  $image->image_url;
                        break;                        
                    }                   
                }
            }

            $resp[] = [
                'id' => $interaction->id,
                'addlist_id' => $interaction->addlist_id,
                'status' => $interaction->status,
                'coupon_code' => $interaction->coupon_code,
                'title' => $interaction->addlist->title,
                'short_desc' => $interaction->addlist->short_desc,
                'image' => $image,
            ];
        }
        
        return response()->json([
            'data'=>$resp,
            'next_url' => $interactions->nextPageUrl(),
            'success'=>true
        ],200);
    }

    public function singlePost(Request $request){

        AddList::where('id', $request->id)->increment('reviews');    

        $data = AddList::where('id', $request->id)->first();
        
        $images = [];
        if($data->CountImage()){                
            foreach($data->CountImage as $image) {
                if($image->image_url){
                    $images =  $image->image_url;
                    break;                        
                }                   
            }
        }

        if ($data->review()->where('addlist_id', '=', $data->id)->first()) {
            $ratingCount = $data->review()->where('rating', '!=', 0)->count('rating');
            $ratingSum = $data->review()->where('rating', '!=', 0)->sum('rating');
            if ($ratingCount == 0) {
                $ratingCount = 1;
            }
            $totalRating = ($ratingSum / $ratingCount);
        } else {
            $totalRating = 0;
        }
        
        $amenities = [];
        foreach($data->totalAmenity()->get() as $d){
            $v = Amenity::where('id', $d->amenities_id)->first();
            if($v != null){
                $amenities[] =  $v->name ;
            }
        }

        $reviews = [];
        foreach($data->review as $review){                
            $reviews[] = [
                'title'=>$review->title,
                'description'=>$review->description,
                'rating'=>$review->rating,
                'user_fname'=>$review->user->first_name,
                'user_lname'=>$review->user->last_name,
                'user_profile'=>$review->user->profile_url,
            ];
        }
        
        $resp = [
            'id'=>$data->id,
            'title'=>$data->title,                         
            'category'=>$data->cat->name,                
            'user_id'=>$data->user_id,                
            'short_desc'=>$data->short_desc,                
            'address'=>$data->address,                
            'city'=>$data->city->name,                
            'zip_code'=>$data->zip_code,                
            'phone'=>$data->phone,                
            'email'=>$data->email,                
            'website'=>$data->website,                
            'facebook'=>$data->facebook,                
            'linkdin'=>$data->linkdin,                
            'twitter'=>$data->twitter,                
            'google'=>$data->google,                
            'description'=>$data->description,                
            'total_allowed_coupon'=>$data->total_allowed_coupon,                
            'users_coupon_per_day'=>$data->users_coupon_per_day,                
            'coupon_begin_hour'=>$data->coupon_begin_hour,                
            'coupon_end_hour'=>$data->coupon_end_hour,                
            'coupon_start_date'=>$data->coupon_start_date,                
            'coupon_end_date'=>$data->coupon_end_date,                
            'min_price'=>$data->min_price,                
            'max_price'=>$data->max_price,
            'video'=>$data->video,                
            'status'=>$data->status,                
            'is_featured'=>$data->is_featured,                
            'visits'=>$data->reviews,
            'location'=>$data->location,            
            'rating'=>$totalRating,            
            'video'=>$data->video,            
            'images'=>$images,
            'amenities'=>$amenities,
            'review'=> [
                'all_reviews'=>$reviews,
                'review_count'=>$data->review()->count(),
            ]            
            
        ];

        return response()->json([
            'data'=>$resp,
            'success'=>true
        ],200);


    }

    public function singleOffer($id){

        AddList::where('id', $id)->increment('reviews');

        $data = AddList::where('id', $id)->first();

        if(empty($data)){
            return response()->json([
                'data'=>null,
                'success'=>false,
                'message'=>'Data Not Found'
            ],200);
        }

        $images = [];
        if($data->CountImage){
            foreach($data->CountImage as $image) {
                if($image->image_url){
                    $images =  $image->image_url;
                    break;
                }
            }
        }

        if ($data->review()->where('addlist_id', '=', $data->id)->first()) {
            $ratingCount = $data->review()->where('rating', '!=', 0)->count('rating');
            $ratingSum = $data->review()->where('rating', '!=', 0)->sum('rating');
            if ($ratingCount == 0) {
                $ratingCount = 1;
            }
            $totalRating = ($ratingSum / $ratingCount);
        } else {
            $totalRating = 0;
        }

        $amenities = [];
        foreach($data->totalAmenity()->get() as $d){
            $v = Amenity::where('id', $d->amenities_id)->first();
            if($v != null){
                $amenities[] =  [
                    'label'=>$v->name,
                    'value'=>''.$v->id
                ];
            }
        }

        $reviews = [];
        foreach($data->review as $review){
            $reviews[] = [
                'title'=>$review->title,
                'description'=>$review->description,
                'rating'=>$review->rating,
                'user_fname'=>$review->user->first_name,
                'user_lname'=>$review->user->last_name,
                'user_profile'=>$review->user->profile_url,
            ];
        }

        $resp = [
            'id'=>$data->id,
            'title'=>$data->title,
            'category'=>$data->cat_id,
            'user_id'=>$data->user_id,
            'short_desc'=>$data->short_desc,
            'address'=>$data->address,
            'city'=>$data->city_id,
            'zip_code'=>$data->zip_code,
            'phone'=>$data->phone,
            'email'=>$data->email,
            'website'=>$data->website,
            'facebook'=>$data->facebook,
            'linkdin'=>$data->linkdin,
            'twitter'=>$data->twitter,
            'google'=>$data->google,
            'description'=>$data->description,
            'total_allowed_coupon'=>$data->total_allowed_coupon,
            'users_coupon_per_day'=>$data->users_coupon_per_day,
            'coupon_begin_hour'=>$data->coupon_begin_hour,
            'coupon_end_hour'=>$data->coupon_end_hour,
            'coupon_start_date'=>$data->coupon_start_date,
            'coupon_end_date'=>$data->coupon_end_date,
            'min_price'=>$data->min_price,
            'max_price'=>$data->max_price,
            'video'=>$data->video,
            'status'=>$data->status,
            'is_featured'=>$data->is_featured,
            'visits'=>$data->reviews,
            'location'=>$data->location,
            'rating'=>$totalRating,
            'video'=>$data->video,
            'images'=>$images,
            'amenities'=>$amenities,
            'review'=> [
                'all_reviews'=>$reviews,
                'review_count'=>$data->review()->count(),
            ]

        ];

        return response()->json([
            'data'=>$resp,
            'success'=>true
        ],200);


    }
}
