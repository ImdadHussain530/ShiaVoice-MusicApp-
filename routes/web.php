<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CustomAuthController;
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

Route::middleware(['CustomAuth',])->group(function (){

    Route::get('/dashboard',[ViewController::class,'dashboard'])->name('dashboard');
    Route::get('/musics',[ViewController::class,'search'])->name('search');
});
Route::middleware(['Iflogin',])->group(function (){
    Route::get('/registration',[CustomAuthController::class,'registerView'])->name('registerView');
    Route::post('/register',[CustomAuthController::class,'register'])->name('register');
    Route::get('/login',[CustomAuthController::class,'LoginView'])->name('LoginView');
    Route::post('/login',[CustomAuthController::class,'login'])->name('login');


});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/logout',[CustomAuthController::class,'logout'])->name('logout');


Route::get('/admin',[ViewController::class,'admin']);
Route::get('/admin/music',[ViewController::class,'music'] )->name('music');
Route::get('/admin/update-music/{id}',[MusicController::class,'edit'] )->name('updateViewMusic');
Route::post('/admin/update-music',[MusicController::class,'update'] )->name('UpdateMusic');
Route::post('/admin/artist',[ArtistController::class,'store'] )->name('storeartist');
Route::get('/admin/add-artist',[ArtistController::class,'index'] )->name('addartist');
Route::get('/admin/update-artist/{id}',[ArtistController::class,'edit'] )->name('updateViewArtist');
Route::post('/admin/update-artist',[ArtistController::class,'update'] )->name('UpdateArtist');
Route::get('/admin/delete-artist/{id}',[ArtistController::class,'delete'] )->name('DeleteArtist');
Route::get('/admin/delete-music/{id}',[MusicController::class,'delete'] )->name('DeleteMusic');
Route::get('/admin/artist',[ViewController::class,'artist'] )->name('artist');
Route::get('/admin/add-music',[MusicController::class,'index'])->name('addmusic');
Route::post('/add-music',[MusicController::class,'store'])->name('storeMusic');
