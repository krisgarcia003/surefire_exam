<?php

use App\Post;
use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('getdata', function () {

    $http = new  \GuzzleHttp\Client;
    $response = $http->get(url('https://jsonplaceholder.typicode.com/posts/' . rand(1,100) ));   

    $data = json_decode((string)$response->getBody(), true);

    $wow = Post::create($data);

})->describe('Fetch data from "http://jsonplaceholder.typicode.com/posts/" Note: It fetch single data only because api server did not response if I get bulk of data');