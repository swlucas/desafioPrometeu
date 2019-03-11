<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$this->group(['prefix'=>'auth'],function(){
    $this->post('login', 'API\PassportController@login');
    $this->post('register', 'API\PassportController@register');
});

Route::middleware('auth:api')->group( function () {

    $this->group(['prefix'=>'automotiveParts'],function(){
        $this->get('/','AutomotivePartsController@getAll');
        // // $this->post('/','AutomotivePartsController@create');
        // $this->put('{id}','AutomotivePartsController@update');
        // $this->delete('{id}','AutomotivePartsController@delete');
    });

    $this->group(['prefix'=>'shopcart'],function(){
        $this->get('/','ShopcartController@get');
        $this->post('/','ShopcartController@create');
        $this->put('/','ShopcartController@update');
        $this->delete('/','ShopcartController@update');
    });

});
