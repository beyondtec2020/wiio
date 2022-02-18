<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('config:clear');
   return '<h1>Clear Config cleared</h1>';
});


Route::get('test', function()
{
    $float = 1.89;

   round($float);


// French notation
$nombre_format_francais = number_format($float ,2,'.', ' ');
dd(round($nombre_format_francais) );

// 1 234,56
});


Sentinel::disableCheckpoints();

Route::get('/', 'WelcomeController@index');
Route::get('/search-listing',['uses' => 'WelcomeController@search', 'as' => 'searchItem']);
Route::get('/single-category/{id}/{slug}', 'WelcomeController@category');
Route::get('/menus/{id}/{slug}', 'WelcomeController@menu');
Route::get('/single-city/{id}/{slug}', 'WelcomeController@city');
Route::get('/all-cities','WelcomeController@allCities');
Route::get('/latest-products','WelcomeController@latestProducts');
Route::get('/single-post/{id}/{slug}','WelcomeController@singlePost');
Route::get('/contact-us','WelcomeController@contactUs');
Route::post('/submitContact','WelcomeController@submitContact');
Route::post('/share-with-email','WelcomeController@shareWithEmail');
Route::post('/send-to-publisher','WelcomeController@sendToPublisher');
Route::get('/about-us','WelcomeController@aboutUs');
Route::get('/privacy','WelcomeController@privacy');
Route::get('/site-map','WelcomeController@sitemap');
Route::get('/terms-and-condition','WelcomeController@terms');
Route::get('/click-add/{id}','WelcomeController@clickAdd');
Route::post('/generate-coupon','WelcomeController@generateCoupon')->name('generate-coupon');


/*Review Post */
Route::post('/review-post','User\ReviewController@store');
Route::post('/report-post','User\ReviewController@report');
Route::post('/add-to-favourite','User\BookmarkController@add');
Route::get('/del-to-favourite/{id}/','User\BookmarkController@delete');
Route::get('/del-to-favourites/{id}/','Admin\AdminPostController@deleteBookmark');
/*User Dashboard */
Route::get('/user', ['uses' => 'UserDashboardController@index', 'as'=>'user']);
Route::get('/view-users-profile',['uses'=>'UserDashboardController@view','as'=>'viewUserProfile']);
Route::get('/edit-users-profile',['uses'=>'UserDashboardController@edit','as'=>'editUserProfile']);
/*User List */
Route::get('/add-lists',['uses'=>'User\AddListController@index','as'=>'addlist']);
Route::post('/save-lists',['uses'=>'User\AddListController@store','as'=>'saveList']);

Route::get('/add-lists-user',['uses'=>'Admin\AdminPostController@addlist','as'=>'addlistAdmin']);
Route::post('/save-lists-user',['uses'=>'Admin\AdminPostController@store','as'=>'savelistAdmin']);

Route::get('/view-active-lists',['uses'=>'User\AddListController@activeList','as'=>'activeShowList']);
Route::get('/view-pending-lists',['uses'=>'User\AddListController@pendingList','as'=>'pendingList']);
Route::get('/view-expired-lists',['uses'=>'User\AddListController@expiredList','as'=>'expiredList']);

Route::get('/view-authactive-lists','Admin\AdminPostController@activeList');
Route::get('/view-authpending-lists','Admin\AdminPostController@pendingList');
Route::get('/view-authexpired-lists','Admin\AdminPostController@expiredList');

Route::get('/preview-lists/{id}/{slug}','User\AddListController@preview');
Route::get('/preview-user-report/{id}/{slug}','User\AddListController@previewUserReport');
Route::get('/preview-user-review/{id}/{slug}','User\AddListController@previewUserReview');
Route::get('/edit-list/{id}/{slug}','User\AddListController@edit');
Route::get('/edit-listing/{id}/{slug}','Admin\AdminPostController@edit');
Route::get('/delete-list/{id}/{slug}','User\AddListController@destroy');
Route::get('/delete-listing/{id}/{slug}','Admin\AdminPostController@destroy');

Route::post('/update-lists',['uses'=>'User\AddListController@update','as'=>'updateList']);
Route::post('/update-author-lists','Admin\AdminPostController@update');
Route::get('/del-list-single-image/{id}','User\AddListController@deleteSingleImage');
Route::get('/del-listing-single-image/{id}','Admin\AdminPostController@deleteSingleImage');

Route::get('/posts', 'Admin\AdminPostController@posts');
Route::get('/active-list/{id}', 'Admin\AdminPostController@activeStatus');
Route::get('/expired-list/{id}', 'Admin\AdminPostController@expiredStatus');
Route::get('/pending-list/{id}', 'Admin\AdminPostController@pendingStatus');
Route::get('/allow-fetured-list/{id}', 'Admin\AdminPostController@allowFetured');
Route::get('/disallow-fetured-list/{id}', 'Admin\AdminPostController@disallowFetured');
Route::get('/preview-list/{id}/{slug}','Admin\AdminPostController@previewList');
Route::get('/preview-report/{id}/{slug}','Admin\AdminPostController@previewReport');
Route::get('/preview-review/{id}/{slug}','Admin\AdminPostController@previewReview');
Route::get('/bookmarks', 'User\BookmarkController@view');
Route::get('/authorBookmark', 'Admin\AdminPostController@authorBookmark');
Route::get('/review-lists', 'User\AddListController@replyReview');
/*Admin Dashboard */
Route::get('/admin', ['uses' => 'DashboardController@index', 'as'=>'admin']);

/*Category */
Route::get('/category', ['uses' => 'Admin\CategoryController@index', 'as'=>'category']);
Route::get('/add-category',['uses'=>'Admin\CategoryController@addItem', 'as'=>'addItem']);
Route::post('/save-category','Admin\CategoryController@store');
Route::get('/edit-category/{id}','Admin\CategoryController@editItem');
Route::post('/update-category','Admin\CategoryController@updateItem');
Route::post('/update-catImage','Admin\CategoryController@catImage');
Route::get('/del-category/{id}', 'Admin\CategoryController@destroy');

/*Menu */
Route::get('/menu', ['uses' => 'Admin\MenuController@index', 'as'=>'menu']);
Route::get('/add-menu',['uses'=>'Admin\MenuController@addItem', 'as'=>'addMenu']);
Route::post('/save-menu','Admin\MenuController@store');
Route::get('/edit-menu/{id}','Admin\MenuController@editItem');
Route::post('/update-menu','Admin\MenuController@updateItem');
Route::get('/del-menu/{id}', 'Admin\MenuController@destroy');

/*City */
Route::get('/city', ['uses' => 'Admin\CityController@index', 'as'=>'city']);
Route::get('/add-city',['uses'=>'Admin\CityController@addItem', 'as'=>'addCity']);
Route::post('/save-city','Admin\CityController@store');
Route::get('/edit-city/{id}','Admin\CityController@editItem');
Route::post('/update-city','Admin\CityController@updateItem');
Route::post('/update-cityImage','Admin\CityController@catImage');
Route::get('/del-city/{id}', 'Admin\CityController@destroy');

/*Social */
Route::get('/social-settings', ['uses' => 'Admin\SocialController@index', 'as'=>'social']);
Route::post('/social-settings','Admin\SocialController@addItem');
Route::get('/social-settings/{product_id?}', 'Admin\SocialController@editItem');
Route::put('/social-settings/{product_id?}', 'Admin\SocialController@updateItem');
Route::delete('/social-settings/{product_id?}','Admin\SocialController@deleteItem');

/*client */
Route::get('/clients', ['uses' => 'Admin\ClientController@index', 'as'=>'client']);
Route::get('/add-client',['uses'=>'Admin\ClientController@addItem', 'as'=>'addClient']);
Route::post('/save-client','Admin\ClientController@store');
Route::get('/edit-client/{id}','Admin\ClientController@editItem');
Route::post('/update-client','Admin\ClientController@updateItem');
Route::post('/update-clientImage','Admin\ClientController@catImage');
Route::get('/del-client/{id}', 'Admin\ClientController@destroy');

/*Amenities */
Route::get('/amenities', ['uses' => 'Admin\AmenityController@index', 'as'=>'amenities']);
Route::post('/amenities','Admin\AmenityController@addItem');
Route::get('/amenities/{product_id?}', 'Admin\AmenityController@editItem');
Route::put('/amenities/{product_id?}', 'Admin\AmenityController@updateItem');
Route::delete('/amenities/{product_id?}','Admin\AmenityController@deleteItem');

/*subscribers */
Route::get('/subscribers',['uses' =>'Admin\SubscriberController@index','as'=>'subscribers']);
Route::post('/subscribe',['uses' =>'Admin\SubscriberController@store','as'=>'subscribe']);
Route::get('/subscribers-sheet',['uses' =>'Admin\SubscriberController@csv','as'=>'subscribeCsv']);
Route::get('downloadExcel/{type}','Admin\SubscriberController@downloadExcel');
/*General Setting */ 
Route::get('/general-setting',['uses' =>'Admin\GeneralSettingController@index','as'=>'gsetting']);
Route::post('/about',['uses' =>'Admin\GeneralSettingController@about','as'=>'about']);
Route::post('/privacy',['uses' =>'Admin\GeneralSettingController@privacy','as'=>'privacy']);
Route::post('/sitemap',['uses' =>'Admin\GeneralSettingController@sitemap','as'=>'sitemap']);
Route::post('/terms-condition',['uses' =>'Admin\GeneralSettingController@terms','as'=>'terms']);
Route::post('/address',['uses' =>'Admin\GeneralSettingController@address','as'=>'address']);
Route::post('/footer',['uses' =>'Admin\GeneralSettingController@footer','as'=>'footer']);
Route::post('/web-content',['uses'=>'Admin\GeneralSettingController@webContent','as'=>'webContent']);
Route::post('/update-logo',['uses'=>'Admin\GeneralSettingController@logo','as'=>'logo']);
Route::post('/update-favico',['uses'=>'Admin\GeneralSettingController@favico','as'=>'favico']);
Route::post('/update-Preloader',['uses'=>'Admin\GeneralSettingController@preloader','as'=>'Preloader']);
Route::post('/update-gmaps',['uses'=>'Admin\GeneralSettingController@gmaps','as'=>'gmaps']);

Route::get('/general-setting-text',['uses' =>'Admin\GeneralSettingController@text','as'=>'gsettingText']);

/*Slider*/
Route::get('/manage-slider','Admin\SliderController@index');
Route::get('/add-slider','Admin\SliderController@add');
Route::post('/add-slider','Admin\SliderController@store');
Route::get('/delete-slider/{id}','Admin\SliderController@destroy');

/*Background  */
Route::get('/background-image',['uses'=> 'Admin\BackgroundController@index', 'as'=>'background']);
Route::post('/search_bg','Admin\BackgroundController@searchbg');
Route::post('/testimonial_bg','Admin\BackgroundController@testimonialbg');
Route::post('/timer_bg','Admin\BackgroundController@timerbg');
Route::post('/subscriber_bg','Admin\BackgroundController@subscriberbg');
Route::post('/about_bg','Admin\BackgroundController@aboutbg');
Route::post('/contact_bg','Admin\BackgroundController@contactbg');


/* Seo Controller Start*/
Route::get('/seo-settings',['uses' =>'Admin\SeoController@index', 'as'=>'seo']);
Route::post('/metakeyword',['uses' =>'Admin\SeoController@metakeyword', 'as'=>'metakeyword']);
Route::post('/analytics',['uses' =>'Admin\SeoController@analytics', 'as'=>'analytics']);
Route::post('/fbcomment',['uses' =>'Admin\SeoController@fbcomment', 'as'=>'fbcomment']);

/* Staffs Controller Start*/
Route::get('/staffs',['uses' =>'Admin\StaffController@index','as'=>'staffs']);
Route::get('/add-staffs',['uses' =>'Admin\StaffController@addstaffs','as'=>'addstaffs']);
Route::post('/add-staffs',['uses' =>'Admin\StaffController@store','as'=>'savestaffs']);
Route::get('/edit-staffs/{id}',['uses' =>'Admin\StaffController@edit','as'=>'editstaffs']);
Route::post('/edit-staffs',['uses' =>'Admin\StaffController@update','as'=>'updatestaffs']);
Route::post('/edit-staffs-role',['uses' =>'Admin\StaffController@updateRole','as'=>'updateRole']);
Route::post('/edit-staffs-pass',['uses' =>'Admin\StaffController@updatePass','as'=>'updatePassw']);
Route::get('/delete-staff/{id}',['uses'=>'Admin\StaffController@destroy','as'=>'deletestaff']);
Route::get('/pb-staff/{id}',['uses'=>'Admin\StaffController@publish','as'=>'pbstaff']);
Route::get('/upb-staff/{id}',['uses'=>'Admin\StaffController@unpublish','as'=>'upbstaff']);

/* Advertise Controller Start*/
Route::get('/advertise',['uses' =>'Admin\AdvertiseController@index','as'=>'advertise']);
Route::get('/add-advertise',['uses'=>'Admin\AdvertiseController@addAdvert','as'=>'addAdvertise']);
Route::post('/add-advertise',['uses'=>'Admin\AdvertiseController@store','as'=>'saveAdd']);
Route::get('/edit-advertise/{id}',['uses'=>'Admin\AdvertiseController@edit','as'=>'editAdvertise']);
Route::post('/edit-advertise',['uses' =>'Admin\AdvertiseController@update','as'=>'updateAdvert']);
Route::get('/del-advertise/{id}',['uses'=>'Admin\AdvertiseController@destroy','as'=>'delAdvert']);

/* Advertise Controller Start*/
Route::get('/testimonial','Admin\TestimonialController@index');
Route::get('/add-testimonial','Admin\TestimonialController@add');
Route::post('/add-testimonial','Admin\TestimonialController@store');
Route::get('/edit-testimonial/{id}','Admin\TestimonialController@edit');
Route::post('/update-testimonial','Admin\TestimonialController@update');
Route::get('/delete-testimonial/{id}','Admin\TestimonialController@destroy');

/* Login & Registration   */
Route::get('/register','UserRegisterController@index');
Route::post('/register',['uses'=>'UserRegisterController@store', 'as'=>'register']);

Route::get('/login','UserLoginController@index');
Route::post('/login',['uses' =>'UserLoginController@login','as'=> 'login']);
Route::get('/logout',['uses' =>'UserLoginController@logout','as'=> 'logout']);

Route::post('/login-review',['uses' =>'UserLoginController@loginReview','as'=> 'loginReview']);

Route::get('/editProfile',['uses'=>'Admin\ProfileController@editProfile','as'=>'editProfile']);
Route::post('/editProfile',['uses'=>'Admin\ProfileController@updatePass','as'=>'updatePass']);
Route::post('/updateProfile',['uses'=>'Admin\ProfileController@updateProfile','as'=>'updateProfile']);
Route::post('/update-Profile',['uses'=>'Admin\ProfileController@Profile','as'=>'profile']);

Route::get('/moderator', 'ModeratorController@index');



/*============== Admin Password Reset Route list ===========================*/

Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');


Route::get('/cleareverything', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearview = Artisan::call('config:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $jwtSecret = shell_exec('sudo service apache2 restart');
    echo "JWT Secret<br>";
});