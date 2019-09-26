<?php

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



Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('game');
    })->name('game');
    Route::group(['prefix' => 'game'], function () {
        Route::get('game', 'GameController@start')->name('game.start');
        Route::get('game/convert/{money}', 'GameController@convert')->name('game.convert');
        Route::get('game/getMoney/{money}', 'GameController@get')->name('game.getMoney');
        Route::get('game/soldItem/{price}', 'GameController@soldItem')->name('game.soldItem');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('postForm/{id}', 'PostController@form')->name('post.postForm');
        Route::post('send', 'PostController@send')->name('post.send');
    });

    Route::group(['prefix' => 'types'], function () {
        Route::get('editForm/{id}', 'PrizeTypeController@editForm')->name('types.editForm');
        //Route::post('send', 'PostController@send')->name('post.send');
        Route::get('addForm', function () {
            return view('types.Form');
        });
    });
});
