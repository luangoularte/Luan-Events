<?php

use Illuminate\Support\Facades\Route;

Route::namespace('\App\Web\Task\Controllers')->group( function () {
    Route::get('/', 'TaskController@index');
    Route::post('/', 'TaskController@store');

});
