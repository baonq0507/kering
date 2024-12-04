<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'kering'])->name('kering');

Route::middleware(['lang'])->prefix('kering')->group(function () {
    Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::middleware(['auth', 'checkstatus'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/order', [HomeController::class, 'history'])->name('order.index');
        Route::get('/user', [HomeController::class, 'user'])->name('user.index');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/mission', [HomeController::class, 'mission'])->name('mission.index');
        Route::post('/mission/start', [HomeController::class, 'missionStart'])->name('mission.start');
        Route::get('/deposit', [HomeController::class, 'deposit'])->name('deposit.index');
        Route::post('/deposit', [HomeController::class, 'depositStore'])->name('deposit.store');
        Route::get('/withdraw', [HomeController::class, 'withdraw'])->name('withdraw.index');
        Route::post('/withdraw', [HomeController::class, 'withdrawStore'])->name('withdraw.store');
        Route::get('/giaodich', [HomeController::class, 'giaodich'])->name('giaodich.index');
        Route::get('/password', [HomeController::class, 'password'])->name('password.index');
        Route::post('/password', [HomeController::class, 'passwordStore'])->name('password.store');
        Route::get('/bank', [HomeController::class, 'bank'])->name('bank.index');
        Route::post('/bank', [HomeController::class, 'bankStore'])->name('bank.store');
        Route::get('/level', [HomeController::class, 'level'])->name('level.index');
        Route::get('/address', [HomeController::class, 'address'])->name('address.index');
        Route::post('/address', [HomeController::class, 'addressStore'])->name('address.store');
        Route::post('/product/buy', [HomeController::class, 'productBuy'])->name('product.buy');
        Route::get('/feedback', [HomeController::class, 'feedback'])->name('feedback.index');
        Route::get('/invite', [HomeController::class, 'invite'])->name('invite.index');
        Route::post('/user/update-avatar', [HomeController::class, 'updateAvatar'])->name('user.update-avatar');
        Route::get('/team', [HomeController::class, 'team'])->name('team.index');
    });
});
Route::get('/product-category', [HomeController::class, 'productCategory'])->name('product.category');
Route::get('/development', [HomeController::class, 'development'])->name('development');

Route::get('/change-lang/{lang}', [LangController::class, 'changeLang'])->name('change.language');
