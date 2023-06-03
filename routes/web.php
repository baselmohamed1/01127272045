<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ServerController;
use App\Models\Package;
use App\Models\Payment;
// use Faker\Provider\ms_MY\Payment;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Platform;
use App\Models\Server;
use App\Models\Content;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    // contents list page

    Route::get('contents', [ContentController::class, 'index'])
        ->name('contents.index');

    Route::middleware(['subscribed'])->group(function () {
        // create content page
        Route::get('contents/create', [ContentController::class, 'create'])
            ->middleware('subscribed')
            ->name('contents.create');

        // store new content
        Route::post('contents', [ContentController::class, 'store'])
            ->name('contents.store');

        // content edit view
        Route::get('contents/{id}/edit', [ContentController::class, 'show'])->name('contents.edit');

        // update content edit view
        Route::post('contents/{id}/update', [ContentController::class, 'update'])->name('contents.update');

        // delete content
        Route::delete('contents/{id}', [ContentController::class, 'delete'])->name('contents.delete');
    });

    // server
    Route::get('servers', [ServerController::class, 'index'])
        ->name('servers.index');

    Route::middleware(['subscribed'])->group(function () {
        // CreateServer
        Route::get('servers/create', [ServerController::class, 'create'])
            ->name('servers.create');

        //ServerStore
        Route::post('servers', [ServerController::class, 'store'])
            ->name('servers.save');

        // servercontroller edit delete view
        Route::get('servers/{id}/edit', [ServerController::class, 'show'])->name('servers.edit');

        Route::post('servers/{id}/update', [ServerController::class, 'update'])->name('servers.update');

        Route::delete('servers/{id}', [ServerController::class, 'delete'])->name('servers.delete');
        // servercontroller edit delete view

    });

    // Price
    Route::get('/price', function () {
        return Inertia::render('Price', [
            'packages' => Package::where('type', 'subscription')->get(),
        ]);
    })->name('price');
    // Price

    Route::middleware(['subscribed'])->group(function () {

        // PurchaseAddon
        Route::get('/purchase-addon', function () {
            return Inertia::render('PurchaseAddon', [
                'packages' => Package::where('type', 'addon')->get(),
            ]);
        })->name('purchase-addon');
        // PurchaseAddon

    });

    // Payment
    Route::post('subscription-result/{subscription_id}', [PaymentController::class, 'subscriptionResult'])->name('subscription.result');
    Route::get('subscription-successful', [PaymentController::class, 'subscriptionSuccessful'])->name('subscription.success');
    // Payment

    // AccountSettings
    // account
    Route::get('/accountsettings/account', function () {
        return Inertia::render('AccountSettings/Account');
    });
    // account
    // security
    Route::get('/accountsettings/security', function () {
        return Inertia::render('AccountSettings/Security');
    });
    // security

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__ . '/auth.php';
