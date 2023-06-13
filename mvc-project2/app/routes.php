<?php

use App\Controllers\ContactController;
use Core\RouteService as Route;
use App\Controllers\HomeController;



Route::get('sliders/category/{path}/{id}',[HomeController::class,'about']);


//
//Route::get('contact',[ContactController::class,'index']);
//
//Route::get('about',[ContactController::class,'about']);
//
//
//
//
//Route::get('clear',function (){
//header('Location: https://google.com');
//});
//Route::get('index',function (){
//    echo 'route function ishledi';
//});





