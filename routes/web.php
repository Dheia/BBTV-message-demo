<?php
use Illuminate\Support\Facades\Route;
// use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\FanController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\PermissionsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\MailController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\AttributeValueController;
use App\Http\Controllers\admin\GiftCardController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\HomepageController;
use App\Http\Controllers\admin\TaxController;
use App\Http\Controllers\admin\CurrencyController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\ModelsController;
use App\Http\Controllers\admin\QueryController;
use App\Http\Controllers\admin\ModelOrientationController;
use App\Http\Controllers\admin\ModelCategoryController;
use App\Http\Controllers\admin\ModelEthnicityController;
use App\Http\Controllers\admin\ModelLanguageController;
use App\Http\Controllers\admin\ModelHairController;
use App\Http\Controllers\admin\ModelFetishesController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\VendorSettingController;
use App\Http\Controllers\admin\GeneralSettingController;
use App\Http\Controllers\admin\SupportCategoryController;
use App\Http\Controllers\admin\WithdrowController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\TestimonialsController;
use App\Http\Controllers\admin\BidController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\EmailMarketingController;
use App\Http\Controllers\admin\TagsController;
use App\Http\Controllers\admin\NotificationsController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\SupportTicketsController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\frontend\fan\fandashboardController;
use App\Http\Controllers\frontend\fan\AccountLogdashboardsController;
use App\Http\Controllers\frontend\fan\CollectiondashboardController;
use App\Http\Controllers\frontend\fan\ContactsdashboardController;
use App\Http\Controllers\frontend\fan\FeedsdashboardController;
use App\Http\Controllers\frontend\fan\ModelsdahboardController;
use App\Http\Controllers\frontend\model\ModeldashboardController;
use App\Http\Controllers\frontend\model\FeedsController;
use App\Http\Controllers\StripeController;


Route::group(['middleware' => ['auth','Model_steps']], function() {
  Route::get('step-form',[App\Http\Controllers\HomeController::class, 'model_step'])->name('step-form');
});
Route::get('pagination/fetch_data', [App\Http\Controllers\frontend\FrontendController::class, 'fetch_data_newmodel'])->name('pagination');
Route::get('home-email-check', [App\Http\Controllers\frontend\FrontendController::class, 'home_email_check'])->name('home-email-check');
Route::get('fan-email-verify/{id}', [App\Http\Controllers\frontend\FrontendController::class, 'fan_email_verify'])->name('fan-email-verify');

//login-signup
Route::get('user-login',[App\Http\Controllers\HomeController::class, 'logs'])->name('user-login');
Route::get('forgot-password',[App\Http\Controllers\HomeController::class, 'forgot'])->name('forgot-password');

Route::get('refferal-apply',[App\Http\Controllers\HomeController::class, 'joinmodel'])->name('refferal-apply');
Route::get('user-signup',[App\Http\Controllers\HomeController::class, 'signup'])->name('user-signup');
Route::get('sign-up',[App\Http\Controllers\HomeController::class, 'registeruser'])->name('sign-up');
Route::get('storeuser',[App\Http\Controllers\HomeController::class, 'joinmodel'])->name('storeuser');
Route::post('storeuser',[App\Http\Controllers\HomeController::class, 'storeuser'])->name('storeuser');
Route::get('my-account',[App\Http\Controllers\HomeController::class, 'userlogin'])->name('my-account');
Route::post('mainlogin',[App\Http\Controllers\HomeController::class, 'postlogin'])->name('mainlogin');
Route::post('save-model',[App\Http\Controllers\HomeController::class, 'savemodel'])->name('save-model');
Route::post('user_support',[App\Http\Controllers\HomeController::class, 'user_support'])->name('user_support');

//online page
Route::post('model-filter',[App\Http\Controllers\frontend\FrontendController::class, 'getmodel'])->name('model-filter');
Route::post('model-sort',[App\Http\Controllers\frontend\FrontendController::class, 'getmodelsort'])->name('model-sort');

//model-search on home page

Route::get('search-model',[App\Http\Controllers\frontend\FrontendController::class, 'search_model'])->name('search-model');

Route::POST('model-steps',[App\Http\Controllers\frontend\model\ModeldashboardController::class, 'model_steps'])->name('model-steps');
Route::get('earning-time-filter',[App\Http\Controllers\HomeController::class, 'earning_time_filter'])->name('earning-time-filter');
Route::get('earning-model-filter',[App\Http\Controllers\HomeController::class, 'earning_model_filter'])->name('earning-model-filter');
Route::get('earning-user-filter',[App\Http\Controllers\HomeController::class, 'earning_user_filter'])->name('earning-user-filter');

Route::group([ 'middleware' => ['DashboardMiddleware']], function () { 
 //online page

  Route::get('online-now',[App\Http\Controllers\frontend\FrontendController::class, 'online'])->name('online-now');

  //phonesex page
  Route::get('phone-sex',[App\Http\Controllers\frontend\FrontendController::class, 'phonesex'])->name('phone-sex');

  //Trems page
  Route::get('/terms-conditions',[App\Http\Controllers\frontend\FrontendController::class, 'terms_conditions'])->name('terms-conditions');

  //videosex page
  Route::get('video-calls',[App\Http\Controllers\frontend\FrontendController::class, 'videocalls'])->name('video-calls');

  //top model page
  Route::get('top-models',[App\Http\Controllers\frontend\FrontendController::class, 'topmodel'])->name('top-models');

  //trending model page
  Route::get('trending',[App\Http\Controllers\frontend\FrontendController::class, 'trending'])->name('trending');

  //billing page
  Route::get('billing',[App\Http\Controllers\frontend\FrontendController::class, 'billing'])->name('billing');

  //faq page
  Route::get('faq',[App\Http\Controllers\frontend\FrontendController::class, 'faq'])->name('faq');

  //contact page
  Route::get('contact',[App\Http\Controllers\frontend\FrontendController::class, 'contact'])->name('contact');

  //contact page
  Route::get('billing',[App\Http\Controllers\frontend\FrontendController::class, 'contact'])->name('billing');
  //contact page
  Route::get('tags/{id}',[App\Http\Controllers\frontend\FrontendController::class, 'tags'])->name('tags');
  //new model page
  Route::get('new-models',[App\Http\Controllers\frontend\FrontendController::class, 'newmodel'])->name('new-models');

  //explore model page
  Route::get('explore',[App\Http\Controllers\frontend\FrontendController::class, 'explore'])->name('explore');
});


//user_support
Route::get('model-register', function () {
       return view('frontend.success-model-regi');
     })->name('model-register');  

//model feed likes
Route::post('/addlike',[App\Http\Controllers\frontend\FrontendController::class, 'addlike'])->name('addlike');

//how adult works page
Route::get('how-adultx-works',[App\Http\Controllers\frontend\FrontendController::class, 'adultwork'])->name('how-adultx-works');

//how adult works page
Route::post('logout-user',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout-user');

Auth::routes(['register' => true]);

Route::group(['prefix' => '', 'as' => '.', 'middleware' => ['DashboardMiddleware']], function () { 
  Route::redirect('/home', '/');
  Route::get('/',[App\Http\Controllers\frontend\FrontendController::class, 'index'])->name('main');
});

Route::post('/credit-call', [App\Http\Controllers\VoiceController::class, 'creditCall'])->name('credit-call');
Route::post('/end-call', [App\Http\Controllers\VoiceController::class, 'endCall'])->name('end-call');
Route::post('/check-call-ballance', [App\Http\Controllers\VoiceController::class, 'checkCallBallance'])->name('check-call-ballance');
Route::post('/clear-call-records', [App\Http\Controllers\VoiceController::class, 'clearCallRecords'])->name('clear-call-records');



Route::POST('model-online-notify', [fandashboardController::class, 'model_online_notify']);
Route::group(['prefix' => 'fan', 'as' => 'fan.', 'middleware' => ['auth','FanMiddleware']], function () { 
  Route::GET('feed_impressions',[FeedsController::class,'feed_impressions']);
  Route::get('dismiss-notifications',[ModeldashboardController::class, 'dismiss_notifications']);
  
  Route::get('/call', [App\Http\Controllers\VoiceController::class, 'initiateCall'])->name('initiate_call');
  
  Route::get('sendSMS', [fandashboardController::class, 'sendsms']);
  Route::get('add-contact-ajax',[ModeldashboardController::class, 'add_contact_ajax']);
  Route::get('feeds-render',[ModeldashboardController::class, 'feeds_render']);
  Route::post('prefrence', [fandashboardController::class, 'prefrence']);
  Route::get('online-now',[fandashboardController::class, 'online'])->name('online-now');
  Route::get('phone-sex',[fandashboardController::class, 'phonesex'])->name('phone-sex');
  Route::get('video-calls',[fandashboardController::class, 'videocalls'])->name('video-calls');
  Route::get('top-models',[fandashboardController::class, 'topmodel'])->name('top-models');
  Route::get('new-models',[fandashboardController::class, 'newmodel'])->name('new-models');
  Route::resource('explore',FeedsdashboardController::class);
  Route::get('add-like',[fandashboardController::class, 'add_like']);
  Route::POST('report-post',[fandashboardController::class, 'report_post']);
  Route::GET('model-tip',[fandashboardController::class, 'model_tip']);
  Route::get('send-message-feed',[fandashboardController::class, 'send_message']);
  Route::POST('feed-unlock',[fandashboardController::class, 'feed_lock']);
  Route::POST('feed-unlock-ajax',[fandashboardController::class, 'feedLockAjax']);
  Route::GET('add-collection',[fandashboardController::class,'add_collection'])->name('add-collection');
  Route::resource('dashboard',fandashboardController::class);
  Route::post('/add-credit',[fandashboardController::class, 'add_credit']);
  Route::get('/add-contact/{id}',[fandashboardController::class, 'add_contact']);
  Route::resource('account-logs',AccountLogdashboardsController::class);
  Route::get('call-logs',[AccountLogdashboardsController::class, 'CallLogs'])->name('call-logs');
  Route::resource('collection',CollectiondashboardController::class);
  Route::get('contacts',[fandashboardController::class, 'contacts'])->name('contacts');
  Route::resource('feeds',FeedsdashboardController::class);
  Route::post('addmodel',[fandashboardController::class,'addmodel'])->name('addmodel');
  Route::get('delmodel/{id}',[FeedsdashboardController::class,'delmodel']);
  Route::get('deluser/{id}',[fandashboardController::class,'deluser'])->name('deluser');
  Route::post('dactive/{id}',[fandashboardController::class,'dactive'])->name('dactive');
  Route::get('waalet_status',[fandashboardController::class,'waalet_status'])->name('waalet_status');
  Route::get('settings',[fandashboardController::class,'settings'])->name('settings');
  Route::get('models',[fandashboardController::class, 'models']);
  Route::get('payment', [StripeController::class, 'stripe']);
  Route::post('paymentpost', [StripeController::class, 'stripePost'])->name('payment.post');
  Route::post('notification', [fandashboardController::class, 'notification'])->name('notification');
  Route::get('faq',[fandashboardController::class,'faq'])->name('faq');
  Route::get('contact',[fandashboardController::class,'contact'])->name('contact');
  Route::get('referral-bonus',[ModeldashboardController::class,'referralbonus'])->name('referral-bonus');
  Route::get('legal',[fandashboardController::class,'legal'])->name('legal');
  Route::get('code-of-conduct',[fandashboardController::class,'conduct'])->name('code-of-conduct');
  Route::get('chargeback-protection',[fandashboardController::class,'protection'])->name('chargeback-protection');
  Route::post('modeldetailssave',[ModeldashboardController::class,'modeldetailssave'])->name('modeldetailssave');
  Route::post('passwordupdate',[ModeldashboardController::class,'passwordupdate'])->name('passwordupdate');
  Route::post('profileupdate',[ModeldashboardController::class,'profileupdate'])->name('profileupdate');
});
Route::group(['prefix' => 'model', 'as' => 'model.', 'middleware' => ['auth','ModelMiddleware']], function () { 
  
  Route::get('feed-update-popup-ajax',[ModeldashboardController::class, 'feed_update_popup_ajax']);
  Route::post('feed-update-popup',[ModeldashboardController::class,'feed_update_popup'])->name('feed-update-popup');
  Route::get('verify-new-email',[ModeldashboardController::class, 'verify_new_email']);
  Route::get('dismiss-notifications',[ModeldashboardController::class, 'dismiss_notifications']);
  Route::get('verify-email',[ModeldashboardController::class, 'verify_email']);
  Route::get('away-mode',[ModeldashboardController::class, 'away_mode']);
  Route::get('re-schedule',[ModeldashboardController::class, 're_schedule_feed']);
  Route::get('sleep-mode-off',[ModeldashboardController::class, 'sleep_mode_off']);
  Route::get('sleep-mode',[ModeldashboardController::class, 'sleep_mode']);
  Route::get('model-availability',[ModeldashboardController::class, 'model_availability']);
  Route::get('model-availability-off',[ModeldashboardController::class, 'model_availability_off']);
  Route::resource('dashboard',ModeldashboardController::class);
  Route::resource('feeds',FeedsController::class);

  Route::get('explore',[ModeldashboardController::class,'explore'])->name('explore');
  Route::get('pricing',[ModeldashboardController::class,'pricing'])->name('pricing');
  Route::get('calls',[ModeldashboardController::class,'calls'])->name('calls');
  // Route::get('{slug}',[App\Http\Controllers\ProfileController::class, 'index']);
  Route::get('earnings',[ModeldashboardController::class,'earnings'])->name('earnings');
  Route::post('paymentdetails',[ModeldashboardController::class,'paymentdetails'])->name('paymentdetails');
  Route::GET('audiocalling',[ModeldashboardController::class,'audiocalling'])->name('audiocalling');
  Route::post('tip-update',[ModeldashboardController::class,'tip_update'])->name('tip-update');
  Route::GET('videocalling',[ModeldashboardController::class,'videocalling'])->name('videocalling');
  Route::get('payout-history',[ModeldashboardController::class,'payouthistory'])->name('payout-history');
  Route::get('top-spenders',[ModeldashboardController::class,'topspenders'])->name('top-spenders');
  Route::get('leaderboard',[ModeldashboardController::class,'leaderboard'])->name('leaderboard');
  Route::get('tips',[ModeldashboardController::class,'tips'])->name('tips');
  Route::post('priceset',[ModeldashboardController::class,'priceset'])->name('priceset');
  Route::get('paymentInfo',[ModeldashboardController::class,'paymentInfo'])->name('paymentInfo');
  Route::Post('updateprofile',[ModeldashboardController::class,'updateprofile'])->name('updateprofile');
  Route::post('draft-feed-post-now',[FeedsController::class,'draft_feed_post_now'])->name('draft-feed-post-now');
  Route::post('feeds-pin',[FeedsController::class,'pin'])->name('feeds-pin');
 
  
  Route::get('profile-edit/{id}',[ModeldashboardController::class,'profile'])->name('profile-edit');
  Route::post('update_title',[FeedsController::class,'update_title'])->name('update_title');
  Route::post('feed-delete',[FeedsController::class,'feed_delete'])->name('feed-delete');
  Route::get('settings',[ModeldashboardController::class,'settings'])->name('settings');
  // Route::post('modeldetailssave',[ModeldashboardController::class,'modeldetailssave'])->name('modeldetailssave');
  Route::post('phonesave',[ModeldashboardController::class,'phonesave'])->name('phonesave');
  Route::post('emailsave',[ModeldashboardController::class,'emailsave'])->name('emailsave');
  Route::post('timezone',[ModeldashboardController::class,'timezone'])->name('timezone');
  Route::post('locatiosave',[ModeldashboardController::class,'locationsave'])->name('locatiosave');
  Route::post('deletelocation',[ModeldashboardController::class,'deletelocation'])->name('deletelocation');
  Route::post('passwordupdate',[ModeldashboardController::class,'passwordupdate'])->name('passwordupdate');
  // Route::post('profileupdate',[ModeldashboardController::class,'profileupdate'])->name('profileupdate');
  Route::post('notification',[ModeldashboardController::class,'notification'])->name('notification');
  Route::get('faq',[ModeldashboardController::class,'faq'])->name('faq');
  Route::get('contact',[ModeldashboardController::class,'contact'])->name('contact');
    Route::get('referral-bonus',[ModeldashboardController::class,'referralbonus'])->name('referral-bonus');
  Route::get('legal',[ModeldashboardController::class,'legal'])->name('legal');
  Route::get('code-of-conduct',[ModeldashboardController::class,'conduct'])->name('code-of-conduct');
  Route::get('chargeback-protection',[ModeldashboardController::class,'protection'])->name('chargeback-protection');
});
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth','AdminDashboard']], function () {

    Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
//   Route::get('/', 'HomeController@index')->name('home');

//   Route::get('/', function () {
//     return view('index');
//   });


  //Users

  Route::resource('users', UsersController::class);
  Route::get('user-sorting', [UsersController::class, 'sortuser'])->name('user-sorting');
  Route::resource('fans', FanController::class);


  

  //Roles
  Route::resource('roles', RolesController::class);

  //Permission
  Route::resource('permissions', PermissionsController::class);

  Route::get('country', [VendorSettingController::class, 'countrylist'])->name('country');

  Route::post('fetch-states', [VendorSettingController::class, 'fetchState']);

  Route::post('fetch-cities', [VendorSettingController::class, 'fetchCity']);

  Route::get('vendor-add', [VendorSettingController::class, 'vendoradd']);

  Route::post('vendor-added', [VendorSettingController::class, 'vendoradded']);

  //User_support


   //Product

  Route::resource('product', ProductController::class);

  Route::post('get-attr-value', [ProductController::class, 'getAtrValue'])->name('get-attr-value');

  Route::post('get-attr-value-single', [ProductController::class, 'getAtrValueSingleSelect'])->name('get-attr-value-single');



  //create variants

  Route::post('create-varient', [ProductController::class, 'createVarient'])->name('create-varient');

  Route::post('product-search', [CouponController::class, 'productSearch'])->name('product-search');

  Route::post('user-search', [CouponController::class, 'usersSearch'])->name('user-search');



  //Order

  Route::resource('order', OrderController::class);



  //Pages

  Route::resource('pages', PagesController::class);

  //Mail

  Route::resource('mail', MailController::class);

//Querys
  Route::resource('querys', QueryController::class);

  //Models
  Route::resource('models', ModelsController::class);
  Route::get('models-sorting', [ModelsController::class, 'sortmodel'])->name('models-sorting');

  //Model-Orientation

  Route::resource('model-orientation', ModelOrientationController::class);

  //Model-Category

  Route::resource('model-category', ModelCategoryController::class);

  //Model-Ethnicity

  Route::resource('model-ethnicity', ModelEthnicityController::class);

  //Model-Language

  Route::resource('model-language', ModelLanguageController::class);

  //Model-Hair

  Route::resource('model-hair', ModelHairController::class);

  //Model-fetishes

  Route::resource('model-fetishes', ModelFetishesController::class);

  //Dashboard

  Route::resource('dashboard', DashboardController::class);

  Route::get('bank-details/{id}',[ModelsController::class, 'bankdetail'])->name('bank-details');

  //FAQ

  Route::resource('faq', FaqController::class);



  //testimonials

  Route::resource('testimonials', TestimonialsController::class);





  //support category

  Route::resource('support-category', SupportCategoryController::class);



  //support

  Route::resource('support-tickets', SupportTicketsController::class)->name('*', 'support-tickets');



  //support comment

  Route::post('support-comments', [App\Http\Controllers\admin\SupportTicketsController::class, 'sendComment'])->name('support-comments');





  //ticket close

  Route::post('close-ticket', [App\Http\Controllers\admin\SupportTicketsController::class, 'closeTicket'])->name('close-ticket');



  //Add new city

  Route::get('city-add', [App\Http\Controllers\admin\MenuController::class, 'cityadd'])->name('city-add');

  Route::post('store-city', [App\Http\Controllers\admin\MenuController::class, 'citystore'])->name('store-city');



  //Category

  Route::resource('category', CategoryController::class);

  Route::post('category-pagination', [App\Http\Controllers\admin\CategoryController::class, 'pagination'])->name('category-pagination');

  //Attribute

  Route::resource('attribute', AttributeController::class);



  Route::get('add-value/{id}', [App\Http\Controllers\admin\AttributeController::class, 'addvalue']);



  Route::POST('save-value/{id}', [App\Http\Controllers\admin\AttributeController::class, 'saveatrvalue']);



  //Attribute value



  Route::resource('attribute-value', AttributeValueController::class);

  Route::get('attr-value/{id}', [App\Http\Controllers\admin\AttributeValueController::class, 'attrValdata'])->name('attr-value');

  //Gift Card



  Route::resource('gift-card', GiftCardController::class);

  Route::get('card-deatils', [App\Http\Controllers\admin\GiftCardController::class, 'index2'])->name('card-deatils');

  Route::get('gift-card-transaction', [App\Http\Controllers\admin\GiftCardController::class, 'giftcardTransaction'])->name('gift-card-transaction');



  Route::get('transaction-show/{id}', [App\Http\Controllers\admin\GiftCardController::class, 'transactionShow'])->name('transaction-show');



  Route::get('dummy-page-design', [App\Http\Controllers\admin\PagesController::class, 'dummydesign']);



  // Coupon

  Route::resource('coupon', CouponController::class);

  //Brand

  Route::resource('brand', BrandController::class);

  //Tax

  Route::resource('tax', TaxController::class);

  //generalsetting

  Route::resource('general-setting', GeneralSettingController::class)->name('*', 'general-setting');



  // Home Page

  Route::resource('homepage', HomepageController::class);

  //currency

  Route::resource('currency', CurrencyController::class);



  // settings



  Route::resource('settings', SettingsController::class);



  Route::post('language', [App\Http\Controllers\SettingsController::class, 'language'])->name('language');



  // Route::post('currency',[App\Http\Controllers\SettingsController::class, 'currency'])->name('currency');



  //Vendor settings

  Route::resource('vendorsettings', VendorSettingController::class);



  Route::get('vendorsetting', [App\Http\Controllers\admin\VendorSettingController::class, 'index2'])->name('vendor-setting');



  Route::post('vendor-setting-update', [App\Http\Controllers\admin\VendorSettingController::class, 'storedata'])->name('vendor-setting-update');



  Route::get('vendorsetting-admin', [App\Http\Controllers\admin\VendorSettingController::class, 'index3'])->name('vendor-setting-admin');

  //Approve & Reject Vendor



  Route::get('vendor-approve/{id}', [App\Http\Controllers\admin\VendorSettingController::class, 'approveVendor'])->name('vendor-approve');



  Route::get('vendor-rejected/{id}', [App\Http\Controllers\admin\VendorSettingController::class, 'rejectVendor'])->name('vendor-rejected');



  //approve product

  Route::get('approve-product/{id}', [App\Http\Controllers\admin\ProductController::class, 'productapprove'])->name('approve-product');

  Route::post('reject-product/{id}', [App\Http\Controllers\admin\ProductController::class, 'rejectapprove'])->name('reject-product');



  //Withdrow Request

  Route::resource('withdrow', WithdrowController::class);



  Route::get('approve-request', [App\Http\Controllers\admin\WithdrowController::class, 'approve'])->name('approve-request');



  Route::get('reject-request', [App\Http\Controllers\admin\WithdrowController::class, 'reject'])->name('reject-request');



  Route::get('vendor-earning-list', [App\Http\Controllers\admin\WithdrowController::class, 'vendorEarninglist'])->name('vendor-earning-list');



  Route::post('req-withdrow', [App\Http\Controllers\admin\WithdrowController::class, 'withdrowreq'])->name('req-withdrow');





  //test route



  Route::get('chron-fn', [App\Http\Controllers\Controller::class, 'chronfn'])->name('chron-fn');



  //blogs category

  Route::resource('blog-category', BlogCategoryController::class);
  Route::get('dashboard/blogs/{id}', [BlogCategoryController::class,'destroy']);



  //blogs

  Route::resource('blogs', BlogController::class);


  //blog tags
  Route::resource('tags', TagsController::class);


  //Notifications
  Route::resource('notifications', NotificationsController::class);

//email
  Route::resource('email-marketing', EmailMarketingController::class);



  //Menus

  Route::resource('menus', MenuController::class);

  // Logs

  Route::get('add-to-log', [App\Http\Controllers\HomeController::class, 'myTestAddToLog'])->name('add-to-log');

  Route::get('logActivity', [App\Http\Controllers\HomeController::class, 'logActivity'])->name('logActivity');
  Route::get('user-logs', [App\Http\Controllers\HomeController::class, 'user_logs'])->name('user-logs');
  Route::delete('logsdelete/{id}', [App\Http\Controllers\HomeController::class, 'logsdelete'])->name('logsdelete');
  Route::delete('user-logsdelete/{id}', [App\Http\Controllers\HomeController::class, 'user_logsdelete'])->name('user-logsdelete');


  Route::post('get-attr-select', [App\Http\Controllers\admin\ProductController::class, 'getAtrValueSelect'])->name('get-attr-select');

  // reviews

  Route::resource('review', ReviewController::class);



  Route::get('user', [App\Http\Controllers\admin\UsersController::class, 'index2'])->name('user-index');

  Route::post('user-block', [App\Http\Controllers\admin\UsersController::class, 'blockUser'])->name('user-block');
  Route::put('user-unblock/{id}', [App\Http\Controllers\admin\UsersController::class, 'unblockUser'])->name('user-unblock');
  Route::put('user-verify/{id}', [App\Http\Controllers\admin\UsersController::class, 'Userverify'])->name('user-verify');
  Route::put('model-decline/{id}', [App\Http\Controllers\admin\UsersController::class, 'model_decline'])->name('model-decline');

  Route::get('store-cadit', [App\Http\Controllers\admin\UsersController::class, 'storeCradit'])->name('store-cadit');

  Route::post('store-transection', [App\Http\Controllers\admin\UsersController::class, 'storeTransection'])->name('store-transection');

  Route::get('document-delete/{id}', [ModelsController::class, 'document_delete'])->name('document-delete');

  Route::get('delivered-orders', [App\Http\Controllers\admin\OrderController::class, 'deliveredorders'])->name('delivered-orders');

  Route::get('order-qty-update', [App\Http\Controllers\admin\OrderController::class, 'orderQtyUpdate'])->name('order-qty-update');

  Route::post('refund-order', [App\Http\Controllers\admin\OrderController::class, 'refundAmount'])->name('refund-order');

  Route::post('chnage-order-status', [App\Http\Controllers\admin\OrderController::class, 'changestatus'])->name('chnage-order-status');

  Route::get('invoice/{id}', [App\Http\Controllers\admin\OrderController::class, 'orderInvoice'])->name('invoice');



  //customer

  Route::get('customers', [App\Http\Controllers\admin\UsersController::class, 'customer'])->name('customers');



  //import customer



  Route::get('view-customer', [App\Http\Controllers\admin\UsersController::class, 'importView'])->name('view-customer');

  Route::post('import-customer', [App\Http\Controllers\admin\UsersController::class, 'importCustomer'])->name('import-customer');





  //cahce clear

 




  //product import



  Route::get('file-import', [App\Http\Controllers\admin\ProductController::class, 'importView'])->name('import-view');

  Route::post('import-product', [App\Http\Controllers\admin\ProductController::class, 'importproduct'])->name('import-product');

  Route::get('export-product', [App\Http\Controllers\admin\ProductController::class, 'exportProduct'])->name('export-product');





  //Vendor import



  Route::get('vendor-view', [App\Http\Controllers\admin\VendorSettingController::class, 'importView'])->name('vendor-view');

  Route::post('import-vendor', [App\Http\Controllers\admin\VendorSettingController::class, 'importvendor'])->name('import-vendor');



  //order export



  Route::get('export-orders', [App\Http\Controllers\admin\OrderController::class, 'exportOrder'])->name('export-orders');





  //user export

  Route::get('export-users', [App\Http\Controllers\admin\UsersController::class, 'exportUsers'])->name('export-users');



  //Bidding

  Route::resource('product-bids', BidController::class);



  Route::get('winner/{id}', [App\Http\Controllers\admin\BidController::class, 'makewinner'])->name('winner');


  Route::get('get-category/{id}', [ProductController::class, 'getCategory'])->name('get-category');
  
  // User Packages
  Route::resource('packages', PackageController::class);
  // Route::get('packages/', [PackageController::class, 'index'])->name('packages.index');
 
});
Route::group(['middleware' => ['auth','AdminDashboard']], function () {
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::post('update-call-id', [App\Http\Controllers\HomeController::class, 'updateCallId'])->name('update-call-id');



route::get('/index2', [UserController::class, 'index2']);



route::get('/index3', [UserController::class, 'index3']);



route::get('/index4', [UserController::class, 'index4']);

route::get('/index5', [UserController::class, 'index5']);



Auth::routes();






  //Model-profile view more 
  Route::get('view-more',[App\Http\Controllers\ProfileController::class, 'viewmore'])->name('view-more');

/**
 * 
 * Cron job for model sleep mode
 */

Route::get('cron-sleep-mode',[ModeldashboardController::class, 'cron_sleep_mode']);
/**
 * 
 * Cron job for model sleep mode END
 */

Route::get('run-cron', function() {
  \Artisan::call('schedule:run');
  echo "Route Cron Done!";
});



Route::get('/clear-cache', function () {
  Artisan::call('cache:clear');
  Artisan::call('optimize');
  Artisan::call('config:clear');
  Artisan::call('route:clear');
  Artisan::call('view:clear');
  Artisan::call('view:cache');
  Artisan::call('route:cache');
  return "Cache is cleared";
});

//Model profile slug
Route::get('{slug}',[App\Http\Controllers\ProfileController::class, 'index']);

