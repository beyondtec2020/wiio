<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\AddList;
use App\Category;
use App\Menu;
use App\Advertise;
use App\City;
use App\Social;
use App\Client;
use App\GeneralSetting;
use App\Background;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
        * Advetisement Code
        *
        */
        If (env('APP_ENV') === 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }
    $A970X250 = Advertise::where('status',1)->where('advert_size' , 5)->orderByRaw('RAND()')->take(1)->get();
        View::share('A970X250', $A970X250);    
    $A970X90 = Advertise::where('status',1)->where('advert_size' , 4)->orderByRaw('RAND()')->take(1)->get();
        View::share('A970X90', $A970X90);
    $A728X90 = Advertise::where('status',1)->where('advert_size' , 3)->orderByRaw('RAND()')->take(1)->get();
        View::share('A728X90', $A728X90);
    $A300X600 = Advertise::where('status',1)->where('advert_size' , 1)->orderByRaw('RAND()')->take(1)->get();
        View::share('A300X600', $A300X600);
    $A300X250 = Advertise::where('status',1)->where('advert_size' , 2)->orderByRaw('RAND()')->take(1)->get();
        View::share('A300X250', $A300X250);
        /*------- End Advertise-----------*/

        $AddList = AddList::latest()->get();
        View::share('AddList', $AddList);

        $city = City::with('addlists')->where('status',1)->paginate(12);
        View::share('city', $city);

        $cat = Category::orderBy('position','asc')->where('status',1)->get();
        View::share('cat', $cat);

        $menu = Menu::where('status',1)->get();
        View::share('menu', $menu);

        $Social = Social::where('status',1)->get();
        View::share('Social', $Social);

        $client = Client::where('status',1)->get();
        View::share('client', $client);
        
        $GeneralSetting = GeneralSetting::firstOrFail();
        View::share('GeneralSetting', $GeneralSetting);

        $bg = Background::first();
        View::share('bg', $bg);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
