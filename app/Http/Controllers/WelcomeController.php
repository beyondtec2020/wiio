<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\InteractionsLog;
use Illuminate\Http\Request;
use App\Category;
use App\City;
use App\User;
use App\AddList;
use App\Bookmark;
use App\Testimonial;
use App\GeneralSetting;
use App\Client;
use App\Menu;
use App\Advertise;
use DB;
use App\Review;
use App\Slider;
use App\AddviewsLog;
use Sentinel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\TraitsFolder\CommonTrait;

class WelcomeController extends Controller
{
    use CommonTrait;

    public function index()
    {

        $popular = AddList::where('status', 1)->orderby('reviews', 'desc')->take(12)->get();
        $latest = AddList::latest()->where('status', 1)->take(12)->get();
        $featured = AddList::latest()->where('status', 1)->where('is_featured', 1)->take(21)->get();
        $Testimonial = Testimonial::where('status', 1)->get();

        $title['subtitle'] = "| Home";

        $view['category'] = view('frontend.category', $title);
        $view['cities'] = view('frontend.popular-cities');
        $view['lising'] = view('frontend.popular_listings', compact('popular'));
        $view['testimonials'] = view('frontend.testimonials', compact('Testimonial'));
        $view['mostreview'] = view('frontend.most-review-listing', compact('featured'));
        $view['latest'] = view('frontend.latest', compact('latest'));

        //$data['lising'] = AddList::count();
        $data['addViewsCouont'] = AddviewsLog::count();
        //$data['categoryCount'] = Category::count();
        $data['couponCount'] = InteractionsLog::count();
        $data['users'] = User::count();
        $view['timer'] = view('frontend.timer', $data);

        $Slider = Slider::latest()->get();
        $city = City::where('status', 1)->get();
        $view['slider'] = view('frontend.slider', compact('Slider', 'city'));
        return view('welcome', $view);
    }

    public function category($id, $slug)
    {
        $category = Category::latest()->where('status', 1)->where('id', $id)->where('slug', $slug)->first();
        $view['cat_featured'] = view('frontend.cat_featured', compact('category'));
        return view('welcome', $view);
    }

    public function menu($id, $slug)
    {
        $data['menuslist'] = Menu::where('id', $id)->where('slug', $slug)->first();
        $view['me'] = view('frontend.menus', $data);
        return view('welcome', $view);
    }

    public function city($id, $slug)
    {
        $city = City::latest()->where('status', 1)->where('id', $id)->where('slug', $slug)->first();
        $view['city_featured'] = view('frontend.city_featured', compact('city'));
        return view('welcome', $view);
    }

    public function allCities()
    {
        $view['all_cities'] = view('frontend.all_cities');
        return view('welcome', $view);
    }

    public function latestProducts()
    {
        $AddList = AddList::latest()->where('status', 1)->paginate(12);
        $view['latest-products'] = view('frontend.latest-products', compact('AddList'));
        return view('welcome', $view);
    }

    public function search(Request $request)
    {
        $searchCat = $request->category;
        $searchCity = $request->city;
        if ($searchCity) {
            $cityID = City::where('slug', $searchCity)->first();
            $results = AddList::where('cat_id', $searchCat)->where('city_id', $cityID->id)->get();
            $view['searchItem'] = view('frontend.searchItem', compact('results'));
            return view('welcome', $view);
        }
    }

    /*public function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }*/

    public function singlePost(Request $request, $id, $slug)
    {
        /*Start Hit Counter for popular post */
        $hitpost = AddList::findOrFail($id);
        $d = array();
        $d['reviews'] = $hitpost->reviews + 1;
        AddList::where('id', $id)->update($d);
        /*Start Hit Counter for popular post */

        $data = AddList::where('id', $id)->where('slug', $slug)->first();

        //$ip = $this->getRealIpAddr();
        $ip = $request->ip();
       
        $api = "http://api.ipstack.com/$ip?access_key=584c48b9c47fe2bb871a6b26d82db7fb";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
       
       
        $obj = json_decode($output);
       
        $rr['ip'] = $ip;
        if (Sentinel::getUser()) {
            $rr['user_id'] = Sentinel::getUser()->id;
        } else {
            $rr['user_id'] = null;
        }
        
      
       /* $rr['latitude'] = $obj->latitude;
        $rr['longitude'] = $obj->longitude;*/
        $rr['latitude'] = "343432";
        $rr['longitude'] ="23534534";
        $rr['addlist_id'] = $data->id;
    
        

        AddviewsLog::create($rr);

        $latest = AddList::latest()->where('status', 1)->take(8)->get();
        $view['all_cities'] = view('frontend.singlePost.index', compact('data', 'latest'));
        return view('welcome', $view);
    }

    public function contactUs()
    {
        $view['contact'] = view('frontend.contact-us');
        return view('welcome', $view);
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $this->sendContact($request->email, $request->name, $request->subject, $request->message, $request->phone);
        session()->flash('message', 'Contact Message Successfully Send.');
        return redirect()->back();
    }

    public function shareWithEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ownEmail' => 'required',
            'friendEmail' => 'required',
            'message' => 'required',
        ]);

        $this->sendWithEmail($request->ownEmail, $request->name, $request->friendEmail, $request->message, $request->url);
        session()->flash('message', 'Your Mail Successfully Send.');
        return redirect()->back();
    }

    public function sendToPublisher(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'addId' => 'required',
        ]);

        $user = User::where('id', $request->userId)->first();

        $userMail = $user->email;

        if (Sentinel::getUser()) {
            $visitor_id = Sentinel::getUser()->id;
        } else {
            $visitor_id = null;
        }

        $this->sendWithPublisher($request->email, $request->name, $userMail, $request->message, $request->url, $request->addId, $visitor_id);

        return redirect()->back()->with('message', 'Your Mail Successfully Send.');
    }

    public function aboutUs()
    {
        $view['aboutUs'] = view('frontend.about-us');
        return view('welcome', $view);
    }

    public function privacy()
    {
        $view['privacy'] = view('frontend.privacy');
        return view('welcome', $view);
    }

    public function sitemap()
    {
        $view['sitemap'] = view('frontend.sitemap');
        return view('welcome', $view);
    }

    public function terms()
    {
        $view['terms'] = view('frontend.terms');
        return view('welcome', $view);
    }

    public function clickAdd($id)
    {
        $hitNews = Advertise::findOrFail($id);
        $data = array();
        $data['hit'] = $hitNews->hit + 1;
        Advertise::where('id', $id)->update($data);

        $go = $hitNews->link;
        return redirect($go);
    }

    public function generateCoupon(Request $request) {
        //dd($_SERVER);
        $offer_id = $request->get('offer_id');
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
                    if (Sentinel::getUser()) {
                        $visitor_id = Sentinel::getUser()->id;

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

                           /* $latitude = ($obj->latitude) ? $obj->latitude : 0;
                            $longitude = ($obj->longitude) ? $obj->longitude : 0;*/

                            $latitude = "343432";
                            $longitude ="23534534";
                           


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
                            $visitorDetails = User::find($visitor_id);
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
                    } else {
                        $response = array(
                            "status" => false,
                            "message" => "Usuário Inválido",//Invalid user
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
}
