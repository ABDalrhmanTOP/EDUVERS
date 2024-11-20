<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUESSR;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthUser;


Route::post('/login', [AuthUESSR::class, 'login'])
->middleware('auth:sanctum');

Route::get('/register', [Controller::class, 'register'])
->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


