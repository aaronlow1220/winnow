<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuthController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\pagesHandleController;
use App\Http\Controllers\adminPagesController;
use App\Http\Controllers\adminImageController;
use App\Http\Controllers\adminHandleController;

// Admin backend pages
Route::name("admin.")->group(function () {
    Route::get("/admin", [adminPagesController::class, "redirectForAdmin"])->name("redirectForAdmin");
    Route::get("/admin/dashboard", [adminPagesController::class, "dashboard"])->name("dashboard");
    Route::get("/admin/article", [adminPagesController::class, "article_list"])->name("article");
    Route::get("/admin/create-article", [adminPagesController::class, "create_article"])->name("create_article");
    Route::get("/admin/category", [adminPagesController::class, "category"])->name("category");
    Route::get("/admin/add-category", [adminPagesController::class, "addCategory"])->name("addCategory");
    Route::get("/admin/product", [adminPagesController::class, "product"])->name("product");
    Route::get("/admin/add-product", [adminPagesController::class, "addProduct"])->name("addProduct");
    Route::get("/admin/edit-article/{id}", [adminPagesController::class, "editPost"])->name("editPost");
    Route::get("/admin/edit-category/{id}", [adminPagesController::class, "editCategory"])->name("editCategory");
    Route::get("/admin/sub-category", [adminPagesController::class, "subCategory"])->name("subCategory");
    Route::get("/admin/add-sub-category", [adminPagesController::class, "addSubCategory"])->name("addSubCategory");
    Route::get("/admin/edit-sub-category/{id}", [adminPagesController::class, "editSubCategory"])->name("editSubCategory");
    Route::get("/admin/edit-product/{id}", [adminPagesController::class, "editProduct"])->name("editProduct");
    Route::get("/admin/user", [adminPagesController::class, "user"])->name("user");
    Route::get("/admin/moderator", [adminPagesController::class, "moderator"])->name("moderator");
    Route::get("/admin/edit-user/{id}", [adminPagesController::class, "editUser"])->name("editUser");
    Route::get("/admin/settings", [adminPagesController::class, "settings"])->name("settings");
    Route::get("/admin/edit-setting/{id}", [adminPagesController::class, "editSetting"])->name("editSetting");
    Route::get("/admin/order-list/{status}", [adminPagesController::class, "orderList"])->name("orderList");
    Route::get("/admin/order/{id}", [adminPagesController::class, "order"])->name("order");
});

// Admin handle
Route::post("/admin/post/imageUpload", [adminImageController::class, "store"])->name("ck.upload");
Route::name("handle.")->group(function () {
    Route::post("/admin/post/get-sub-category-handle", [adminHandleController::class, "getSubCategory"])->name("getSubCategory");
    Route::post("/admin/post/add-category-handle", [adminHandleController::class, "addCategory"])->name("addCategory");
    Route::post("/admin/post/edit-category-handle", [adminHandleController::class, "editCategory"])->name("editCategory");
    Route::post("/admin/post/edit-article-handle", [adminHandleController::class, "editPost"])->name("editPost");
    Route::post("/admin/post/add-sub-category-handle", [adminHandleController::class, "addSubCategory"])->name("addSubCategory");
    Route::post("/admin/post/edit-sub-category-handle", [adminHandleController::class, "editSubCategory"])->name("editSubCategory");
    Route::post("/admin/post/edit-user-handle", [adminHandleController::class, "editUser"])->name("editUser");
    Route::get("/admin/post/reset-password-handle/{id}", [adminHandleController::class, "resetPassword"])->name("resetPassword");
    Route::post("/admin/post/create-post-handle", [adminHandleController::class, "storePost"])->name("storePost");
    Route::post("/admin/post/delete-handle-handle", [adminHandleController::class, "deletePost"])->name("deletePost");
    Route::post("/admin/post/add-product-handle", [adminHandleController::class, "addProduct"])->name("addProduct");
    Route::post("/admin/post/edit-product-handle", [adminHandleController::class, "editProduct"])->name("editProduct");
    Route::get("/admin/update-order/{id}/{status}", [adminHandleController::class, "updateOrder"])->name("updateOrder");
    Route::post("/admin/update-setting", [adminHandleController::class, "updateSetting"])->name("updateSetting");
    Route::post("/admin/category-list-action", [adminHandleController::class, "categoryListAction"])->name("categoryListAction");
    Route::post("/admin/sub-category-list-action", [adminHandleController::class, "subCategoryListAction"])->name("subCategoryListAction");
    Route::post("/admin/user-list-action", [adminHandleController::class, "userListAction"])->name("userListAction");
    Route::post("/admin/product-list-action", [adminHandleController::class, "productListAction"])->name("productListAction");
    Route::get("/admin/settings-init-handle", [adminHandleController::class, "settingsInit"])->name("settingsInit");
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
Route::get("/account", [pagesController::class, "account"])->name("account");
Route::get("/shop", [pagesController::class, "shop"])->name("shop");
Route::get("/cart", [pagesController::class, "cart"])->name("cart");
Route::get("/about-us", [pagesController::class, "aboutUs"])->name("aboutUs");
Route::get("/product/{id}", [pagesController::class, "product"])->name("product");
Route::get("/order-list", [pagesController::class, "orderList"])->name("orderList");
Route::get("/order/{id}", [pagesController::class, "order"])->name("order");
Route::get("/proceed-payment/{orderId}", [pagesController::class, "proceedPayment"])->name("proceedPayment");

Route::name('pageHandle.')->group(function () {
    Route::post('/accountChange', [pagesHandleController::class, "accountChange"])->name("accountChange");
    Route::post("/add-to-cart", [pagesHandleController::class, "addToCart"])->name("addToCart");
    Route::post("/update-cart", [pagesHandleController::class, "updateCart"])->name("updateCart");
    Route::post("/add-order", [pagesHandleController::class, "addOrder"])->name("addOrder");
    Route::post("/add-payment-account", [pagesHandleController::class, "addPaymentAccount"])->name("addPaymentAccount");
});

// Permission error
Route::get("/permission-error", [pagesController::class, "permissionError"]);
Route::get("/page-not-found", [pagesController::class, "notFound"])->name("404");

// Dynamic pages
Route::get("/c/{category}/{subCategory?}/{article?}", [pagesController::class, "post"])->name("post");
Route::get("/m/{category}/{subCategory?}/{article?}", [pagesController::class, "mpost"])->name("mpost");
Route::get("/{category}/{subCategory?}/{article?}", [pagesController::class, "category"])->name("category");
