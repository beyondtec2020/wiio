<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Activation;
use Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;
use DB;
use App\AddList;
use App\AllImage;
use App\City;
use App\Category;
use App\Review;
use App\Report;
use App\Amenity;
use App\addlistAmenity;

use Carbon\Carbon;

class AddListController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:user-admin-moderator');
        $this->middleware('role:user');
    }

    public function index()
    {
        $cities = City::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $Amenity = Amenity::where('status', 1)->get();
        $view['content'] = view('users.addList.index', compact('cities', 'categories', 'Amenity'));
        return view('layouts.user_dashboard', $view);
    }

    public function store(Request $request)
    {
        $description = ($request->description != "<br>") ? $request->description : null;
        $amenities = ($request->amenities) ? $request->amenities : null;
        $request->merge([
            'description' => $description,
            'amenities' => $amenities,
        ]);
        $rules = [
            'title' => 'required|max:30',
            'short_desc' => 'required|min:30|max:80',
            'cat_id' => 'required',
            'address' => 'required',
            'city_id' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'amenities' => 'required',
            'total_allowed_coupon' => 'required',
            'users_coupon_per_day' => 'required',
            'coupon_begin_hour' => 'required',
            'coupon_end_hour' => 'required',
            'coupon_start_date' => 'required',
            'coupon_end_date' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
            // 'images' =>  'required|mimes:jpeg,png,jpg',
            // 'images' =>  'required',
        ];
        $messsages = [
            'title.required'=>'Campo Nome do estabelecimento é obrigatório.',
            'short_desc.required'=>'Campo Resumo da oferta é obrigatório.',
            'cat_id.required'=>'Campo Categoria é obrigatório.',
            'address.required'=>'Campo Endereço é obrigatório.',
            'city_id.required'=>'Campo Cidade é obrigatório.',
            'zip_code.required'=>'Campo CEP é obrigatório.',
            'phone.required'=>'Campo Número do telefone é obrigatório.',
            'description.required'=>'Campo Descrição é obrigatório.',
            'amenities.required'=>'Campo Dias da Semana é obrigatório.',
            'total_allowed_coupon.required'=>'Campo Total de cupons permitidos é obrigatório.',
            'users_coupon_per_day.required'=>'Campo Total de cupons por usuário é obrigatório.',
            'coupon_begin_hour.required'=>'Campo Geração de cupons começa a hora é obrigatório.',
            'coupon_end_hour.required'=>'Campo Geração de cupons termina a hora é obrigatório.',
            'coupon_start_date.required'=>'Campo data de início da vigência da oferta é obrigatório.',
            'coupon_end_date.required'=>'Campo data de termino da vigência da oferta é obrigatório.',
            'min_price.required'=>'Campo Preço orginal é obrigatório.',
            'max_price.required'=>'Campo Preço da oferta é obrigatório.',
            'images.required'=>'Campo Adicionar imagens é obrigatório.',
        ];
        $request->validate($rules, $messsages);

        $data = array();
        $data['title'] = $request->title;
        $data['slug'] = str_slug($request->title);
        $data['short_desc'] = $request->short_desc;
        $data['cat_id'] = $request->cat_id;
        $data['user_id'] = Sentinel::getUser()->id;
        $data['address'] = $request->address;
        $data['city_id'] = $request->city_id;
        $data['zip_code'] = $request->zip_code;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['website'] = $request->website;
        $data['facebook'] = $request->facebook;
        $data['linkdin'] = $request->linkdin;
        $data['twitter'] = $request->twitter;
        $data['google'] = $request->google;
        $data['description'] = $request->description;

        //Consistencies for coupon
        $data['total_allowed_coupon'] = $request->total_allowed_coupon;
        $data['users_coupon_per_day'] = $request->users_coupon_per_day;
        $data['coupon_begin_hour'] = $request->coupon_begin_hour;
        $data['coupon_end_hour'] = $request->coupon_end_hour;
        $data['coupon_start_date'] = $request->coupon_start_date;
        $data['coupon_end_date'] = $request->coupon_end_date;

        $data['min_price'] = $request->min_price;
        $data['max_price'] = $request->max_price;
        $data['video'] = $request->video;
        $data['location'] = $request->location;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        $id = DB::table('add_lists')->insertGetId($data);

        if (count($request->amenities) != 0) {
            foreach ($request->amenities as $s) {
                addlistAmenity::create([
                    'addlist_id' => $id,
                    'amenities_id' => $s
                ]);
            }
        }

        foreach ($request->images as $image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images') . '/' . $image_full_name;
            Image::make($image)->resize(750, 490)->save($location);

            $msg = AllImage::create([
                'addlist_id' => $id,
                'image' => $image_full_name
            ]);
        }

        alert()->success('Good Job', ' Successfully Updated !!');
        return redirect('/add-lists');
    }

    public function activeList()
    {
        $userId = Sentinel::getUser()->id;
        $AddList = AddList::latest()->where('user_id', $userId)->where('status', 1)->get();
        $title = "Active";
        $view['content'] = view('users.addList.activelist', compact('AddList', 'title'));
        return view('layouts.user_dashboard', $view);
    }

    public function pendingList()
    {
        $userId = Sentinel::getUser()->id;
        $AddList = AddList::latest()->where('user_id', $userId)->where('status', 0)->get();
        $title = "Pending";
        $view['content'] = view('users.addList.activelist', compact('AddList', 'title'));
        return view('layouts.user_dashboard', $view);
    }

    public function expiredList()
    {
        $userId = Sentinel::getUser()->id;
        $AddList = AddList::latest()->where('user_id', $userId)->where('status', 2)->get();
        $title = "Expired";
        $view['content'] = view('users.addList.activelist', compact('AddList', 'title'));
        return view('layouts.user_dashboard', $view);
    }

    public function destroy($id, $slug)
    {
        $data = AddList::find($id);
        $data->delete();

        $data2 = AllImage::where('addlist_id', $id)->get();
        foreach ($data2 as $value) {
            File::delete(public_path('images') . '/' . $value->image);
            $value->delete();
        }

        $data3 = addlistAmenity::where('addlist_id', $id)->get();
        foreach ($data3 as $value) {
            $value->delete();
        }

        $Review = Review::where('addlist_id', $id)->get();
        foreach ($Review as $value) {
            $value->delete();
        }

        $Report = Report::where('addlist_id', $id)->get();
        foreach ($Report as $value) {
            $value->delete();
        }

        alert()->success('Good Job', ' Successfully Deleted !!');
        return back();
    }

    public function edit($id, $slug)
    {
        $categories;
        $categories = Category::where('status', 1)->get();
        $cities = City::where('status', 1)->get();
        $Amenity = Amenity::where('status', 1)->get();
        $AddList = AddList::find($id);

        $addlistAmenity = addlistAmenity::where('addlist_id', $AddList->id)->get();

        $view['content'] = view('users.addList.edit', compact('categories', 'cities', 'AddList', 'Amenity', 'addlistAmenity'));
        return view('layouts.user_dashboard', $view);
    }

    public function preview($id, $slug)
    {
        $userId = Sentinel::getUser()->id;
        $AddList = AddList::with(['user', 'cat', 'city', 'CountImage',])->where('id', $id)->where('slug', $slug)->where('user_id', $userId)->first();
        $view['content'] = view('users.addList.preview', compact(  'AddList'));
        return view('layouts.user_dashboard', $view);
    }

    public function previewUserReport($id, $slug)
    {
        $userId = Sentinel::getUser()->id;
        $AddList = AddList::with(['user', 'cat', 'city', 'CountImage',])->where('id', $id)->where('slug', $slug)->where('user_id', $userId)->first();
        $view['content'] = view('users.addList.report', compact('category', 'city', 'AddList'));
        return view('layouts.user_dashboard', $view);
    }

    public function previewUserReview($id, $slug)
    {
        $userId = Sentinel::getUser()->id;
        $AddList = AddList::with(['user', 'cat', 'city', 'CountImage',])->where('id', $id)->where('slug', $slug)->where('user_id', $userId)->first();
        $view['content'] = view('users.addList.review', compact('category', 'city', 'AddList'));
        return view('layouts.user_dashboard', $view);
    }

    public function update(Request $request)
    {
        $description = ($request->description != "<br>") ? $request->description : null;
        $amenities = ($request->amenities) ? $request->amenities : null;
        $request->merge([
            'description' => $description,
            'amenities' => $amenities,
        ]);
        
        $rules = [
            'title' => 'required|max:30',
            'short_desc' => 'required|min:30|max:80',
            'cat_id' => 'required',
            'address' => 'required',
            'city_id' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'amenities' => 'required',
            'total_allowed_coupon' => 'required',
            'users_coupon_per_day' => 'required',
            'coupon_begin_hour' => 'required',
            'coupon_end_hour' => 'required',
            'coupon_start_date' => 'required',
            'coupon_end_date' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
        ];
        $messsages = [
            'title.required'=>'Campo Nome do estabelecimento é obrigatório.',
            'short_desc.required'=>'Campo Resumo da oferta é obrigatório.',
            'cat_id.required'=>'Campo Categoria é obrigatório.',
            'address.required'=>'Campo Endereço é obrigatório.',
            'city_id.required'=>'Campo Cidade é obrigatório.',
            'zip_code.required'=>'Campo CEP é obrigatório.',
            'phone.required'=>'Campo Número do telefone é obrigatório.',
            'description.required'=>'Campo Descrição é obrigatório.',
            'amenities.required'=>'Campo Dias da Semana é obrigatório.',
            'total_allowed_coupon.required'=>'Campo Total de cupons permitidos é obrigatório.',
            'users_coupon_per_day.required'=>'Campo Total de cupons por usuário é obrigatório.',
            'coupon_begin_hour.required'=>'Campo Geração de cupons começa a hora é obrigatório.',
            'coupon_end_hour.required'=>'Campo Geração de cupons termina a hora é obrigatório.',
            'coupon_start_date.required'=>'Campo data de início da vigência da oferta é obrigatório.',
            'coupon_end_date.required'=>'Campo data de termino da vigência da oferta é obrigatório.',
            'min_price.required'=>'Campo Preço orginal é obrigatório.',
            'max_price.required'=>'Campo Preço da oferta é obrigatório.',
            //'images.required'=>'Campo Adicionar imagens é obrigatório.',
        ];
        $request->validate($rules, $messsages);

        $data = array();
        $data['title'] = $request->title;
        $data['slug'] = str_slug($request->title);
        $data['short_desc'] = $request->short_desc;
        $data['cat_id'] = $request->cat_id;
        $data['user_id'] = Sentinel::getUser()->id;
        $data['address'] = $request->address;
        $data['city_id'] = $request->city_id;
        $data['zip_code'] = $request->zip_code;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['website'] = $request->website;
        $data['facebook'] = $request->facebook;
        $data['linkdin'] = $request->linkdin;
        $data['twitter'] = $request->twitter;
        $data['google'] = $request->google;
        $data['description'] = $request->description;

        //Consistencies for coupon
        $data['total_allowed_coupon'] = $request->total_allowed_coupon;
        $data['users_coupon_per_day'] = $request->users_coupon_per_day;
        $data['coupon_begin_hour'] = $request->coupon_begin_hour;
        $data['coupon_end_hour'] = $request->coupon_end_hour;
        $data['coupon_start_date'] = $request->coupon_start_date;
        $data['coupon_end_date'] = $request->coupon_end_date;

        $data['min_price'] = $request->min_price;
        $data['max_price'] = $request->max_price;
        $data['video'] = $request->video;
        $data['location'] = $request->location;
        $data['status'] = 0;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        $dataid = AddList::find($request->id);
        $dataid->update($data);


        $data2 = addlistAmenity::where('addlist_id', $dataid->id)->delete();


        if (count($request->amenities) != 0) {
            foreach ($request->amenities as $s) {
                addlistAmenity::create([
                    'addlist_id' => $dataid->id,
                    'amenities_id' => $s
                ]);
            }
        }


        if ($request->hasFile('images')) {

            $data23 = AllImage::where('addlist_id', $dataid->id)->get();
            foreach ($data23 as $val) {
                File::delete(public_path('images') . '/' . $val->image);
                $val->delete();
            }


            foreach ($request->images as $image) {
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $location = public_path('images') . '/' . $image_full_name;
                Image::make($image)->resize(750, 490)->save($location);

                AllImage::create([
                    'addlist_id' => $dataid->id,
                    'image' => $image_full_name
                ]);
            }
        }
        alert()->success('Good Job', ' Successfully Updated !!');
        return back();

    }

    public function deleteSingleImage($id)
    {
        $data = AllImage::find($id);
        File::delete(public_path('images') . '/' . $data->image);
        $data->delete();
        // alert()->success('Good Job', ' Image Successfully Deleted !!');
        return back();
    }

    public function replyReview()
    {
        $review = Review::with('addlist')->latest()->paginate(10);
        $view['reviews'] = view('users.reviews.index', compact('review'));
        return view('layouts.user_dashboard', $view);
    }
}
