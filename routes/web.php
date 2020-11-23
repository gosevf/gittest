<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

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

Route::get('/user', 'UserController@index');

Route::post('/upload', 'UserController@uploadAvatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/stories/{story_id}', 'StoryController@show')->name('stories');

// Route::get('/todos','TodoController@index')->name('todo.index');

// Route::get('/todos/create','TodoController@create');

// Route::get('/todos/{todo}/edit','TodoController@edit');

// Route::post('/todos/create', 'TodoController@store');

// Route::patch('/todos/{todo}/update', 'TodoController@update')->name('todo.update');

// Route::get('/todos/{todo}/delete', 'TodoController@delete')->name('todo.delete');


//Route::middleware('auth')->group(Function(){

    Route::resource('/todo', 'TodoController');
   
    Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');

    Route::delete('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');

    
//});
