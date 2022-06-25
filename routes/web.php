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
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect/{service}', 'socialController@redirect');
Route::get('/callback/{service}', 'socialController@callback');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(['prefix'=>'offers'],function (){

        Route::get('/create', 'OfferController@create');
        Route::post('/save', 'OfferController@save')->name('offer.save');
        Route::get('/index', 'OfferController@index')->name('offer.index');
        Route::get('/edit/{offer_id}', 'OfferController@edit')->name('offer.edit');
        Route::post('/update', 'OfferController@update')->name('offer.update');
        Route::get('/video', 'OfferController@video')->name('offer.video');
    });

});
###################### Begin Ajax routes #####################
Route::group(['prefix' => 'ajax-offers'], function () {
    Route::get('create', 'Offer_Controller@create');
    Route::post('store', 'Offer_Controller@store')->name('ajax.offers.store');
    Route::get('all', 'Offer_Controller@all')->name('ajax.offers.all');
    Route::post('delete', 'Offer_Controller@delete')->name('ajax.offers.delete');
    Route::get('edit/{offer_id}', 'Offer_Controller@edit')->name('ajax.offers.edit');
    Route::post('update', 'Offer_Controller@Update')->name('ajax.offers.update');
});
###################### End Ajax routes #####################

###################### Begin one to one relation routes #####################
Route::get('has_one', 'RelationController@hasOne');
Route::get('has_one_reverse', 'RelationController@hasOne_reverse');
Route::get('users_has_phone', 'RelationController@users_has_phone');
Route::get('users_not_has_phone', 'RelationController@users_not_has_phone');
###################### end one to one relation  routes #####################
###################### Begin one to many relation routes #####################
Route::get('hospital_has_many_doctor', 'RelationController@hospitals_doctors');
Route::get('doctor_has_one_doctor', 'RelationController@doctor_hospital');
Route::get('delete_hospital/{hospital_id}', 'RelationController@delete_hospital');
###################### end one to many relation routes #####################
###################### start many to many relation routes #####################
Route::get('doctor_services', 'RelationController@find_services_from_doctor');
Route::get('services_doctor', 'RelationController@find_doctor_from_services');
Route::get('insert_services', 'RelationController@insert_services');
###################### end many to many relation routes #####################
###################### start hasOneThrough relation routes #####################
Route::get('hasOneThrough', 'RelationController@pationt_doctor');
###################### end hasOneThrough relation routes ######################
###################### start hasManyThrough relation routes #####################
Route::get('hasManyThrough', 'RelationController@country_doctor');
###################### end hasManyThrough relation routes #####################


