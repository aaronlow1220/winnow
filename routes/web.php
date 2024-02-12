<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuthController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\adminPagesController;
use App\Http\Controllers\adminImageController;
use App\Http\Controllers\adminHandleController;

// test
Route::get("/testUpload", [pagesController::class,"testUpload"])->name("testUpload");
Route::get("/testCategory", [pagesController::class,"testCategory"])->name("testCategory");
Route::get("/testSubCategory", [pagesController::class,"testSubCategory"])->name("testSubCategory");
Route::post("/testUploadHandle", [pagesController::class,"testUploadHandle"])->name("testUploadHandle");
Route::post("/testCategoryHandle", [pagesController::class,"testCategoryHandle"])->name("testCategoryHandle");
Route::post("/testSubCategoryHandle", [pagesController::class,"testSubCategoryHandle"])->name("testSubCategoryHandle");

// Admin backend pages
Route::name("admin.")->group(function(){
    Route::get("/admin/dashboard", [adminPagesController::class, "dashboard"])->name("dashboard");
    Route::get("/admin/dashboard/article", [adminPagesController::class, "article_list"])->name("article");
    Route::get("/admin/dashboard/create-article", [adminPagesController::class, "create_article"])->name("create_article");
    Route::get("/admin/dashboard/category", [adminPagesController::class, "category"])->name("category");
    Route::get("/admin/dashboard/edit-category/{id}", [adminPagesController::class, "editCategory"])->name("editCategory");
    Route::get("/admin/dashboard/sub-category", [adminPagesController::class, "subCategory"])->name("subCategory");
    Route::get("/admin/dashboard/edit-sub-category/{id}", [adminPagesController::class, "editSubCategory"])->name("editSubCategory");
    Route::get("/admin/dashboard/user", [adminPagesController::class, "user"])->name("user");
    Route::get("/admin/dashboard/moderator", [adminPagesController::class, "moderator"])->name("moderator");
    Route::get("/admin/dashboard/edit-user/{id}", [adminPagesController::class, "editUser"])->name("editUser");
    Route::get("/admin/dashboard/settings", [adminPagesController::class, "settings"])->name("settings");
});

// Admin handle
Route::post("/admin/post/imageUpload",[adminImageController::class,"store"])->name("ck.upload");
Route::name("handle.")->group(function(){
    Route::post("/admin/post/get-sub-category-handle",[adminHandleController::class,"getSubCategory"])->name("getSubCategory");
    Route::post("/admin/post/edit-category-handle",[adminHandleController::class,"editCategory"])->name("editCategory");
    Route::post("/admin/post/edit-sub-category-handle",[adminHandleController::class,"editSubCategory"])->name("editSubCategory");
    Route::post("/admin/post/edit-user-handle",[adminHandleController::class,"editUser"])->name("editUser");
    Route::get("/admin/post/reset-password-handle/{id}",[adminHandleController::class,"resetPassword"])->name("resetPassword");
    Route::post("/admin/post/create-post-handle",[adminHandleController::class,"storePost"])->name("storePost");
});


// Auth pages
Route::name('auth.')->group(function () {
    Route::get("/auth/register", [pagesController::class, "register"])->name("register");
    Route::get("/auth/login", [pagesController::class, "login"])->name("login");
});

// Auth
Route::name('authHandle.')->group(function () {
    Route::post("/auth/register-user", [userAuthController::class, "registerUser"])->name("registerUser");
    Route::post("/auth/login-user", [userAuthController::class, "loginUser"])->name("loginUser");
    Route::get("/auth/logout", [userAuthController::class, "logout"])->name("logout");
});

// General pages
Route::get("/", [pagesController::class, "home"])->name("home");
// Route::get("/latest-news", [pagesController::class, "latestNews"]);
// Route::get("/dishes", [pagesController::class, "dishes"])->name("dishes");
// Route::get("/attractions", [pagesController::class, "attractions"]);
// Route::get("/dream", [pagesController::class, "dream"]);
// Route::get("/food-shop", [pagesController::class, "foodShop"]);
// Route::get("/about-us", [pagesController::class, "aboutUs"]);
Route::get("/permission-error", [pagesController::class, "permissionError"]);

Route::get("/{category}", [pagesController::class, "category"])->name("category");
Route::get("/{category}/{subCategory}/{article}", [pagesController::class, "pages"])->name("pages");
