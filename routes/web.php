<?php

use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\Search\CurrencySearchController;
use Illuminate\Support\Facades\Route;

//There is no front-end, feel free to build your own !
Route::redirect('/', 'login');

//All your dashboard's routes going to be here.
Route::group([
    'as'         => 'panel.',
    'middleware' => [
        'verified',
    ],
], static function () {
    Route::view('dashboard', 'pages.panel.dashboard')->name('dashboard');

    Route::resources([
        'exchanges' => ExchangeController::class,
    ]);
});

Route::group([
    'as'     => 'search.',
    'prefix' => 'search/',
], static function () {
    Route::group([
        'as'     => 'currencies.',
        'prefix' => 'currencies/',
    ], static function () {
        Route::controller(CurrencySearchController::class)->group(static function () {
            Route::get('getAllData', 'getAllData')->name('getAllData');
            Route::get('getFiatData', 'getFiatData')->name('getFiatData');
            Route::get('getCryptoData', 'getCryptoData')->name('getCryptoData');
        });
    });
});