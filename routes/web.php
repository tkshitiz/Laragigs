<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', function () {      
       return "this is kshitiz admin";
    });
 
 });
 
//  Route::get('/posts/{id}', function($id){
//   // ddd($id);
//     return response('Post'.$id);
//  })->where('id','[0-9]+');

//  Route::get('/search',function(Request $request){
//    return $request->name ." ".$request->city;
//  }); 

// ALL LISTINGS
 Route::get('/',[ListingController::class,'index']);

   //  create listing
Route::get('listings/postjob',[ListingController::class, 'create']);
// store listing
 Route::post('/listings',[ListingController::class, 'store']);
//  Single Listing
  Route::get('listings/{listing}',[ListingController::class, 'show']);

