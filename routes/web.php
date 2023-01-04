<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

Route::get('/hello',function(){
  return response('hello world');
});

// Auth::routes(); need to check
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', function () {      
       return "this is kshitiz admin";
    });
 
 });
 


// ALL LISTINGS
 Route::get('/',[ListingController::class,'index']);

   //  create listing
Route::get('listings/postjob',[ListingController::class, 'create']);
// store listing
 Route::post('/listings',[ListingController::class, 'store']); 
//  Single Listing
  Route::get('listings/{listing}',[ListingController::class, 'show']);
//  Edit Listing  
Route::get('listings/{listing}/edit',[ListingController::class, 'edit']);

// Edit Submit to update
Route::put('listings/{listing}',[ListingController::class, 'update']);

Route::delete('listings/{listing}',[ListingController::class, 'destroy']);


//Show register form
Route::get('/register',[UserController::class, 'create']);

// create new user
Route::post('/users',[UserController::class, 'store']);

Route::post('/logout',[UserController::class, 'logout']);

//show login form
Route::get('/login',[UserController::class, 'login']);
