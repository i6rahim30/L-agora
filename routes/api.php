<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\User\ReviewController;
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




Route::post('/login', [RegisteredUserController::class, 'login'])
    ->middleware(['guest'])
    ->name('login');

Route::post('/api/login', [RegisteredUserController::class, 'login'])
    ->middleware(['guest', 'throttle:10,1'])
    ->name('login.api');


Route::post('/register', [VendorController::class, 'VendorRegisterapi']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/vendor/all-products', [VendorProductController::class, 'VendorAllProductapi']);
    Route::get('/vendor/add-products', [VendorProductController::class, 'VendorAddProductAPI']);
    Route::post('/vendor/store-products', [VendorProductController::class, 'VendorStoreProductAPI']);
    Route::get('/vendor/edit-products/{id}', [VendorProductController::class, 'VendorEditProductAPI']);
    Route::post('/vendor/update-products', [VendorProductController::class, 'VendorUpdateProductAPI']);
    Route::post('/vendor/update-thumbnail-products', [VendorProductController::class, 'VendorUpdateProductThumbnailAPI']);
    Route::post('/vendor/update-multiimage-products', [VendorProductController::class, 'VendorUpdateProductMultiimageAPI']);
    Route::post('/vendor/store-multiimage-products', [VendorProductController::class, 'VendorStoreMultiImageAPI']);
    Route::get('/vendor/delete-multiimage-products/{id}', [VendorProductController::class, 'VendorMultiImageDeleteAPI']);
    Route::get('/vendor/inactive/{id}', [VendorProductController::class, 'VendorProductInactiveAPI']);
    Route::get('/vendor/active/{id}', [VendorProductController::class, 'VendorProductActiveAPI']);
    Route::get('/vendor/delete-products/{id}', [VendorProductController::class, 'VendorDeleteProductAPI']);
    Route::get('/vendor/order', [VendorOrderController::class, 'VendorOrderAPI']);
    Route::get('/vendor/return-order', [VendorOrderController::class, 'VendorReturnOrderAPI']);
    Route::get('/vendor/complete-return-order', [VendorOrderController::class, 'VendorCompleteReturnOrderAPI']);
    Route::get('/vendor/order-details/{id}', [VendorOrderController::class, 'VendorOrderDetailsAPI']);
    Route::get('/vendor/all-reviews', [ReviewController::class, 'VendorAllReviewAPI']);
});