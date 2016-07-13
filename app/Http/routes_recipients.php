<?php

Route::group(['prefix' => 'recipients', 'as' => 'recipients.'], function () {

    Route::get('/select-campaign', ['as' => 'select_campaign', 'uses' => 'Recipients@selectCampaign']);
    Route::get('/{id}-{name}', ['as' => 'list', 'uses' => 'Recipients@showStats'])->where(['id' => '[0-9]+']);
    Route::get('/{id}-{name}/download', ['as' => 'download', 'uses' => 'Recipients@download'])->where(['id' => '[0-9]+']);


    Route::get('/seeder', ['as' => 'seeder_recipients', 'uses' => 'Recipients@seeder']);

});