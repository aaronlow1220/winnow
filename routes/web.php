<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuthController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\adminPagesController;
use App\Http\Controllers\adminController;

// General pages
Route::get("/",[pagesController::class, "home"]);
Route::get("/latest-news",[pagesController::class, "latestNews"]);
Route::get("/dishes",[pagesController::class, "dishes"]);
Route::get("/attractions", [pagesController::class, "attractions"]);
Route::get("/dream", [pagesController::class, "dream"]);
Route::get("/food-shop", [pagesController::class, "foodShop"]);
Route::get("/about-us", [pagesController::class, "aboutUs"]);

// Admin backend pages
Route::get("/admin/dashboard",[adminPagesController::class, "dashboard"]);

// Admin handle

// Auth pages
Route::get("/auth/register", [pagesController::class, "register"]);
Route::get("/auth/login",[pagesController::class, "login"]);

// Auth
Route::post("/auth/register-user", [userAuthController::class, "registerUser"]);
Route::post("/auth/login-user", [userAuthController::class, "loginUser"]);
Route::get("/auth/logout",[userAuthController::class, "logout"]);
