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

Route::get('/testing', 'TestingController@index');

// Route::get('locale/{locale}',function ($locale){
// 	Session::put('locale', $locale);
// 	return redirect()->back();
// });

//Route::get('locale/{locale}','TestingController@show');

Route::get('site_id/{id}',function ($id){
	Session::put('site_id', $id);
	return redirect()->back();
});

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

/*************************** Site ***************************/
// Route::get('admin/site', 'Admin\SiteController@index')->name('admin.site')->middleware('is_admin');
// Route::post('admin/site/store', 'Admin\SiteController@store')->name('admin.site.store')->middleware('is_admin');
// Route::get('admin/site/listing', 'Admin\SiteController@show')->name('admin.site.listing')->middleware('is_admin');
// Route::get('admin/site/delete/{id}', 'Admin\SiteController@destroy')->name('admin.site.destroy')->middleware('is_admin');
// Route::get('admin/site/edit/{id}', 'Admin\SiteController@edit')->name('admin.site.edit')->middleware('is_admin');
// Route::post('admin/site/update', 'Admin\SiteController@update')->name('admin.site.update')->middleware('is_admin');

/*************************** Page ***************************/
// Route::get('admin/page', 'Admin\PageController@index')->name('admin.page')->middleware('is_admin');
// Route::post('admin/page/store', 'Admin\PageController@store')->name('admin.page.store')->middleware('is_admin');
// Route::get('admin/page/listing', 'Admin\PageController@show')->name('admin.page.listing')->middleware('is_admin');
// Route::get('admin/page/delete/{id}', 'Admin\PageController@destroy')->name('admin.page.destroy')->middleware('is_admin');
// Route::get('admin/page/edit/{id}', 'Admin\PageController@edit')->name('admin.page.edit')->middleware('is_admin');
// Route::post('admin/page/update', 'Admin\PageController@update')->name('admin.page.update')->middleware('is_admin');

/*************************** Banner ***************************/
// Route::get('admin/banner', 'Admin\BannerController@index')->name('admin.banner')->middleware('is_admin');
// Route::post('admin/banner/store', 'Admin\BannerController@store')->name('admin.banner.store')->middleware('is_admin');
// Route::get('admin/banner/listing', 'Admin\BannerController@show')->name('admin.banner.listing')->middleware('is_admin');
// Route::get('admin/banner/delete/{id}', 'Admin\BannerController@destroy')->name('admin.banner.destroy')->middleware('is_admin');
// Route::get('admin/banner/edit/{id}', 'Admin\BannerController@edit')->name('admin.banner.edit')->middleware('is_admin');
// Route::post('admin/banner/update', 'Admin\BannerController@update')->name('admin.banner.update')->middleware('is_admin');

/*************************** Blog ***************************/
// Route::get('admin/blog', 'Admin\BlogController@index')->name('admin.blog')->middleware('is_admin');
// Route::post('admin/blog/store', 'Admin\BlogController@store')->name('admin.blog.store')->middleware('is_admin');
// Route::get('admin/blog/listing', 'Admin\BlogController@show')->name('admin.blog.listing')->middleware('is_admin');
// Route::get('admin/blog/delete/{id}', 'Admin\BlogController@destroy')->name('admin.blog.destroy')->middleware('is_admin');
// Route::get('admin/blog/edit/{id}', 'Admin\BlogController@edit')->name('admin.blog.edit')->middleware('is_admin');
// Route::post('admin/blog/update', 'Admin\BlogController@update')->name('admin.blog.update')->middleware('is_admin');

/*************************** User ***************************/
// Route::get('admin/user/listing', 'Admin\UserController@show')->name('admin.user.listing')->middleware('is_admin');

/*************************** Subscriber ***************************/
// Route::get('admin/subscriber/listing', 'Admin\SubscriberController@show')->name('admin.subscriber.listing')->middleware('is_admin');

/*************************** Category ***************************/
// Route::get('admin/category', 'Admin\CategoryController@index')->name('admin.category')->middleware('is_admin');
// Route::post('admin/category/store', 'Admin\CategoryController@store')->name('admin.category.store')->middleware('is_admin');
// Route::get('admin/category/listing', 'Admin\CategoryController@show')->name('admin.category.listing')->middleware('is_admin');
// Route::get('admin/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin.category.destroy')->middleware('is_admin');
// Route::get('admin/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit')->middleware('is_admin');
// Route::post('admin/category/update', 'Admin\CategoryController@update')->name('admin.category.update')->middleware('is_admin');


/******* Project Detail This is Upload Image Controller *****/
Route::post('admin/project_detail/image_upload', 'Admin\ProjectDetailController@upload')->name('upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
