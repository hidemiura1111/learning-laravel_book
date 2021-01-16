<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArrayController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\RestdataController;
use App\Http\Controllers\RoutingController;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Middleware\Hello2Middleware;


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


// Laravel advanced book
// Routing
Route::get('/routing', [RoutingController::class, 'index'])->name('routing_home');
Route::get('/routing/name_routing_test', [RoutingController::class, 'name_routing_test']);


// Laravel getting started book
// Component
Route::get('/array/show/{id1?}', [ArrayController::class, 'show']);
Route::get('/array/loop', [ArrayController::class, 'loop']);
Route::get('/test', 'App\Http\Controllers\TestController@index');
// https://www.javaer101.com/ja/article/6646658.html


// Composer, Middleware
Route::get('/hello/composer', [HelloController::class, 'composer']);
Route::get('/hello/mdware', [HelloController::class, 'mdware'])->middleware('mdware');
Route::get('/hello/mdware2', [HelloController::class, 'mdware2'])->middleware('mdware2');
// Route::get('/hello/mdware2', [HelloController::class, 'mdware2'])->middleware(Hello2Middleware::class);


// Validation
Route::get('/hello/validation', [HelloController::class, 'validation']);
Route::post('/hello/validation', [HelloController::class, 'validation_post']);

Route::get('/hello/validation/request', [HelloController::class, 'validation_request']);
Route::post('/hello/validation/request', [HelloController::class, 'validation_request_post']);

Route::get('/hello/validation/validator', [HelloController::class, 'validator']); // Ex. hello/validation/validator?id=1&pass=eee
Route::post('/hello/validation/validator', [HelloController::class, 'validator_post']);

Route::get('/hello/cookie', [HelloController::class, 'cookie']);
Route::post('/hello/cookie', [HelloController::class, 'cookie_post']);


//session
Route::get('/hello/session', [HelloController::class, 'session_get']);
Route::post('/hello/session', [HelloController::class, 'session_put']);


// Pagination
Route::get('/hello/paginate', [HelloController::class, 'paginate']);

// Auth
Route::get('/hello/auth', [HelloController::class, 'auth'])->middleware('auth');
Route::get('/hello/myauth', [HelloController::class, 'getauth']);
Route::post('/hello/myauth', [HelloController::class, 'postauth']);


// DB
Route::get('/database/db', [DbController::class, 'index']);
Route::get('/database/db/add', [DbController::class, 'add']);
Route::post('/database/db/add', [DbController::class, 'create']);
Route::get('/database/db/edit', [DbController::class, 'edit']); // Ex. database/db/edit?id=1
Route::post('/database/db/edit', [DbController::class, 'update']);
Route::get('/database/db/delete', [DbController::class, 'delete']); // Ex. database/db/delete?id=1
Route::post('/database/db/delete', [DbController::class, 'remove']);


// DB query
Route::get('/database/query', [QueryController::class, 'index']); // Ex. database/query or database/query?id=1 or database/query?page=0
Route::get('/database/query/bigger', [QueryController::class, 'bigger']); // Ex. database/bigger?id=3
Route::get('/database/query/search_word', [QueryController::class, 'search_word']); // Ex. database/search_word?word=taro
Route::get('/database/query/search_age', [QueryController::class, 'search_age']); // Ex. database/search_age?min=21&max=30
Route::get('/database/query/add', [QueryController::class, 'add']);
Route::post('/database/query/add', [QueryController::class, 'create']);
Route::get('/database/query/edit', [QueryController::class, 'edit']); // Ex. database/query/edit?id=1
Route::post('/database/query/edit', [QueryController::class, 'update']);
Route::get('/database/query/delete', [QueryController::class, 'delete']); // Ex. database/query/delete?id=1
Route::post('/database/query/delete', [QueryController::class, 'remove']);


// ORM and Relation Person
Route::get('/orm/person', [PersonController::class, 'index']);
Route::get('/orm/person/hasmessage', [PersonController::class, 'hasMessage']);
Route::get('/orm/person/find_id', [PersonController::class, 'find_id']);
Route::post('/orm/person/find_id', [PersonController::class, 'search_id']);
Route::get('/orm/person/find_name', [PersonController::class, 'find_name']);
Route::post('/orm/person/find_name', [PersonController::class, 'search_name']);
Route::get('/orm/person/scope_find_name', [PersonController::class, 'scope_find_name']);
Route::post('/orm/person/scope_find_name', [PersonController::class, 'scope_search_name']);
Route::get('/orm/person/scope_find_age', [PersonController::class, 'scope_find_age']);
Route::post('/orm/person/scope_find_age', [PersonController::class, 'scope_search_age']);
Route::get('/orm/person/add', [PersonController::class, 'add']);
Route::post('/orm/person/add', [PersonController::class, 'create']);
Route::get('/orm/person/edit', [PersonController::class, 'edit']); // Ex. orm/person/edit?id=1
Route::post('/orm/person/edit', [PersonController::class, 'update']);
Route::get('/orm/person/del', [PersonController::class, 'delete']); // Ex. orm/person/del?id=1
Route::post('/orm/person/del', [PersonController::class, 'remove']);
// Board
Route::get('/orm/board', [BoardController::class, 'index']);
Route::get('/orm/board/add', [BoardController::class, 'add']);
Route::post('/orm/board/add', [BoardController::class, 'create']);


// REST
Route::resource('/rest', RestdataController::class);
Route::get('/hello/rest', [HelloController::class, 'rest']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
