<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\GuestPagesController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\UserWalletController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WithdrawalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['middleware' => ['auth', 'check_user_activity', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/referred-users/{id}', 'viewUserReferrals')->name('referred.users');
    });

    Route::controller(PackageController::class)->group(function () {
        Route::get('/packages', 'index')->name('packages');
        Route::get('/package/{name}/{id}/edit', 'edit')->name('package.edit');
        Route::post('/package/{id}/update', 'update')->name('package.update');
    });

    Route::controller(DepositController::class)->group(function () {
        Route::get('/transactions', 'index')->name('user.transactions');
        Route::post('/deposit', 'store')->name('deposit.store');
        // Route::post('/deposit/{id}', 'update')->name('deposit.update');
    });

    Route::controller(WalletController::class)->group(function () {
        Route::get('/wallets', 'index')->name('wallets');
        Route::get('/add-wallet', 'create')->name('wallet.create');
        Route::post('/wallet', 'store')->name('wallet.store');
        Route::get('/wallet/{id}', 'edit')->name('wallet.edit');
        Route::post('/wallet/{id}', 'update')->name('wallet.update');
        Route::post('/wallet/destroy/{id}', 'destroy')->name('wallet.destroy');
    });

    Route::controller(UserWalletController::class)->group(function () {
        Route::post('/user-wallet', 'store')->name('user.wallet.store');
    });

    Route::controller(ReferralController::class)->group(function () {
        Route::get('/referrals', 'index')->name('user.referrals');
    });

    Route::controller(InvestmentController::class)->group(function () {
        Route::get('/users/investments', 'index')->name('user.investments');
        Route::get('/{packageName}/invest/{id}', 'create')->name('user.invest');
        Route::post('/{packageName}/invest/{id}', 'store')->name('user.invest.store');
        Route::post('/investment/{id}', 'update')->name('investment.update');
        Route::get('/investments', 'showUsersInvestment')->name('investments');
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/users/transactions', 'index')->name('transactions');
        Route::post('/transaction/{id}', 'update')->name('transaction.update');
    });

    Route::controller(WithdrawalController::class)->group(function () {
        Route::get('/request-withdrawal', 'index')->name('withdrawal');
        Route::post('/request-withdrawal', 'store')->name('withdrawal.store');
    });
});

Route::controller(GuestPagesController::class)->group(function () {
    Route::get('/', 'index')->name('/');
    Route::get('/services', 'services')->name('services');
    Route::get('/about-us', 'about')->name('about');
    Route::get('/contact-us', 'contact')->name('contact');
    Route::post('/contact-us', 'sendEmail')->name('send.email');
});
