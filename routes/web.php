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
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\ReqResController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Namespace_test\NamespaceController;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Middleware\Hello2Middleware;
use App\Http\Middleware\GreetingMiddleware;


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
Route::get('/routing/where/{id}', [RoutingController::class, 'where'])->where('id', '[0-9]+');
Route::middleware([GreetingMiddleware::class])->group(function() {
    Route::get('/routing/hello', [RoutingController::class, 'hello']);
    Route::get('/routing/bye', [RoutingController::class, 'bye']);
});
// it is not efficient in Laravel 8? Because controller was already set by 'use'.
// Route::namespace('Namespace_test')->group(function() {
    Route::get('/namespace', [NamespaceController::class, 'index']);
    Route::get('/namespace/other', [NamespaceController::class, 'other']);
// });
Route::get('/routing/binding_model_route/{person}', [RoutingController::class, 'binding_model_route']);

// Configuration and environment valuable
Route::get('/config', [ConfigController::class, 'index']);
Route::get('/config/other', [ConfigController::class, 'other']);
Route::get('/redirect', [RedirectController::class, 'index'])->name('redirect');
Route::get('/config/env_val', [ConfigController::class, 'env_val']);

// Storage
Route::get('/local_storage', [StorageController::class, 'index'])->name('storage');
Route::get('/local_storage/{msg}', [StorageController::class, 'put']);
Route::get('/disk', [StorageController::class, 'disk_index'])->name('disk_storage');
Route::get('/disk/{msg}', [StorageController::class, 'disk_put']);
Route::get('/backup', [StorageController::class, 'backup']);
Route::get('/download', [StorageController::class, 'download']);
Route::post('/upload', [StorageController::class, 'upload']);
Route::get('/file_path', [StorageController::class, 'file_path']);
Route::get('/logs_path', [StorageController::class, 'logs_path']);

// Request and Response
Route::get('/req_res/response', [ReqResController::class, 'response']);
Route::post('/req_res/response', [ReqResController::class, 'response']);
Route::get('/req_res/req_only', [ReqResController::class, 'req_only']);
Route::post('/req_res/req_only', [ReqResController::class, 'req_only']);
Route::get('/req_res/query', [ReqResController::class, 'query'])->name('query');
Route::post('/req_res/query', [ReqResController::class, 'query']);
Route::get('/req_res/query/add_query', [ReqResController::class, 'add_query']);

// Service and Middleware
Route::get('/service/myservice/{id?}', [ServiceController::class, 'my_service']);
Route::get('/mdware/my_middleware', [ServiceController::class, 'test_mdware'])->middleware(App\Http\Middleware\MyMiddleware::class);
Route::get('/mdware/my_middleware/{id}', [ServiceController::class, 'test_mdware'])->middleware(App\Http\Middleware\MyMiddleware::class);


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
