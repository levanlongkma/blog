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


// Auth::routes();
Route::get('index','PostController@index')->name('index');
Route::post('search','PostController@search');
// Route::get('category/{slug}','PostController@slug');
Route::get('detail/{content}','PostController@detail');
Route::get('contact','HomeController@contact');
Route::get('about-us','HomeController@about');
Route::get('page-right-sidebar','HomeController@page_right');
Route::get('post-right-sidebar','HomeController@post_right');
Route::get('home/category/{slug}','PostController@category');
Route::get('about-us','PostController@about');
Route::get('contact-us','PostController@contact');
Route::get('home','PostController@login');
Route::get('home/tag/{slug}','PostController@tag');

Route::group(['prefix' => 'admin'],function(){
	//Route::get('home','AdminController@home')->name('admin.home');
    Route::get('getList','AdminController@getList')->name('admin.getList');
	Route::post('add','AdminController@add');
	Route::get('table/quanly','AdminController@quanly')->name('admin.quanly');
	Route::delete('home/delete','AdminController@delete')->name('admin.delete');
	Route::get('formAdd','AdminController@formAdd')->name('admin.fadd');
	Route::post('add','AdminController@addNew')->name('admin.add');
	Route::get('table/edit/{id}','AdminController@edit')->name('admin.edit');
    Route::post('update','AdminController@update')->name('admin.update');
    Route::post('create/post','AdminController@store')->name('admin.store');
    Route::get('table/recycleBin','AdminController@recycleBin')->name('admin.recycleBin');
    Route::get('table/getRecyclebin','AdminController@getRecyclebin')->name('admin.getRecyclebin');
    Route::post('table/getRecyclebin/restore','AdminController@restoreRecyclebin')->name('admin.restoreRecyclebin');
    Route::delete('table/getRecyclebin/delete','AdminController@deleteRecyclebin')->name('admin.deleteRecyclebin');
    Route::get('table/edit/test/{slug}','AdminController@test')->name('admin.test');

    //Category start->>>>>>>>

    Route::get('ShowCategory','CategoryController@showCategory');
    Route::get('GetListCategory','CategoryController@getList')->name('admin.GetListCategory');
    Route::post('RemoveCategory','CategoryController@remove')->name('admin.RemoveCategory');
    Route::post('editCategory','CategoryController@edit')->name('admin.editCategory');
    Route::delete('deleteCategory','CategoryController@delete')->name('admin.deleteCategory');
    Route::post('createCategory','CategoryController@create')->name('admin.createCategory');
    Route::get('categoryRecycleBin','CategoryController@categoryRecycleBin')->name('admin.categoryRecycleBin');
    Route::get('table/GetListCategoryRecycleBin','CategoryController@GetListCategoryRecycleBin')->name('admin.GetListCategoryRecycleBin');
    Route::delete('table/GetListCategoryRecycleBin/DeleteCategoryRecycleBin','CategoryController@DeleteCategoryRecycleBin')->name('admin.DeleteCategoryRecycleBin');
    Route::post('table/GetListCategoryRecycleBin/RestoreCategoryRecycleBin','CategoryController@RestoreCategoryRecycleBin')->name('admin.RestoreCategoryRecycleBin');

    //Tag start ----->

    Route::get('ShowTag','TagController@showTag');
    Route::get('GetListTag','TagController@getList')->name('admin.GetListTag');
    Route::post('RemoveTag','TagController@remove')->name('admin.RemoveTag');
    Route::post('editTag','TagController@edit')->name('admin.editTag');
    Route::delete('deleteTag','TagController@delete')->name('admin.deleteTag');
    Route::post('createTag','TagController@create')->name('admin.createTag');
    Route::get('tagRecycleBin','TagController@tagRecycleBin')->name('admin.tagRecycleBin');
    Route::get('table/GetListTagRecycleBin','TagController@GetListTagRecycleBin')->name('admin.GetListTagRecycleBin');
    Route::delete('table/GetListTagRecycleBin/DeleteTagRecycleBin','TagController@DeleteTagRecycleBin')->name('admin.DeleteTagRecycleBin');
    Route::post('table/GetListTagRecycleBin/RestoreTagRecycleBin','TagController@RestoreTagRecycleBin')->name('admin.RestoreTagRecycleBin');

});


Route::get('admin/home', 'HomeController@index')->name('home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
