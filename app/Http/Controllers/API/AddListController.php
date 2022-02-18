<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\addlistAmenity;
use App\AddList;
use File;
use App\Category;
use App\City;
use App\AllImage;
use App\Review;
use App\Report;
use App\Amenity;
use Intervention\Image\Facades\Image;
use App\InteractionsLog;
use App\TraitsFolder\CommonTrait;
use App\GeneralSetting;
use App\Http\Controllers\API\WebAPIController;

class AddListController extends Controller
{
    protected $user;

    use CommonTrait;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function rules($request){
        $description = ($request->description != "<br>") ? $request->description : null;
        $amenities = ($request->amenities) ? $request->amenities : null;
        $request->merge([
            'description' => $description,
            'amenities' => $amenities,
        ]);


        $validation = [
            'title' => 'required',
            'short_desc' => 'required',
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
            // 'images' => 'required',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
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
            // 'images.required'=>'Campo Adicionar imagens é obrigatório.',
        ];

        $rules['rules'] = $validation;
        $rules['message'] = $messsages;

        return $rules;
    }


    public function dataStub($request,$type){

        $data = array();
        $data['title'] = $request->title;
        $data['slug'] = str_slug($request->title);
        $data['short_desc'] = $request->short_desc;
        $data['cat_id'] = $request->cat_id;
        $data['user_id'] = $this->user->id;
        $data['address'] = $request->address;
        $data['city_id'] = $request->city_id;
        $data['zip_code'] = $request->zip_code;
        $data['phone'] = $request->phone;
        $data['description'] = $request->description;
        $data['total_allowed_coupon'] = $request->total_allowed_coupon;
        $data['users_coupon_per_day'] = $request->users_coupon_per_day;
        $data['coupon_begin_hour'] = $request->coupon_begin_hour;
        $data['coupon_end_hour'] = $request->coupon_end_hour;
        $data['coupon_start_date'] = $request->coupon_start_date;
        $data['coupon_end_date'] = $request->coupon_end_date;
        $data['min_price'] = $request->min_price;
        $data['max_price'] = $request->max_price;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        if($type == 'update'){
            $data['status'] = 0;
        }

        return $data;
    }

    public function create(Request $request){

        try{

            $validation = $this->rules($request);

            $validator = Validator::make($request->all(), $validation['rules'],$validation['message']);

            if ($validator->fails()) {
                return response()->json(['status'=>false,'erros'=>$validator->errors()],403);
            }

            $stubData = $this->dataStub($request,'create');

            $newAdId = DB::table('add_lists')->insertGetId($stubData);

            if ($request->amenities) {
                $amenities = explode(',',$request->amenities);
                foreach ($amenities as $s) {
                    addlistAmenity::create([
                        'addlist_id' => $newAdId,
                        'amenities_id' => $s
                    ]);
                }
            }

            if($request->has('image') && $request->get('image') != '') {
                $image = $request->get('image');
                $data = base64_decode($image);
                $image_full_name = str_random(20). '.png';
                $location = public_path('images') . '/'. $image_full_name;
                Image::make($data)->resize(750, 490)->save($location);
                AllImage::create([
                    'addlist_id' => $newAdId,
                    'image' => $image_full_name
                ]);
            }

            return response()->json(['status'=>true,'message'=>'Dados inseridos']);

        }catch(Exception $e){

            return response()->json(['status'=>false,'message'=>'Algo deu errado']);
        }
    }

    public function update(Request $request,$adID){

        try{
            if ($request->has('image') && $request->get('image') != '') {
                $data23 = AllImage::where('addlist_id', $adID)->get();
                foreach ($data23 as $val) {
                    File::delete(public_path('images') . '/' . $val->image);
                    $val->delete();
                }
                $image = $request->get('image');
                $data = base64_decode($image);
                $image_full_name = str_random(20). '.png';
                $location = public_path('images') . '/'. $image_full_name;
                Image::make($data)->resize(750, 490)->save($location);
                AllImage::create([
                    'addlist_id' => $adID,
                    'image' => $image_full_name
                ]);
            }

            $validation = $this->rules($request);

            $validator = Validator::make($request->all(), $validation['rules'],$validation['message']);

            if ($validator->fails()) {
                return response()->json(['status'=>false,'erros'=>$validator->errors()],403);
            }

            $stubData = $this->dataStub($request,'update');

            $dataid = AddList::find($adID);

            $dataid->update($stubData);

            $data2 = addlistAmenity::where('addlist_id', $adID)->delete();

            if ($request->amenities) {
                $amenities = explode(',',$request->amenities);
                foreach ($amenities as $s) {
                    addlistAmenity::create([
                        'addlist_id' => $adID,
                        'amenities_id' => $s
                    ]);
                }
            }


            return response()->json(['status'=>true,'message'=>'Dados atualizados']);

        }catch(Exception $e){

            return response()->json(['status'=>false,'message'=>'Algo deu errado']);
        }
    }

    public function delete($adID){
        try{

            $data = AddList::find($adID);

            if(empty($data)){
                return response()->json(['status'=>false,'message'=>'Dados não encontrados']);
            }

            $data->delete();

            $data2 = AllImage::where('addlist_id', $adID)->get();
            foreach ($data2 as $value) {
                File::delete(public_path('images') . '/' . $value->image);
                $value->delete();
            }

            $data3 = addlistAmenity::where('addlist_id', $adID)->get();
            foreach ($data3 as $value) {
                $value->delete();
            }

            $Review = Review::where('addlist_id', $adID)->get();
            foreach ($Review as $value) {
                $value->delete();
            }

            $Report = Report::where('addlist_id', $adID)->get();
            foreach ($Report as $value) {
                $value->delete();
            }

            return response()->json(['status'=>true,'message'=>'Dados excluídos']);

        }catch(Exception $e){

            return response()->json(['status'=>false,'message'=>'Algo deu errado']);
        }
    }

    public function myOffers(Request $request){
        ini_set('memory_limit','1600000000M');

        if ($request->user_id == 'me') {
            $resultsQuery = AddList::get();
        } else {
            $resultsQuery = AddList::where('status', 1)->get();
        }

        if($request->has('user_id') && $request->user_id == 'me'){
            $resultsQuery = $resultsQuery->where('user_id', $this->user->id);
        }

        if($request->has('category_id') && $request->category_id != 0){
            $resultsQuery = $resultsQuery->where('cat_id', $request->get('category_id'));
        }
        if($request->has('city_id') && $request->city_id != 0){
            $resultsQuery = $resultsQuery->where('city_id', $request->get('city_id'));
        }
        if($request->has('keyword') && $request->keyword != ''){
            $resultsQuery = $resultsQuery->where('title','like','%'.$request->get('keyword').'%');
        }

        $webAPI = new WebAPIController();
        $resp = $webAPI->addlist($resultsQuery);

        return response()->json([
            'data' => $resp,
            // 'next_url' => $results->nextPageUrl(),
            'success' => true
        ],200);
    }

    public function generateCoupon(Request $request,$offer_id) {

        $offerDetails = AddList::with(array(
                'user' => function($query) {
                    $query->select('id', 'email', 'first_name', 'last_name');
                },
                'totalAmenity' => function($query) {
                    $query->select('id', 'addlist_id', 'amenities_id');
                },
                'totalAmenity.amenity' => function($query) {
                    $query->select('id', 'name', 'slug');
                }
            ))
            ->where("id", $offer_id)
            ->where("status", "1")
            ->first();


        if ($offerDetails) {
            $offer_amenities = array();
            foreach ($offerDetails->totalAmenity as $each_amenity) {
                $offer_amenities[$each_amenity->amenity->id] = $each_amenity->amenity->slug;
            }
            $current_day = date('N'); //N for number 1 = Monday and 7 = Sunday

            if (empty($offerDetails->coupon_start_date) || empty($offerDetails->coupon_end_date) || empty($offerDetails->coupon_begin_hour) || empty($offerDetails->coupon_end_hour)) {
                $response = array(
                    "status" => false,
                    "message" => "Erro. Não foi possível a geração do cupom",//Coupon creation not possible
                );
            } else if (strtotime($offerDetails->coupon_start_date) > time()) {
                $response = array(
                    "status" => false,
                    "message" => "Data de criação do cupom inválida",//Coupon creation date has not yet come
                );
            } else if (strtotime($offerDetails->coupon_end_date) < time()) {
                $response = array(
                    "status" => false,
                    "message" => "Data de criação do cupom inválida",//Coupon creation date has expired
                );
            } else if (!array_key_exists($current_day, $offer_amenities)) {
                $response = array(
                    "status" => false,
                    "message" => "Cupom não permitido para o dia de hoje",//Coupon not allowed for today
                );
            } else if (strtotime(date("Y-m-d") . " " . $offerDetails->coupon_begin_hour) > time()) {
                $response = array(
                    "status" => false,
                    "message" => "Horário de geração de cupom não permitido",//Coupon creation hour has not yet come
                );
            } else if (strtotime(date("Y-m-d") . " " . $offerDetails->coupon_end_hour) < time()) {
                $response = array(
                    "status" => false,
                    "message" => "Horário de geração de cupom não permitido",//Coupon creation hour has expired
                );
            } else {
                $couponsForOffer = InteractionsLog::where('addlist_id', $offer_id)->get();

                if (count($couponsForOffer) > $offerDetails->total_allowed_coupon) {
                    $response = array(
                        "status" => false,
                        "message" => "Opa! Desculpa. Todos os cupons da oferta foram usados. Tente outra oferta.",//Oops! Sorry. All the coupons for this offer is created. Try another offer.
                    );
                } else {

                    $visitor_id = $this->user->id;

                    $usersCreatedCoupon = InteractionsLog::where('user_id', $visitor_id)
                        ->where('addlist_id', $offer_id)
                        ->whereDate('created_at', date("Y-m-d"))
                        ->get();

                    if (count($usersCreatedCoupon) >= $offerDetails->users_coupon_per_day) {
                        $response = array(
                            "status" => false,
                            "message" => "Você atingiu seu limite de geração de cupons da oferta para este dia.",//You have reached your limit of coupon creation of the offer for this day.
                        );
                    } else {
                        //Get IP
                        //$ip = $this->getRealIpAddr();
                        $ip = $request->ip();

                        //Get Latitude & Longitude
                        $api = "http://api.ipstack.com/$ip?access_key=584c48b9c47fe2bb871a6b26d82db7fb";
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $api);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        $output = curl_exec($ch);
                        curl_close($ch);
                        $obj = json_decode($output);

                        $latitude = ($obj->latitude) ? $obj->latitude : 0;
                        $longitude = ($obj->longitude) ? $obj->longitude : 0;

                        $coupon_code = $this->randString();

                        $basic = GeneralSetting::first();
                        $data = array(
                            'email_from' => $basic->office_email,
                            'name_from' => $basic->title,
                            'message' => '',
                            'addlist_id' => $offer_id,
                            'user_id' => $visitor_id,
                            'ip' => $ip,
                            'latitude' => $latitude,
                            'longitude' => $longitude,
                            'coupon_code' => $coupon_code,
                        );

                        InteractionsLog::create($data);

                        //Send Mail to Visitor and Establishment (Creator of the Offer)
                        //Send visitor email
                        $visitorDetails = $this->user;
                        $visitor_name = $visitorDetails->first_name . " " . $visitorDetails->last_name;

                        $server_name = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'www.cliquesdodia.com.br');

                        $mail_subject = 'Seu Código foi gerado com sucesso "' . $coupon_code . '"';
                        $mail_body = '<strong>Local: </strong>' . $offerDetails->title;
                        $mail_body .= '<br><strong>Código Promocional: </strong>' . $coupon_code;
                        $mail_body .= '<br><strong>Validade: </strong>' . date('d-M-Y');
                        $mail_body .= '<br><strong>Usuário: </strong>' . $visitor_name;
                        $mail_body .= '<br><br><strong>OFERTA: </strong>' . $offerDetails->short_desc;
                        $mail_body .= '<br><br><strong>DESCRIÇÃO: </strong>' . $offerDetails->description;
                        $mail_body .= '<br><br><strong>ENDEREÇO DO ESTABELECIMENTO: </strong><br>' . $offerDetails->address;
                        $mail_body .= '<br><br><strong>Valor: </strong>R$' . $offerDetails->min_price;
                        $mail_body .= '<br><strong>Preço Promocional: </strong>R$' . $offerDetails->max_price;
                        $mail_body .= '<br><br>Obrigado pelo usar o site <a href="' . $server_name . '">' . $server_name . '</a>';

                        $visitor_email = $visitorDetails->email;
                        $this->sendCouponEmail($visitor_name, $visitor_email, $mail_subject, $mail_body);

                        //Send establishment email
                        $mail_subject = 'Novo Código foi gerado para sua promoção "' . $coupon_code . '"';
                        $mail_body = '<strong>Código Promocional: </strong>' . $coupon_code;
                        $mail_body .= '<br><strong>Validade: </strong>' . date('d-M-Y');
                        $mail_body .= '<br><strong>Usuário: </strong>' . $visitor_name;
                        $mail_body .= '<br><br><strong>OFERTA: </strong>' . $offerDetails->short_desc;
                        $mail_body .= '<br><br><strong>Valor: </strong>R$' . $offerDetails->min_price;
                        $mail_body .= '<br><strong>Preço Promocional: </strong>R$' . $offerDetails->max_price;
                        $mail_body .= '<br><br>Obrigado pelo usar o site <a href="' . $server_name . '">' . $server_name . '</a>';

                        $establishment_name = $offerDetails->user->first_name . " " . $offerDetails->user->last_name;
                        $establishment_email = $offerDetails->user->email;
                        $this->sendCouponEmail($establishment_name, $establishment_email, $mail_subject, $mail_body);

                        $response = array(
                            "status" => true,
                            "message" => "Cupom gerado com sucesso, voce receberá um email com código valido para hoje.",//Successfully created coupon code for this offer for today.
                        );
                    }

                }
            }
        } else {
            $response = array(
                "status" => false,
                "message" => "Oferta inválida",//Invalid offer
            );
        }

        return response()->json($response);
    }

    public function postReview($offer_id, Request $request){
        $request->validate([
            'title' => 'required|max:80',
        ]);
         $data = new Review();
         $data->addlist_id = $offer_id;
         $data->title = $request->title;
         $data->user_id = $this->user->id;
         $data->description = $request->review;
        if($request->rating){
            $data->rating = $request->rating;
        }else{
            $data->rating = 0;
        }
         $data->save();

         if($data->save()){
            $resp = [
                'message' => 'Sua avaliação foi registrada com sucesso',
                'status' => true,
                'data' => [
                    'title' => $data->title,
                    'description' => $data->description,
                    'rating' => $data->rating,
                    'user_fname' => $data->user->first_name,
                    'user_lname' => $data->user->last_name,
                    'user_profile' => $data->user->profile_url,
                ]
            ];
            return response()->json($resp);
        }else{
            $resp =  array(
                'message' => 'Something wrong !!',
                'alert-type' => 'error',
            );
            return response()->json($resp,403);
        }
    }

    public function coupons(Request $request){
        /*Coupon Status:
            1 - Issued
            2 - Used
            3 - Expired
        */
        $interactionsQuery = InteractionsLog::query()->with('addlist')->where('user_id',$this->user->id)->where('coupon_code','!=',null);

        if($request->has('coupon_status')){
            $original_status  = (string)($request->coupon_status - 1);
            $interactionsQuery->where('status','=',$original_status)->orderBy('created_at', 'DESC');
        }
        
        $interactions = $interactionsQuery->paginate(5000);

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
                'date' => $interaction->created_at
            ];
        }

        return response()->json([
            'data'=>$resp,
            'next_url' => $interactions->nextPageUrl(),
            'success'=>true
        ],200);
    }

    public function changeCouponStatus(Request $request, $id, $status) {
        $interactionsQuery = InteractionsLog::where('id', $id)->update(['status' => $status]);

        return response()->json([
            'success' => true
        ]);
    }
}
