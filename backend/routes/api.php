<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('bootcamps' , BootcampController::class);

Route::apiResource('courses' , CoursesController::class);

Route::apiResource('review' , ReviewController::class);

//Ruta especifica par acrearle un curso a un bootcamp:

    Route::post("courses/{idbootcamp}/create",
                //Aquí va lo que quiero que ejecute está ruta
                    //En la ruta store debe de llegar el 
                    //id del bootcamp
                [ CoursesController::class , "store"]
                );