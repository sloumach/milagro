<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->middleware(['auth:sanctum','role:admin'])->group(function () {
    Route::apiResource('categories', AdminCategoriesController::class);
    Route::apiResource('products', AdminProductsController::class);
    Route::apiResource('coupons', AdminCouponController::class);
});

Route::middleware(['auth:sanctum', 'role:user'])->prefix('user')->group(function () {
    Route::apiResource('orders', UserOrderController::class)->only(['index', 'store', 'show']);
});
Route::middleware(['auth:sanctum', 'role:user'])->prefix('user/cart')->group(function () {
    Route::get('/', [UserCartController::class, 'index']);
    Route::post('/', [UserCartController::class, 'store']);
    Route::put('/', [UserCartController::class, 'update']);
    Route::delete('/', [UserCartController::class, 'destroy']);
    Route::delete('/clear', [UserCartController::class, 'clear']);
});



