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

Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_browser');
//admin
Route::group(['prefix'=>'admincp'],function(){

	Route::get('','HomeController@index')->name('home');

	Route::get('logins','LoginController@login')->name('logins');
	Route::get('logouts','HomeController@logout')->name('logouts');
	Route::post('check-login','LoginController@check')->name('check_login');
	//profile-admin
	Route::get('profile-admin','ManagerProfile\ProfileAdminController@index')->name('profile');
	Route::post('admin-add-user','ManagerProfile\ProfileAdminController@addUser')->name('addUser');
	Route::post('admin-show-user','ManagerProfile\ProfileAdminController@showUser')->name('showUser');
	Route::post('admin-change-user','ManagerProfile\ProfileAdminController@changeUser')->name('changeUser');
	Route::post('admin-delete-user','ManagerProfile\ProfileAdminController@deleteUser')->name('deleteUser');
	Route::post('admin-change-status','ManagerProfile\ProfileAdminController@changStatus')->name('changeStatus');
	// Route::get('data-event','ManagerProfile\ProfileAdminController@getDataEvent')->name('dataEvent');

	//quan ly các sự kiên
	Route::get('manager-events','ManagerEvent\EventsController@index')->name('events');

	Route::get('manager-add','ManagerEvent\ActionController@addView')->name('managerAdd');///giao dien
	Route::post('manager-add-data','ManagerEvent\ActionController@add')->name('managerAddData');//form add
	Route::get('manager-edit','ManagerEvent\ActionController@editView')->name('managerEdit');///giao dien
	Route::post('manager-edit-data','ManagerEvent\ActionController@edit')->name('managerEditData');//form add
	Route::post('manager-delete-data','ManagerEvent\ActionController@delete')->name('managerDeleteData');//form add
	//create slide-video
	Route::get('slider','ManagerSlider\SliderController@index')->name('slider');///giao dien
	Route::post('add-slider','ManagerSlider\SliderController@postSlider')->name('postSlider');///add
	Route::post('delete-slider','ManagerSlider\SliderController@getDeleteSlider')->name('getDeleteSlider');///delete
	//partner
	Route::get('partner','PartnerController@index')->name('partner');//interface
	Route::post('partner-show-data','PartnerController@getDataAjax')->name('partnerShow');//show
	Route::post('partner-add-edit','PartnerController@partnerAddEdit')->name('partnerAddEdit');//add
	Route::post('partner-delete-data','PartnerController@partnerDelete')->name('partnerDelete');//delete
	// Route::post('partner-edit','PartnerController@partnerEdit')->name('partnerEdit');//edit
	//blog
	Route::get('blogs','BlogsController@index')->name('blogs');//interface
	Route::post('admin-change-blogs-status','BlogsController@change')->name('blogsStatus');//change status blog
	Route::get('blogs-add','BlogsController@addBlog')->name('addBlog');//add
	Route::post('blogs-add-data','BlogsController@addBlogData')->name('addBlogData');//add
	Route::get('blogs-edit','BlogsController@editBlog')->name('editBlog');//interface
	Route::post('blogs-edit-data','BlogsController@editBlogData')->name('editBlogData');//edit
	Route::post('blogs-delete-data','BlogsController@deleteBlogData')->name('deleteBlogData');//delete
	//contact - team - intro
	Route::get('contact','ContactController@index')->name('contact');//interface
	Route::get('intro','IntroController@index')->name('intro');//interface
	Route::get('team','teamController@index')->name('team');//interface
	Route::post('contact-edit','ContactController@edit')->name('conatctEdit');//edit
	Route::post('intro-edit','IntroController@edit')->name('conatctEdit');//edit
	Route::post('team-edit','teamController@edit')->name('conatctEdit');//edit
	//customer
	Route::get('custommer','CustommerController@index')->name('custommer-index');//interface
	Route::get('custommer-add','CustommerController@add')->name('custommer-add');//interface
	Route::post('custommer-add-data','CustommerController@addData')->name('custommer-add-data');//add
	Route::get('custommer-edit','CustommerController@edit')->name('custommer-edit');//interface
	Route::post('custommer-edit-data','CustommerController@editData')->name('custommer-edit-data');//interface
	Route::post('custommer-delete-data','CustommerController@deleteData')->name('custommer-delete-data');//interface
	Route::post('admin-change-custommer-status','CustommerController@changeStatusData')->name('admin-change-custommer-status');//interface
});
//interface

Route::group(['prefix'=>''],function(){
	Route::get('','Interfaces\IndexController@index')->name('index');
	Route::get('intro','Interfaces\IndexController@intro')->name('interface-intro');
	Route::get('events','Interfaces\IndexController@event')->name('interface-event');
	Route::get('evented','Interfaces\IndexController@evented')->name('interface-evented');
	Route::get('devices','Interfaces\IndexController@device')->name('interface-device');
	Route::get('personnel','Interfaces\IndexController@staff')->name('interface-staff');
	Route::get('news','Interfaces\IndexController@news')->name('interface-news');
	Route::get('team','Interfaces\IndexController@team')->name('interface-team');
	Route::get('contact','Interfaces\IndexController@contact')->name('interface-contact');
	
	//detail
	Route::get('detail','Interfaces\IndexController@detail')->name('interface-page-detail');
	// Route::get('detail-personnel','Interfaces\IndexController@detailPersonnel')->name('interface-page-detail-personnel');
	// Route::get('detail-device','Interfaces\IndexController@detailDevice')->name('interface-page-detail-device');

	Route::get('detail-new','Interfaces\IndexController@detailBlog')->name('interface-page-detail-new');

});