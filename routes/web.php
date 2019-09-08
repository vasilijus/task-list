<?php

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

use App\Todo;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks'        , 'TodoController@index');
Route::get('/tasks/active/{page?}', function($page = 1) {
    $todo = new Todo();

    $result = $todo
                ->where('status', '=', 'ACTIVE')
                ->forPage($page, 10)
                ->get();

    // return $result;
    return view('tasks/active', ['todos' => $result, 'page' => $page]);
});
Route::get('/tasks/done/{page?}', function($page = 1) {
    $todo = new Todo();

    $result = $todo
                ->where('status', '=', 'DONE')
                ->forPage($page, 10)
                ->get();

    // return $result;
    return view('tasks/done', ['todos' => $result, 'page' => $page]);
});

Route::get('/tasks/deleted/{page?}', function($page = 1) {
    $todo = new Todo();

    $result = $todo
                ->where('status', '=', 'DELETED')
                ->forPage($page, 10)
                ->get();

    // return $result;
    return view('tasks/deleted', ['todos' => $result, 'page' => $page]);
});

Route::post('/tasks/create' , 'TodoController@store');

Route::get('/task/{id}', 'TodoController@show');
Route::put('/task/{id}', 'TodoController@update');
Route::delete('/task/{id}', 'TodoController@destroy');
