<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//questo controller non restituisce una view ma un json che troviamo in Api\MovieController nella funzione index
// Route::get('/movies', 'Api\MovieController@index' );
// Route::get('/movies/bestmovies', 'Api\MovieController@bestmovies' );
// Route::get('/movies/{movie}', 'Api\MovieController@show');

//in post non sono navigabili
// Route::post('/movies', 'Api\MovieController@index' );
// Route::post('/movies/bestmovies', 'Api\MovieController@bestmovies' );
// Route::post('/movies/{movie}', 'Api\MovieController@show');
//con il middlewere si possono proteggere le api

Route::middleware('api_check')->namespace('Api')->group(function(){
    Route::post('/movies', 'Api\MovieController@index' );
    Route::post('/movies/bestmovies', 'MovieController@bestmovies' );
    Route::post('/movies/{movie}', 'MovieController@show');
});
