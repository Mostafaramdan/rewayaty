<?php
use Illuminate\Support\Arr;

route::get('test',function(){
       return \App\Models\users::find(10);
});
route::post('/login','authentication@login')->name('dashboard.login');
route::get('/login','authentication@index')->name('dashboard.login.index');
route::get('/logout','authentication@logout')->name('dashboard.logout');

Route::group(['middleware' => ['dashboard']], function () 
{
       route::get('statistics','statistics@index')->name('dashboard.statistics.index');
       route::post('statistics/getByDateRange','statistics@getByDateRange')->name('dashboard.statistics.getByDateRange');
       route::post('statistics','statistics@indexPageing')->name('dashboard.statistics.indexPageing');

       route::get('users','users@index')->name('dashboard.users.index');
       route::post('users/createUpdate','users@createUpdate')->name('dashboard.users.createUpdate');
       route::ANY('users/searchForResult','users@searchForResult')->name('dashboard.users.searchForResult');
       route::post('users','users@indexPageing')->name('dashboard.users.indexPageing');
       route::get('users/delete/{id}','users@delete')->name('dashboard.users.delete');
       route::get('users/check/{check}/{id}','users@check')->name('dashboard.users.check');
       route::get('users/getRecord/{id}','users@getRecord')->name('dashboard.users.getRecord');

       route::get('notifications','notifications@index')->name('dashboard.notifications.index');
       route::post('notifications/createUpdate','notifications@createUpdate')->name('dashboard.notifications.createUpdate');
       route::post('notifications','notifications@indexPageing')->name('dashboard.notifications.indexPageing');
       route::get('notifications/delete/{id}','notifications@delete')->name('dashboard.notifications.delete');
       route::get('notifications/check/{type}/{id}','notifications@check')->name('dashboard.notifications.check');
       route::get('notifications/getRecord/{id}','notifications@getRecord')->name('dashboard.notifications.getRecord');

       route::get('contacts','contacts@index')->name('dashboard.contacts.index');
       route::post('contacts/createUpdate','contacts@createUpdate')->name('dashboard.contacts.createUpdate');
       route::post('contacts','contacts@indexPageing')->name('dashboard.contacts.indexPageing');
       route::get('contacts/delete/{id}','contacts@delete')->name('dashboard.contacts.delete');
       route::get('contacts/check/{check}/{id}','contacts@check')->name('dashboard.contacts.check');
       route::get('contacts/getRecord/{id}','contacts@getRecord')->name('dashboard.contacts.getRecord');

       route::get('categories','categories@index')->name('dashboard.categories.index');
       route::post('categories/createUpdate','categories@createUpdate')->name('dashboard.categories.createUpdate');
       route::post('categories','categories@indexPageing')->name('dashboard.categories.indexPageing');
       route::get('categories/delete/{id}','categories@delete')->name('dashboard.categories.delete');
       route::get('categories/check/{check}/{id}','categories@check')->name('dashboard.categories.check');
       route::get('categories/getRecord/{id}','categories@getRecord')->name('dashboard.categories.getRecord');

       route::get('regions','regions@index')->name('dashboard.regions.index');
       route::post('regions/createUpdate','regions@createUpdate')->name('dashboard.regions.createUpdate');
       route::post('regions','regions@indexPageing')->name('dashboard.regions.indexPageing');
       route::get('regions/delete/{id}','regions@delete')->name('dashboard.regions.delete');
       route::get('regions/check/{type}/{id}','regions@check')->name('dashboard.regions.check');
       route::get('regions/getRecord/{id}','regions@getRecord')->name('dashboard.regions.getRecord');

       route::get('ads','ads@index')->name('dashboard.ads.index');
       route::post('ads/createUpdate','ads@createUpdate')->name('dashboard.ads.createUpdate');
       route::post('ads','ads@indexPageing')->name('dashboard.ads.indexPageing');
       route::get('ads/delete/{id}','ads@delete')->name('dashboard.ads.delete');
       route::get('ads/check/{type}/{id}','ads@check')->name('dashboard.ads.check');
       route::get('ads/getRecord/{id}','ads@getRecord')->name('dashboard.ads.getRecord');

       route::get('admins','admins@index')->name('dashboard.admins.index');
       route::post('admins/createUpdate','admins@createUpdate')->name('dashboard.admins.createUpdate');
       route::post('admins','admins@indexPageing')->name('dashboard.admins.indexPageing');
       route::get('admins/delete/{id}','admins@delete')->name('dashboard.admins.delete');
       route::get('admins/check/{type}/{id}','admins@check')->name('dashboard.admins.check');
       route::get('admins/getRecord/{id}','admins@getRecord')->name('dashboard.admins.getRecord');

       route::get('app_settings','app_settings@index')->name('dashboard.app_settings.index');
       route::post('app_settings/createUpdate','app_settings@createUpdate')->name('dashboard.app_settings.createUpdate');
       route::post('app_settings','app_settings@indexPageing')->name('dashboard.app_settings.indexPageing');
       route::get('app_settings/delete/{id}','app_settings@delete')->name('dashboard.app_settings.delete');
       route::get('app_settings/check/{type}/{id}','app_settings@check')->name('dashboard.app_settings.check');
       route::get('app_settings/getRecord/{id}','app_settings@getRecord')->name('dashboard.app_settings.getRecord');

       route::get('users','users@index')->name('dashboard.users.index');
       route::post('users/createUpdate','users@createUpdate')->name('dashboard.users.createUpdate');
       route::post('users','users@indexPageing')->name('dashboard.users.indexPageing');
       route::get('users/delete/{id}','users@delete')->name('dashboard.users.delete');
       route::get('users/check/{check}/{id}','users@check')->name('dashboard.users.check');
       route::get('users/getRecord/{id}','users@getRecord')->name('dashboard.users.getRecord');
     
       route::get('contact_us','contact_us@index')->name('dashboard.contact_us.index');
       route::post('contact_us/createUpdate','contact_us@createUpdate')->name('dashboard.contact_us.createUpdate');
       route::post('contact_us','contact_us@indexPageing')->name('dashboard.contact_us.indexPageing');
       route::get('contact_us/delete/{id}','contact_us@delete')->name('dashboard.contact_us.delete');
       route::get('contact_us/check/{check}/{id}','contact_us@check')->name('dashboard.contact_us.check');
       route::get('contact_us/getRecord/{id}','contact_us@getRecord')->name('dashboard.contact_us.getRecord');
       
       route::get('regions','regions@index')->name('dashboard.regions.index');
       route::post('regions/createUpdate','regions@createUpdate')->name('dashboard.regions.createUpdate');
       route::post('regions','regions@indexPageing')->name('dashboard.regions.indexPageing');
       route::get('regions/delete/{id}','regions@delete')->name('dashboard.regions.delete');
       route::get('regions/check/{check}/{id}','regions@check')->name('dashboard.regions.check');
       route::get('regions/getRecord/{id}','regions@getRecord')->name('dashboard.regions.getRecord');
       
       route::get('sliders','sliders@index')->name('dashboard.sliders.index');
       route::post('sliders/createUpdate','sliders@createUpdate')->name('dashboard.sliders.createUpdate');
       route::post('sliders','sliders@indexPageing')->name('dashboard.sliders.indexPageing');
       route::get('sliders/delete/{id}','sliders@delete')->name('dashboard.sliders.delete');
       route::get('sliders/check/{check}/{id}','sliders@check')->name('dashboard.sliders.check');
       route::get('sliders/getRecord/{id}','sliders@getRecord')->name('dashboard.sliders.getRecord');
     
       route::get('images','images@index')->name('dashboard.images.index');
       route::post('images/createUpdate','images@createUpdate')->name('dashboard.images.createUpdate');
       route::post('images','images@indexPageing')->name('dashboard.images.indexPageing');
       route::get('images/delete/{id}','images@delete')->name('dashboard.images.delete');
       route::get('images/check/{check}/{id}','images@check')->name('dashboard.images.check');
       route::get('images/getRecord/{id}','images@getRecord')->name('dashboard.images.getRecord');

       route::get('fonts','fonts@index')->name('dashboard.fonts.index');
       route::post('fonts/createUpdate','fonts@createUpdate')->name('dashboard.fonts.createUpdate');
       route::post('fonts','fonts@indexPageing')->name('dashboard.fonts.indexPageing');
       route::get('fonts/delete/{id}','fonts@delete')->name('dashboard.fonts.delete');
       route::get('fonts/check/{check}/{id}','fonts@check')->name('dashboard.fonts.check');
       route::get('fonts/getRecord/{id}','fonts@getRecord')->name('dashboard.fonts.getRecord');
       
       route::get('effects','effects@index')->name('dashboard.effects.index');
       route::post('effects/createUpdate','effects@createUpdate')->name('dashboard.effects.createUpdate');
       route::post('effects','effects@indexPageing')->name('dashboard.effects.indexPageing');
       route::get('effects/delete/{id}','effects@delete')->name('dashboard.effects.delete');
       route::get('effects/check/{check}/{id}','effects@check')->name('dashboard.effects.check');
       route::get('effects/getRecord/{id}','effects@getRecord')->name('dashboard.effects.getRecord');
       
       route::get('musics','musics@index')->name('dashboard.musics.index');
       route::post('musics/createUpdate','musics@createUpdate')->name('dashboard.musics.createUpdate');
       route::post('musics','musics@indexPageing')->name('dashboard.musics.indexPageing');
       route::get('musics/delete/{id}','musics@delete')->name('dashboard.musics.delete');
       route::get('musics/check/{check}/{id}','musics@check')->name('dashboard.musics.check');
       route::get('musics/getRecord/{id}','musics@getRecord')->name('dashboard.musics.getRecord');
       
       route::get('role_type','role_type@index')->name('dashboard.role_type.index');
       route::post('role_type/createUpdate','role_type@createUpdate')->name('dashboard.role_type.createUpdate');
       route::post('role_type','role_type@indexPageing')->name('dashboard.role_type.indexPageing');
       route::get('role_type/delete/{id}','role_type@delete')->name('dashboard.role_type.delete');
       route::get('role_type/check/{check}/{id}','role_type@check')->name('dashboard.role_type.check');
       route::get('role_type/getRecord/{id}','role_type@getRecord')->name('dashboard.role_type.getRecord');
       
       route::get('backgrounds','backgrounds@index')->name('dashboard.backgrounds.index');
       route::post('backgrounds/createUpdate','backgrounds@createUpdate')->name('dashboard.backgrounds.createUpdate');
       route::post('backgrounds','backgrounds@indexPageing')->name('dashboard.backgrounds.indexPageing');
       route::get('backgrounds/delete/{id}','backgrounds@delete')->name('dashboard.backgrounds.delete');
       route::get('backgrounds/check/{check}/{id}','backgrounds@check')->name('dashboard.backgrounds.check');
       route::get('backgrounds/getRecord/{id}','backgrounds@getRecord')->name('dashboard.backgrounds.getRecord');

       route::get('novels','novels@index')->name('dashboard.novels.index');
       route::post('novels/createUpdate','novels@createUpdate')->name('dashboard.novels.createUpdate');
       route::post('novels','novels@indexPageing')->name('dashboard.novels.indexPageing');
       route::get('novels/delete/{id}','novels@delete')->name('dashboard.novels.delete');
       route::get('novels/check/{check}/{id}','novels@check')->name('dashboard.novels.check');
       route::get('novels/getRecord/{id}','novels@getRecord')->name('dashboard.novels.getRecord');

       route::get('news','news@index')->name('dashboard.news.index');
       route::post('news/createUpdate','news@createUpdate')->name('dashboard.news.createUpdate');
       route::post('news','news@indexPageing')->name('dashboard.news.indexPageing');
       route::get('news/delete/{id}','news@delete')->name('dashboard.news.delete');
       route::get('news/check/{check}/{id}','news@check')->name('dashboard.news.check');
       route::get('news/getRecord/{id}','news@getRecord')->name('dashboard.news.getRecord');

       route::get('topics','topics@index')->name('dashboard.topics.index');
       route::post('topics/createUpdate','topics@createUpdate')->name('dashboard.topics.createUpdate');
       route::post('topics','topics@indexPageing')->name('dashboard.topics.indexPageing');
       route::get('topics/delete/{id}','topics@delete')->name('dashboard.topics.delete');
       route::get('topics/check/{check}/{id}','topics@check')->name('dashboard.topics.check');
       route::get('topics/getRecord/{id}','topics@getRecord')->name('dashboard.topics.getRecord');
});

