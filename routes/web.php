<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () {
    return view('homepage');
});

$router->get('/scrapper/profile/form', 'ProfileScrapperController@form');
$router->get('/scrapper/followers/form', 'FollowersCounterScrapperController@form');


$router->get('/scrapper/profile', 'ProfileScrapperController@scrap');
$router->get('/scrapper/followers', 'FollowersCounterScrapperController@scrap');
