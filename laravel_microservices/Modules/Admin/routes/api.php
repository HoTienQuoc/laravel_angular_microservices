<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AuthController;
use Modules\Admin\Http\Controllers\ProductController;
use Modules\Admin\Http\Controllers\RoleController;
use Modules\Admin\Http\Controllers\UserController;



// Route::get("/users",[UserController::class,'index']);
// Route::get("/users/{id}",[UserController::class,'show']);
// Route::post("/users",[UserController::class,'store']);
// Route::put("/users/{id}",[UserController::class,'update']);
// Route::delete("/users/{id}",[UserController::class,'destroy']);


Route::post('/login',[AuthController::class,"login"]);
Route::post('/register',[AuthController::class,"register"]);


Route::group(['middleware'=>'auth:api'], function (){
    Route::get('user',[UserController::class,'user']);
    Route::put('user/info',[UserController::class,'updateInfo']);
    Route::put('user/password',[UserController::class,'updatePassword']);
    Route::apiResource("users",UserController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('products', ProductController::class);

});
