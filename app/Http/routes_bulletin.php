<?php

// Route::get('/campaign/{campaignId}/bulletins', ['as' => 'list', 'uses' => 'Bulletins@show'])->where(['campaignId' => '[0-9]+']);

Route::group(['prefix' => 'bulletins', 'as' => 'bulletins.'], function () {

    Route::get('/', ['as' => 'list', 'uses' => 'Bulletins@show']);
    Route::get('/create', ['as' => 'create', 'uses' => 'Bulletins@add']);
    Route::post('/create', ['as' => 'create', 'uses' => 'Bulletins@create']);
    Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'Bulletins@edit'])->where(['id' => '[0-9]+']);
    Route::post('/{id}/save', ['as' => 'update', 'uses' => 'Bulletins@update'])->where(['id' => '[0-9]+']);
    Route::get('/{id}/delete', ['as' => 'delete', 'uses' => 'Bulletins@delete'])->where(['id' => '[0-9]+']);

});