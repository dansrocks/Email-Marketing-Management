<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get ('/campaigns', [ 'as' => 'campaigns.list', 'uses' => 'Campaigns@show' ]);
    Route::get ('/campaign/add', [ 'as' => 'campaign.create', 'uses' => 'Campaigns@add'  ]);
    Route::post('/campaign/add', [ 'as' => 'campaign.create', 'uses' => 'Campaigns@create' ]);
    Route::get ('/campaign/{id}/edit', [ 'as' => 'campaign.edit',  'uses' => 'Campaigns@edit' ]);
    Route::post('/campaign/{id}/edit', [ 'as' => 'campaign.update',  'uses' => 'Campaigns@update' ]);
    Route::get ('/campaign/{id}/delete',  [ 'as' => 'campaign.delete',   'uses' => 'Campaigns@delete'  ]);

    // Routes for recipients management
    require_once('routes_recipients.php');

    // Routes for bulletin management
    require_once('routes_bulletin.php');
});
