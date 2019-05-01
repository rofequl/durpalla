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

Route::get('/', 'homeController@homepage')->name('home');

Route::get('/language', 'homeController@language')->name('language');

Route::get('login/facebook', 'homeController@redirectToProvider')->name('signup.facebook');
Route::get('login/facebook/callback', 'homeController@handleProviderCallback');

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
    Route::get('/remove-car', 'SpController@RemoveCar')->name('sp.remove.car');
    Route::get('/sp-restore-car', 'SpController@RestoreCar')->name('sp.restore.car');

    Route::get('/sp-verification', 'VerificationController@SpVerification')->name('sp.verification');
    Route::post('/sp-verification', 'VerificationController@SpVerificationPost')->name('sp.verification');

    Route::get('/resource', 'ResourceController@Index')->name('resource.index');
    Route::post('/resource-store', 'ResourceController@Store')->name('resource.store');
    Route::get('/resource-delete/{data}', 'ResourceController@Delete')->name('resource.delete');
    Route::get('/resource-remove', 'ResourceController@ResourceRemove')->name('resource.remove.index');
    Route::get('/resource-restore/{data}', 'ResourceController@RestoreRestore')->name('resource.restore');

    Route::get('/current-booking/{data?}', 'BookingController@CurrentBooking')->name('current.booking');
    Route::get('/booking-preview/{data?}', 'BookingController@BookingPreviewIndex')->name('booking.preview.index');
    Route::post('/current-booking', 'BookingController@CurrentBookingCancel')->name('current.booking.cancel');

    Route::get('/history-booking/{data?}', 'BookingController@HistoryBooking')->name('history.booking');

    Route::get('/upcoming-ride', 'PostController@upcomingRideIndex')->name('upcoming.ride.index');
    Route::get('/upcoming-ride-preview/{data}', 'PostController@upcomingRidePreview')->name('upcoming.ride.preview');
    Route::get('/upcoming-ride-cancel/{data}', 'PostController@upcomingRideCancel')->name('upcoming.ride.cancel');

    Route::get('/archived-ride', 'PostController@ArchivedRideIndex')->name('archived.ride.index');

    Route::get('/sp-account-close', 'SpAccountController@SpAccountClose')->name('sp.account.close');
    Route::post('/sp-account-close-done', 'SpAccountController@SpAccountCloseDone')->name('sp.account.close.done');

    Route::get('/sp-account-profile', 'SpAccountController@Profile')->name('sp.account.profile');
    Route::post('/sp-account-profile-update', 'SpAccountController@ProfileUpdate')->name('sp.account.profile.update');
    Route::get('/sp-account-photo', 'SpAccountController@Photo')->name('sp.account.photo');
    Route::post('/sp-account-photo-store', 'SpAccountController@PhotoStore')->name('sp.account.photo.store');

    Route::get('/request-next', 'RequestController@RequestNext')->name('request.ride.next');

    Route::get('/notification', 'NotificationController@notification')->name('notification');
    Route::get('/notification-show', 'NotificationController@NotificationShow')->name('notification.show');
    Route::get('/notification-preview/{data}', 'NotificationController@NotificationPreview')->name('notification.preview');

    Route::get('/sp-transition', 'TransitionController@Transition')->name('sp.transition');

    Route::get('/sp-driver-rating', 'BookingController@DriverRating')->name('sp.driver.rating');


});

Route::get('/request', function () {return view('frontend.request');})->name('request.ride');
Route::post('/request','frontend\RequestController@RequestPost')->name('request.ride.post');

Route::get('/post-ride', function () {return view('frontend.post_ride.post_ride');})->name('post.ride');
Route::post('/post-ride', 'frontend\PostController@RidePost')->name('post.ride');
Route::get('/post-ride2/{data}', 'frontend\PostController@RidePost2')->name('post.ride2');
Route::post('/post-ride2', 'frontend\PostController@RidePostPrice')->name('post.ride2');
Route::get('/post-ride3/{data}', 'frontend\PostController@RidePost3')->name('post.ride3');
Route::post('/post-ride3', 'frontend\PostController@RidePostCondition')->name('post.ride3');
Route::get('/post-ride-remove/{data}', 'frontend\PostController@RidePostRemove')->name('post.ride.remove');


Route::get('/all-ride', 'frontend\RideController@Ride')->name('all.ride');
Route::post('/all-ride-search', 'frontend\RideController@RideSearch')->name('all.ride.search');

Route::get('/find-ride', 'frontend\RideController@FindRide')->name('find.ride');
Route::post('/find-ride', 'frontend\RideController@FindRideSearch')->name('find.ride');

Route::get('/booking/{data}/{data2?}', 'frontend\BookingController@Index')->name('booking.index');
Route::post('/booking', 'frontend\BookingController@Store')->name('booking.store');
Route::get('/preview', 'frontend\BookingController@PreviewIndex')->name('preview.index');
Route::post('/preview', 'frontend\BookingController@PreviewStore')->name('preview.store');
Route::get('/booking-congrate', 'frontend\BookingController@congrate')->name('booking.congrate');

Route::get('/popular-ride', 'frontend\RideController@PopularRide')->name('popular.ride');
Route::get('/popular-ride-Show/{data}', 'frontend\RideController@PopularRideShow')->name('popular.ride.Show');

Route::get('/map', function () {
    return view('frontend.map2');
});






Route::get('/history', function () {
    return view('frontend.sp_panel.booking.history');
})->name('sp.history');


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

    Route::get('/dashboard', 'adminController@dashboard')->name('dashboard');

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
    Route::get('/expired_promo_code', 'PromoCodeController@ExpiredIndex')->name('expired.promo_code.index');
    Route::post('/promo-code-update', 'PromoCodeController@Update')->name('promo_code.update');
    Route::get('/promo_code/delete/{data}', 'PromoCodeController@destroy')->name('promo_code.destroy');
    Route::get('/promo_code/publish/{data}', 'PromoCodeController@publish')->name('promo_code.publish');

    Route::get('/corporate', 'CorporateController@Index')->name('corporate.index');
    Route::post('/corporate', 'CorporateController@Store')->name('corporate.Store');
    Route::get('/corporate-group', 'CorporateController@IndexGroup')->name('corporate.group.index');
    Route::post('/corporate-group', 'CorporateController@StoreGroup')->name('corporate.group.Store');
    Route::get('/corporate-delete/{data}', 'CorporateController@DeleteGroup')->name('corporate.group.delete');

    Route::get('/admin-complete-book/{data?}', 'BookingController@CompleteBook')->name('admin.complete.book');
    Route::get('/admin-partial-book/{data?}', 'BookingController@PartialBook')->name('admin.partial.book');
    Route::get('/admin-not-book/{data?}', 'BookingController@NotBook')->name('admin.not.book');
    Route::get('/admin-ongoing-book', 'BookingController@OngoingBook')->name('admin.ongoing.book');
    Route::get('/admin-complete-ride', 'BookingController@CompleteRide')->name('admin.complete.ride');

    Route::get('/admin-sp-account-close', 'SpAccountController@SpAccountClose')->name('admin.sp.account.close');
    Route::get('/admin-sp-account-close-done', 'SpAccountController@SpAccountCloseDone')->name('admin.sp.account.close.done');
    Route::get('/admin-sp-account-close-list', 'SpAccountController@SpAccountCloseList')->name('admin.sp.account.close.list');

    Route::get('/admin-landing-image', 'LandingImageController@index')->name('admin.landing.image');
    Route::post('/admin-landing-image-store', 'LandingImageController@store')->name('admin.landing.image.store');
    Route::get('/admin-landing-image-update', 'LandingImageController@Update')->name('admin.landing.image.update');

    Route::get('/admin-transition', 'TransitionController@transition')->name('admin.transition');
    Route::get('/admin-transition-update', 'TransitionController@TransitionUpdate')->name('admin.transition.update');

    Route::get('/admin-popular-ride', 'TransitionController@PopularRide')->name('admin.popular.ride');
    Route::get('/admin-popular-ride-profile/{data}', 'TransitionController@PendingPostProfile')->name('admin.popular.ride.profile');
    Route::get('/admin-popular-ride-update', 'TransitionController@PendingPostUpdate')->name('admin.popular.ride.update');


});













