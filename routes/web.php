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

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/registration', function () {
    return view('frontend.registration');
})->name('sp.registration');

Route::get('/login', function () {
    return view('frontend.login');
})->name('sp.login');

Route::get('/spPanel', function () {
    return view('frontend.sp_panel.index');
});

Route::get('/addCar', function () {
    return view('frontend.sp_panel.add_car');
})->name('sp.addCar');

Route::get('/verification', function () {
    return view('frontend.sp_panel.verification');
})->name('sp.verification');

Route::get('/reference', function () {
    return view('frontend.sp_panel.reference');
})->name('sp.reference');

Route::get('/admin', function () {
    return view('backend.index');
});

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

Route::get('/admin/verification', function () {
    return view('backend.verification');
})->name('admin.verification');

Route::get('/findRide', function () {
    return view('frontend.find_ride');
})->name('findRide');


Route::get('/pickarider', function () {
    return view('frontend.pick_a_rider');
})->name('pickArider');


Route::get('/allRide', function () {
    return view('frontend.all_ride');
})->name('allRide');

Route::get('/postRide', function () {
    return view('frontend.post_ride.post_ride');
})->name('postRide');

Route::get('/postRide2', function () {
    return view('frontend.post_ride.post_ride2');
})->name('postRide2');

Route::get('/postRide3', function () {
    return view('frontend.post_ride.post_ride3');
})->name('postRide3');

