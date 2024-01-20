<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Examplecontroller;
use App\Http\Controllers\Carcontroller;
use App\Http\Controllers\Contactcontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::fallback(function(){
//     return redirect('/');
// });
Route::get('food', function () {
    return view('food');
});

Route::prefix('learn')->group( function () {

Route::get('test', function () {
    return view('test');
});

Route::get('test1/{id}', function ($id) {
    return 'the id is:' . $id ;
});

Route::get('test2/{id?}', function ($id=0) {
    return 'the id 2 is:' . $id ;
})->where(['id'=> '[0-9]+']);


Route::get('test3/{id?}', function ($id=0) {
    return 'the id 2 is:' . $id ;
})->whereNumber('id');

Route::get('test4/{name?}', function ($name=null) {
    return 'the name is:' . $name ;
})->whereAlpha('name');

Route::get('test5/{id}/{name}', function ($id=0,$name) {
    return 'the age is: ' . $id .'and the name is : '. $name ;
})->where(['id'=> '[0-9]+', 'name'=>'[a-zA-Z]+']);
});

Route::get('product/{category}', function ($cat) {
     return 'the product is:' . $cat ;
})->whereIn('category',['pc', 'mobile', 'laptop']);

//session3

Route::get('login', function () {
    return view('login');
});
Route::post('logged', function() {
    return 'you are logged';
})->name('logged');
Route::get('control',[Examplecontroller::class,'show']);

//session4
// Route::get('storeCar',[Carcontroller::class,'store']);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
Route::get('createCar',[Carcontroller::class,'create'])->middleware('verified')->name ('createCar');
Route::post('storeCar',[Carcontroller::class,'store'])->name ('storeCar');
Route::get('cars',[Carcontroller::class,'index']);

//session5
Route::get('updateCar/{id}',[Carcontroller::class,'edit'])->name('updateCar');
Route::put('update/{id}',[Carcontroller::class,'update'])->name('update');
Route::get('showCar/{id}',[Carcontroller::class,'show'])->name('show');


//session6
Route::get('deleteCar/{id}',[Carcontroller::class,'destroy']);
Route::get('trashed',[Carcontroller::class,'trashed'])->name('trashed');
Route::get('forceDelete/{id}',[Carcontroller::class,'forceDelete']);
Route::get('restoreCar/{id}',[Carcontroller::class,'restore']);
});
//session7
Route::get('test', function () {
    return view('test');
});

 //session8
 Route::get('index', function () {
    return view('index');
})->name('index');

Route::get('404', function () {
    return view('404');
})->name('404');

Route::get('contact', function () {
    return view('contact');
})->name('contact');


Route::get('image', function () {
    return view('image');
});
Route::post('imageUpload',[Examplecontroller::class,'upload'])->name('imageUpload');

//session11
// Auth::routes();
Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//session12
Route::get('test20',[Examplecontroller::class,'createSession']);
//task12
Route::post('contactmail',[Contactcontroller::class,'contactmail']);