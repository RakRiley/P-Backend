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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function()  {
    return str_random(32);
});

$router->get('/jame', function()  {
    return 'เจมส์';
});

//RESTful API
// $router->get('/get','Api\UserController@getItem');
// $router->post('/post','Api\UserController@postItem');
// $router->put('/put/{id}','Api\UserController@putItem');
// $router->delete('/delete/{id}','Api\UserController@deleteItem');

//User
$router->get('/getUser', 'Api\UserController@getUser');
$router->post('/postUser','Api\UserController@postUser');
$router->delete('/deleteUser/{id}','Api\UserController@deleteUser');
$router->put('/putUser/{id}','Api\UserController@putUser');

//Date
$router->get('/getDate', 'Api\DateController@getDate');
$router->get('/getNewDate', 'Api\DateController@getNewDate');
$router->get('/getNumYear', 'Api\DateController@getNumYear');
$router->get('/getNumMounth', 'Api\DateController@getNumMounth');
$router->get('/getCountMounth', 'Api\DateController@getCountMounth');
$router->get('/getallYear', 'Api\DateController@getallYear');
$router->post('/postDate','Api\DateController@postDate');
$router->delete('/deleteDate/{id}','Api\DateController@deleteDate');
$router->put('/putDate/{id}','Api\DateController@putDate');

//Document
$router->get('/getDocument', 'Api\DocumentController@getDocument');
$router->get('/getDocumentC', 'Api\DocumentController@getDocumentC');
$router->get('/getDocumentDistinct', 'Api\DocumentController@getDocumentDistinct');
$router->get('/getNumBook', 'Api\DocumentController@getNumBook');
$router->get('/getDocfromYear', 'Api\DocumentController@getDocfromYear');
$router->get('/getDocfrommonth', 'Api\DocumentController@getDocfrommonth');
$router->get('/getDatepicker', 'Api\DocumentController@getDatepicker');
$router->get('/getDocumentnumN', 'Api\DocumentController@getDocumentnumN');
$router->get('/getNumber_of_book_repeatedly', 'Api\DocumentController@getNumber_of_book_repeatedly');
$router->get('/getStatusC', 'Api\DocumentController@getStatusC');
$router->get('/getStatusU', 'Api\DocumentController@getStatusU');
$router->post('/postDocument','Api\DocumentController@postDocument');
$router->delete('/deleteDocument/{id}','Api\DocumentController@deleteDocument');
$router->put('/putDocument/{id}','Api\DocumentController@putDocument');
$router->put('/putStatusDocument/{id}','Api\DocumentController@putStatusDocument');

//get$postfile
$router->get('/getFile', 'Api\FileController@getFile');
$router->post('/postFile','Api\FileController@postFile');
$router->post('/putFile/{id}','Api\FileController@putFile');

//Signer
$router->get('/getSigner', 'Api\SignerController@getSigner');
$router->post('/postSigner','Api\SignerController@postSigner');
$router->delete('/deleteSigner/{id}','Api\SignerController@deleteSigner');
$router->put('/putSigner/{id}','Api\SignerController@putSigner');

//foradmin
$router->get('/getAdmin', 'Api\AdminController@getAdmin');

//Year_peg
$router->get('/getYear_peg', 'Api\Year_pegController@getYear_peg');
$router->post('/postYear_peg','Api\Year_pegController@postYear_peg');
$router->delete('/deleteYear_peg/{id}','Api\Year_pegController@deleteYear_peg');
$router->put('/putYear_peg/{id}','Api\Year_pegController@putYear_peg');