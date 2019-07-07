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
Route::group(['middleware' => ['web']],	function() {
    Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'site']);
    Route::auth();
});
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function() {
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::match(['get', 'post'], '/show', 'DashboardController@show')->name('admin.questions.show');
    Route::match(['get', 'post'], '/showNullAnswer', 'DashboardController@showNullAnswer')->name('admin.questions.showNullAnswer');
    Route::match(['get', 'post'], '/showAllNullAnswer', 'DashboardController@showAllNullAnswer')->name('admin.questions.showAllNullAnswer');
    Route::resource('/category', 'CategoryController', ['as'=>'admin']);
    Route::resource('/question', 'QuestionController', ['as'=>'admin']);
    Route::post('/stop-word/add', 'StopWordController@store', ['as' => 'admin'])->name('admin.stopWords.store');
    Route::post('/stop-word/remove', 'StopWordController@destroy', ['as' => 'admin'])->name('admin.stopWords.delete');
    Route::post('/question/unblock', 'QuestionController@unblock', ['as' => 'admin'])->name('admin.questions.unblock');
    Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment'], function() {
        Route::resource('/user', 'UserController', ['as' => 'admin.user_managment']);
    });
});