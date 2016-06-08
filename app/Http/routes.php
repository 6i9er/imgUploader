<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect("api/upload/list");
});

//Route::Controller("backend/serviceplacecategory","ServicePlaceCategoryController");
//Route::Controller('upload' , 'ImgUploaderController');

Route::group(array("namespace" => "api"),function(){
  Route::Controller("api/upload","ImgUploaderController");
 

});