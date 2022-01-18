<?php







// user routes
Route::group(['middleware'=>'web'],function(){
  Route::auth();
  Route::get('/home', 'HomeController@index');
});

Route::get('/showAllBuilding','BuController@showAllEnable');
Route::get('/ForRent','BuController@ForRent');
Route::get('/ForBuy','BuController@ForBuy');
Route::get('/type/{type}','BuController@showByType');
Route::get('/search','BuController@search');
Route::get('/singleBuilding/{id}','BuController@showSingle');
Route::get('/ajax/bu/information','BuController@getAjaxInfo');
Route::get('/contact','HomeController@contact');
Route::post('/contact','ContactController@store');

Route::get('/user/create/building','BuController@userAddview');
Route::post('/user/create/building','BuController@userStore');
Route::get('/user/buildingShow','BuController@showUserBuilding')->middleware('auth');
Route::get('/user/buildingShowWating','BuController@buildingShowWating')->middleware('auth');
Route::get('/user/editSetting','UsersController@usereditInfo')->middleware('auth');
Route::patch('/user/editSetting',['as'=>'user.editSetting','uses'=>'UsersController@userUpdateProfile'])->middleware('auth');
Route::post('/user/changePassword','UsersController@changePassword')->middleware('auth');
Route::get('/user/edit/building/{id}','BuController@userEditBuilding')->middleware('auth');
Route::patch('/user/update/building','BuController@userUpdateBuilding')->middleware('auth');


// admin routes
Route::group(['middleware'=>['web','admin']],function(){

  // dataTables ajax
  Route::get('/adminpanel/users/data',['as'=>'adminpanel.users.data','uses'=>'UsersController@anyData']);
  Route::get('/adminpanel/bu/data',['as'=>'adminpanel.bu.data','uses'=>'BuController@anyData']);
  Route::get('/adminpanel/contact/data',['as'=>'adminpanel.contact.data','uses'=>'ContactController@anyData']);

  // main admin
  Route::get('/adminpanel','AdminController@index');

  Route::get('/adminpanel/buYear/statics','AdminController@showYearStatics');
  Route::post('/adminpanel/buYear/statics','AdminController@showThisYear');


  // users
  Route::resource('/adminpanel/users','UsersController');
  Route::post('/adminpanel/user/changePassword/','UsersController@updatePassword');
  Route::get('/adminpanel/users/{id}/delete','UsersController@destroy');

//  siteSetting
  Route::get('/adminpanel/sitesetting','SiteSettingController@index');
  Route::post('/adminpanel/sitesetting','SiteSettingController@store');

  // bu
  Route::resource('/adminpanel/bu','BuController',['except'=>['index','show']]);
  Route::get('/adminpanel/bu/{id?}','BuController@index');
  Route::get('/adminpanel/change_status/{id}/{status}','BuController@changeStatus');
  Route::get('/adminpanel/bu/{id}/delete','BuController@destroy');

  // contact
  Route::resource('/adminpanel/contact','ContactController');
  Route::get('/adminpanel/contact/{id}/delete','ContactController@destroy');
});


Route::get('/', function () {
    return view('welcome');
});
