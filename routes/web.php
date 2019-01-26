<?php

use GuzzleHttp\Client;
use App\Post;

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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/getdata', 'PostController@index');

Route::get('/fetch', function() {   

    // $http = new  GuzzleHttp\Client;

    // $response = $http->get(url('https://jsonplaceholder.typicode.com/posts'));

    // return $response;

    $http = new  \GuzzleHttp\Client;
    $response = $http->get(url('http://jsonplaceholder.typicode.com/posts/' . rand(1,100) ));   

    $data = json_decode((string)$response->getBody(), true);


    // $post['userId'] = $data->userId;
    // $post['id'] = $data->id;
    // $post['title'] = $data->title;
    // $post['body'] = $data->body;


    $wow = Post::create($data);

    return $wow;

});