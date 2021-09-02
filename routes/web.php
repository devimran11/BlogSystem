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
use App\Category;
use Illuminate\Contracts\View\View;

Route::get('/', 'HomeController@index')->name('home');
Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('post/{slug}', 'PostController@details')->name('post.details');
Route::get('category/{slug}', 'PostController@postByCategory')->name('category.posts');
Route::get('tag/{slug}', 'PostController@postByTag')->name('tags.posts');
Route::get('search', 'SearchController@search')->name('search');
Route::get('profile/{username}', 'AuthorController@profile')->name('author.profile');
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::post('favorite/{post}/add', 'FavoriteController@add')->name('post.favorite');
    Route::post('comment/{post}', 'CommentController@store')->name('comment.store');
});
Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::put('profile-update', 'SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingsController@passwordUpdate')->name('password.update');
    Route::resource('tag', TagController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::get('pending/post', 'PostController@pending')->name('post.pending');
    Route::put('post/{id}/approved', 'PostController@approved')->name('post.approve');
    Route::get('/favorite', 'FavoriteController@index')->name('favorite.index');
    Route::get('comment', 'CommentController@index')->name('comment.index');
    Route::delete('comment/{id}', 'CommentController@destroy')->name('comment.destroy');
    Route::get('author', 'AuthorController@index')->name('author.index');
    Route::delete('author/{id}', 'AuthorController@destroy')->name('author.destroy');
    Route::get('/subscriber', 'SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}', 'SubscriberController@destroy')->name('subscriber.destroy');
});
Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'Author', 'middleware'=>['auth', 'author']], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('post', PostController::class);
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::put('profile-update', 'SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingsController@passwordUpdate')->name('password.update');
    Route::get('/favorite', 'FavoriteController@index')->name('favorite.index');
    Route::get('comment', 'CommentController@index')->name('comment.index');
    Route::get('comment/{id}', 'CommentController@destroy')->name('comment.destroy');
});
// view()->composer('layouts.frontend.partial.footer', function ($view) {
//     $categories = App\Category::all();
//     $view->with('categories',$categories);
// });

// View::composer('layouts.frontend.partial.footer',function ($view) {
//     $categorie = App\Category::all();
//     $view->with('categorie',$categorie);
// });
