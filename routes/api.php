<?php

use Illuminate\Http\Request;


Route::ANY('getRegions',           'index@index');
Route::ANY('getCategories',           'index@index');
Route::ANY('register',             'index@index');
Route::ANY('validateCode',         'index@index');
Route::ANY('login',                'index@index');
Route::ANY('forgetPassword',       'index@index');
Route::ANY('changePassword',       'index@index');
Route::ANY('updatePassword',       'index@index');
Route::ANY('getProfile',           'index@index');
Route::ANY('resendCode',           'index@index');
Route::ANY('changeLang',           'index@index');
Route::ANY('setFireBaseToken',     'index@index');
Route::ANY('logout',               'index@index');
Route::ANY('appInfo',              'index@index');
Route::ANY('contacts',             'index@index');
Route::ANY('unseenNotifications',  'index@index');
Route::ANY('notifications',        'index@index');
Route::ANY('getOrders',            'index@index');
Route::ANY('getServices',          'index@index');
Route::ANY('getAds',               'index@index');
Route::ANY('sendMessages',         'index@index');
Route::ANY('getMessages',          'index@index');
Route::ANY('updateUserProfile',    'index@index');
Route::ANY('addOrder',             'index@index');
Route::ANY('addFavourite',         'index@index');
Route::ANY('rateStore',            'index@index');
Route::ANY('myFavourites',         'index@index');

Route::ANY('developer',            'index@index');


route::ANY('getMusics',            'index@index');
route::ANY('getFonts' ,            'index@index');
route::ANY('getEffects',           'index@index');
route::ANY('getBackgrounds',       'index@index');
route::ANY('getNovels','index@index');
route::ANY('getTopics','index@index');
route::ANY('getNews','index@index');
route::ANY('addNovel','index@index');
route::ANY('addTopic','index@index');
route::ANY('getNews','index@index');
route::ANY('getProfile','index@index');
route::ANY('getCountries','index@index');
route::ANY('updateMyRole','index@index');
route::ANY('getRoleType','index@index');
route::ANY('getMyLibrary','index@index');
route::ANY('addToLibrary','index@index');
route::ANY('search','index@index');
route::ANY('getMyPurchases','index@index');
route::ANY('getAuthers','index@index');
route::ANY('follow','index@index');
route::ANY('addToMypurchases','index@index');
route::ANY('report','index@index');
route::ANY('deleteFromMypurchases','index@index');
route::ANY('addComment','index@index');
route::ANY('getComments','index@index');
route::ANY('registerBySocialToken','index@index');
route::ANY('loginBySocialToken','index@index');
route::ANY('loginBySocialToken','index@index');
route::ANY('editComment','index@index');
route::ANY('deleteComment','index@index');
route::ANY('addToDrafts','index@index');
route::post('editNovel','index@index');
route::post('addEditPage','index@index');
route::post('editTopci','index@index');
route::post('editTopic','index@index');

route::ANY('setFireBaseToken','index@index');
route::ANY('getCurrentRole','index@index');