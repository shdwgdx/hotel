<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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

//CHANGE LANG
Route::get('locale/{locale}', 'App\Http\Controllers\MainController@changeLocale')->name('locale');

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index-page');
Route::get('/terms', 'App\Http\Controllers\MainController@terms')->name('terms-page');
Route::get('/privacy-policy', 'App\Http\Controllers\MainController@privacy')->name('privacy-policy-page');
Route::get('/return-policy', 'App\Http\Controllers\MainController@return')->name('return-policy-page');
Route::get('/cookies', 'App\Http\Controllers\MainController@cookies')->name('cookies-page');
Route::get('/advertisement/{id}', 'App\Http\Controllers\AdvertisementController@index')->name('advertisement-page');
Route::get('/advertisement-sale/{id}', 'App\Http\Controllers\AdvertisementController@sale')->name('advertisement-sale-page');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contact-page');
Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('search-page');
Route::get('/service', 'App\Http\Controllers\ServiceController@index')->name('service-page');
Route::get('/favorites', 'App\Http\Controllers\MainController@favorites')->name('favorites-page');
Route::get('/transfer', 'App\Http\Controllers\TransferController@index')->name('transfer-page');
Route::get('/buy', 'App\Http\Controllers\SearchSaleController@index')->name('search-sale-page');
// Admin
// Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('index-page-admin');
Route::get('/admin', 'App\Http\Controllers\AdminController@moderation')->name('admin-page-moderation');
Route::get('/admin/published', 'App\Http\Controllers\AdminController@published')->name('admin-page-published');
Route::get('/admin/edit/{id}', 'App\Http\Controllers\AdminController@edit')->name('edit-advertisement-admin');
Route::get('/admin/delete/{id}', 'App\Http\Controllers\AdminController@delete')->name('delete-advertisement-admin');
Route::post('/admin/reject', 'App\Http\Controllers\AdminController@reject')->name('reject-advertisement-admin');
Route::post('/admin/publicate', 'App\Http\Controllers\AdminController@publicate')->name('publicate-advertisement-admin');
Route::get('/admin/login', 'App\Http\Controllers\AdminController@loginIndex')->name('admin-login-index');
Route::get('/admin/logout', 'App\Http\Controllers\AdminController@logout')->name('admin-logout');
// PROFILE
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('index-page-profile');
    Route::get('/profile/advertisements', 'App\Http\Controllers\ProfileController@advertisements')->name('index-page-advertisements');
    Route::get('/profile/active-advertisements', 'App\Http\Controllers\ProfileController@activeAdvertisements')->name('active-page-advertisements');
    Route::get('/profile/inactive-advertisements', 'App\Http\Controllers\ProfileController@inactiveAdvertisements')->name('inactive-page-advertisements');
    Route::get('/profile/create', 'App\Http\Controllers\ProfileController@create')->name('create-page-advertisement');
    Route::get('/profile/edit/{advertisement}', 'App\Http\Controllers\ProfileController@edit')->name('edit-advertisement-profile');
    Route::post('/profile/republish', 'App\Http\Controllers\ProfileController@republish')->name('profile-republish');
    Route::get('/profile/delete/{id}', 'App\Http\Controllers\ProfileController@delete')->name('delete-advertisement-profile');
    Route::get('/profile/logout', 'App\Http\Controllers\ProfileController@logout')->name('profile-logout');
});
Route::post('/profile/register', 'App\Http\Controllers\ProfileController@register')->name('profile-register')->middleware('guest');
Auth::routes(['verify' => true]);
Route::group(['middleware' => 'guest'], function () {
    Route::post('/profile/login', 'App\Http\Controllers\ProfileController@login')->name('profile-login');
    Route::get('/profile/login', 'App\Http\Controllers\ProfileController@loginIndex')->name('profile-login-index');
    Route::get('/profile/sign-up', 'App\Http\Controllers\ProfileController@registerIndex')->name('profile-register-index');
});
// API
Route::post('/', 'App\Http\Controllers\ProfileController@createApi')->name('create-api-admin');
Route::post('/advertisement', 'App\Http\Controllers\ProfileController@createApartmentstApi')->name('create-advertisement-api-admin');
Route::post('/edit', 'App\Http\Controllers\ProfileController@editApi')->name('edit-api-admin');
Route::post('/edit/advertisement', 'App\Http\Controllers\ProfileController@editApartmentsApi')->name('edit-advertisement-api-profile');
Route::post('/del-img/{id}', 'App\Http\Controllers\ProfileController@delImgApi')->name('del-img-api-admin');
Route::post('/del-date/{id}', 'App\Http\Controllers\ProfileController@delDateApi')->name('del-date-api-admin');
Route::get('/get-district/{id}', 'App\Http\Controllers\ProfileController@getDistrict')->name('get-district-api-admin');
Route::get('/get-filter-district/{id}', 'App\Http\Controllers\ProfileController@getFilterDistrict')->name('get-filter-district-api');
Route::get('/search-api', 'App\Http\Controllers\SearchController@searchApi')->name('search-api');
Route::get('/search-apartment-api', 'App\Http\Controllers\SearchSaleController@searchApartmentApi')->name('search-apartment-api');
Route::post('/booked-api', 'App\Http\Controllers\AdvertisementController@bookedApi')->name('booked-api');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// APPS
Route::get('/auth/vkontakte', [LoginController::class, 'redirectToVkontakte'])->name('login.vkontakte');
Route::get('/auth/vkontakte/callback', [LoginController::class, 'handleVkontakteCallback']);
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('auth/yandex', [LoginController::class, 'redirectToYandex']);
Route::get('auth/yandex/callback', [LoginController::class, 'handleYandexCallback']);
