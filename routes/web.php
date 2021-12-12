<?php

/** @var \Laravel\Lumen\Routing\Router $router */


//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->get('/', function (){
    return 'Hello Laravel Lumen';
});

//$router->post('/{name}/{age}[/{city}]', function ($name, $age, $city = null){
//    return $name.$age.$city;
//});

//$router->get('/{name}[/{age}]',"MyController@test");

//$router->get('/{name}',"MyController@myFunction");
//$router->get('/',"MyController@myFunction2");
//$router->get('/first',"MyController@first");
//$router->get('/second',"MyController@second");
//$router->get('/download',"MyController@download");


$router->post('/send',"MyController@sendData");
$router->get('/check',"MyController@checkConnection");


//Raw Sql query
$router->get('/student',"SqlController@selectStudent");
$router->post('/student',"SqlController@storeStudent");
$router->put('/student',"SqlController@updateStudent");
$router->delete('/student',"SqlController@deleteStudent");


//Query Builder
$router->get('/builder',"QueryBuilderController@select");
$router->post('/builder',"QueryBuilderController@store");
$router->put('/builder',"QueryBuilderController@update");
$router->delete('/builder',"QueryBuilderController@delete");


//Eloquent ORM
$router->get('/eloquent',['middleware' => 'auth','uses' => 'EloquentORMController@index']);
$router->post('/eloquent',"EloquentORMController@store");
$router->put('/eloquent',"EloquentORMController@update");
$router->delete('/eloquent',"EloquentORMController@destroy");




