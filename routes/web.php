<?php


Route::get('/', 'OfferController@dashBoard');

Route::post('offer/store', 'OfferController@store')->name('offer.store');

Route::resource('recipient', 'RecipientController');
Route::resource('offer', 'OfferController')->name('show', 'offerShow');
Route::resource('voucher', 'VoucherController');
Route::resource('log', 'VoucherLogController');
