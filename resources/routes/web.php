<?php

use Illuminate\Support\Facades\Route;
use Vedian\Grapebuilder\Controllers\LayoutController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'prefix' => 'layout'
], function () {
    Route::controller(LayoutController::class)
        ->group(function () {

            // location routes
            Route::get('create/{type}', 'create');

            // Mark order of execution
            // Route::get('index/{id}', 'create');
            Route::get('edit/{type}/{id}', 'edit');

            // action routes

        });
});
