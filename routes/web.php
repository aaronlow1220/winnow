<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuthController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\adminPagesController;
use App\Http\Controllers\adminImageController;

// test
Route::get("/testUpload", [pagesController::class,"testUpload"])->name("testUpload");
Route::get("/testCategory", [pagesController::class,"testCategory"])->name("testCategory");
Route::get("/testSubCategory", [pagesController::class,"testSubCategory"])->name("testSubCategory");
Route::post("/testUploadHandle", [pagesController::class,"testUploadHandle"])->name("testUploadHandle");
Route::post("/testCategoryHandle", [pagesController::class,"testCategoryHandle"])->name("testCategoryHandle");
Route::post("/testSubCategoryHandle", [pagesController::class,"testSubCategoryHandle"])->name("testSubCategoryHandle");

// Admin backend pages
Route::get("/admin/dashboard", [adminPagesController::class, "dashboard"])->name("admin.dashboard");
Route::get("/admin/dashboard/article/latest-news-list", [adminPagesController::class, "latest_news_list"]);

// Admin handle
Route::post("/admin/post/imageUpload",[adminImageController::class,"store"])->name("ck.upload");

// Auth pages
Route::name('auth.')->group(function () {
    Route::get("/auth/register", [pagesController::class, "register"])->name("register");
    Route::get("/auth/login", [pagesController::class, "login"])->name("login");
});

// Auth
Route::post("/auth/register-user", [userAuthController::class, "registerUser"]);
Route::post("/auth/login-user", [userAuthController::class, "loginUser"]);
Route::get("/auth/logout", [userAuthController::class, "logout"]);

// General pages
// Route::get("/", [pagesController::class, "home"])->name("home");
// Route::get("/latest-news", [pagesController::class, "latestNews"]);
// Route::get("/dishes", [pagesController::class, "dishes"])->name("dishes");
// Route::get("/attractions", [pagesController::class, "attractions"]);
// Route::get("/dream", [pagesController::class, "dream"]);
// Route::get("/food-shop", [pagesController::class, "foodShop"]);
// Route::get("/about-us", [pagesController::class, "aboutUs"]);
Route::get("/permission-error", [pagesController::class, "permissionError"]);

Route::get("/{category}", [pagesController::class, "category"])->name("category");
Route::get("/{category}/{subCategory}/{article}", [pagesController::class, "pages"])->name("pages");
