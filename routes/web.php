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

Route::get('/', function () {return view('frontend.index');})->name('home');

Route::get('/registration', function () {return view('frontend.log_in.registration');})->name('sp.registration');

Route::get('/registration1', function () {return view('frontend.log_in.registration2');})->name('sp.registration1');

Route::get('/login', function () {return view('frontend.log_in.login');})->name('sp.login');

Route::post('/login', 'homeController@UserLogin')->name('sp.login');

Route::post('/UserRegister', 'homeController@UserRegister');

Route::get('/logout', 'homeController@LogoutUser')->name('sp.logout');

Route::group(['middleware' => 'CheckUserLogin','namespace' => 'frontend'], function () {

    Route::get('/sp-panel', 'SpController@index')->name('sp.home');

    Route::get('/sp-car', 'SpController@Car')->name('sp.car');
    Route::post('/sp-add-car', 'SpController@AddCar')->name('sp.addcar');
    Route::get('/sp-delete-car', 'SpController@DeleteCar')->name('sp.deletecar');

    Route::get('/sp-verification', 'VerificationController@SpVerification')->name('sp.verification');
    Route::post('/sp-verification', 'VerificationController@SpVerificationPost')->name('sp.verification');

    Route::resource('resource', 'ResourceController');

});

Route::get('/request', function () {return view('frontend.request');})->name('request.ride');
Route::get('/request-next', 'frontend\RequestController@RequestNext')->name('request.ride.next');
Route::post('/request','frontend\RequestController@RequestPost')->name('request.ride.post');

Route::get('/post-ride', function () {return view('frontend.post_ride.post_ride');})->name('post.ride');
Route::post('/post-ride', 'frontend\PostController@RidePost')->name('post.ride');
Route::get('/post-ride2/{data}', 'frontend\PostController@RidePost2')->name('post.ride2');
Route::post('/post-ride2', 'frontend\PostController@RidePostPrice')->name('post.ride2');
Route::get('/post-ride3/{data}', 'frontend\PostController@RidePost3')->name('post.ride3');
Route::post('/post-ride3', 'frontend\PostController@RidePostCondition')->name('post.ride3');

Route::get('/all-ride', 'frontend\RideController@Ride')->name('all.ride');

Route::get('/find-ride', 'frontend\RideController@FindRide')->name('find.ride');
Route::post('/find-ride', 'frontend\RideController@FindRideSearch')->name('find.ride');

Route::get('/booking/{data}/{data2?}', 'frontend\BookingController@Index')->name('booking.index');

Route::post('/booking', 'frontend\BookingController@Store')->name('booking.store');

Route::get('/preview', 'frontend\BookingController@PreviewIndex')->name('preview.index');


Route::get('/map', function () {
    return view('frontend.map2');
});

Route::get('/reference', function () {
    return view('frontend.sp_panel.reference');
})->name('sp.reference');



Route::get('/transection', function () {
    return view('frontend.sp_panel.transection');
})->name('sp.transection');

Route::get('/ratting', function () {
    return view('frontend.sp_panel.ratting');
})->name('sp.ratting');


Route::get('/current_bokking', function () {
    return view('frontend.sp_panel.booking.current_book');
})->name('sp.current_bokking');

Route::get('/history', function () {
    return view('frontend.sp_panel.booking.history');
})->name('sp.history');

Route::get('/request_ride', function () {
    return view('frontend.sp_panel.request_ride');
})->name('sp.request_ride');

Route::get('/complain', function () {
    return view('frontend.sp_panel.complain');
})->name('sp.complain');

Route::get('/personalInformation', function () {
    return view('frontend.sp_panel.personal_information');
})->name('sp.personalInformation');

Route::get('/upcomingRides', function () {
    return view('frontend.sp_panel.rides_offered.upcoming_ride');
})->name('sp.upcomingRides');

Route::get('/pastRides', function () {
    return view('frontend.sp_panel.rides_offered.past_ride');
})->name('sp.pastRides');



Route::get('/archivedRides', function () {
    return view('frontend.sp_panel.rides_offered.archived_rides');
})->name('sp.archivedRides');

Route::get('/admin/booking', function () {
    return view('backend.booking');
})->name('admin.booking');

Route::get('/admin/allRidePost', function () {
    return view('backend.all_ridepost');
})->name('admin.allRidePost');


Route::get('/admin/transection', function () {
    return view('backend.transection');
})->name('admin.transection');

Route::get('/admin/requestRide', function () {
    return view('backend.request_ride');
})->name('admin.requestRide');

Route::get('/admin/complain', function () {
    return view('backend.complain');
})->name('admin.complain');


Route::get('/admin/resourceList', function () {
    return view('backend.resource_list');
})->name('admin.resourceList');

















/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::get('/admin','backend\adminController@home');

Route::post('/AdminLoginCheck', 'backend\adminController@LoginCheck');

Route::get('/AdminLogout', 'backend\adminController@Logout')->name('AdminLogout');

Route::post('/AdminUserRegister', 'backend\adminController@AdminUserRegister');

Route::group(['middleware' => 'CheckAdmin','namespace' => 'backend'], function () {

    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

    Route::get('/ride-setting', 'RideSettingController@RideSetting')->name('admin.ride.setting');
    Route::post('/ride-setting', 'RideSettingController@RideSettingPost')->name('admin.ride.setting');

    Route::get('/admin-pending-car/{data?}', 'CarController@PendingCar')->name('admin.pending.car');
    Route::post('admin-pending-car-Approve', 'CarController@PendingCarApprove');
    Route::get('/admin-approve-car/{data?}', 'CarController@ApproveCar')->name('admin.approve.car');
    Route::get('/admin-approve-car-pending', 'CarController@ApproveCarPending');

    Route::get('/admin-pending-verification', 'VerificationController@PendingVerification')->name('admin.pending.verification');
    Route::get('/admin-pending-verification-change', 'VerificationController@PendingVerificationChange');
    Route::get('/admin-approve-verification', 'VerificationController@ApproveVerification')->name('admin.approve.verification');
    Route::get('/admin-disapprove-verification', 'VerificationController@DisapproveVerification')->name('admin.disapprove.verification');

    Route::get('/admin-pending-post/{data?}', 'PostController@PendingPost')->name('admin.pending.post');
    Route::get('/admin-approve-post', 'PostController@ApprovePost')->name('admin.approve.post');
    Route::get('/admin-disapprove-post', 'PostController@DisapprovePost')->name('admin.disapprove.post');
    Route::get('/admin-pending-post-change', 'PostController@PendingPostChange');

    Route::post('admin-tracking', 'TrackingController@TrackingRide')->name('admin.tracking');

    Route::get('/promo_code/{data?}', 'PromoCodeController@index')->name('promo_code.index');
    Route::post('/promo_code', 'PromoCodeController@store')->name('promo_code.store');
    Route::get('/promo_code/delete/{data}', 'PromoCodeController@destroy')->name('promo_code.destroy');

});













