<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/',array('as'=>'index',function(){
	return View::make('index');
}));

Route::resource('degree','DegreeController');
Route::resource('university','UniversityController');
Route::resource('subject','SubjectController');
Route::resource('book','BookController');

Route::get('university/attachDegree/{id}',array('as'=>'university.attachDegree','uses'=>'UniversityController@attachDegree'));
Route::post('university/attachDegree/{id}',array('as'=>'university.attachDegreeProcess','uses'=>'UniversityController@attachDegreeProcess'));
Route::get('subject/attachUniversity/{id}',array('as'=>'subject.attachUniversity','uses'=>'SubjectController@attachUniversity'));
Route::post('subject/attachUniversity/{id}',array('as'=>'subject.attachUniversityProcess','uses'=>'SubjectController@attachUniversityProcess'));
Route::get('book/attachUniversity/{id}',array('as'=>'book.attachUniversity','uses'=>'BookController@attachUniversity'));
Route::post('book/attachUniversity/{id}',array('as'=>'book.attachUniversityProcess','uses'=>'BookController@attachUniversityProcess'));

Route::get('/find',array('as'=>'find.university','uses'=>'FindController@selectUniversity'));
Route::get('/find/{university}',array('as'=>'find.degree','uses'=>'FindController@selectDegree'));
Route::get('/find/{university}/{degree}',array('as'=>'find.semester','uses'=>'FindController@selectSemester'));
Route::get('/find/{university}/{degree}/{semester}',array('as'=>'getBooks','uses'=>'FindController@getBooks'));
Route::get('/find/{university}/{degree}/{semester}/{book}',array('as'=>'bookInfo','uses'=>'FindController@bookInfo'));

Route::get('login', array('as' => 'login','uses'=>'UserController@login' ))->before('guest');

Route::post('login','UserController@authenticate' );
Route::get('logout', array('as' => 'logout','uses'=>'UserController@logout'))->before('auth');
Route::get('profile', array('as' => 'profile', 'uses'=>'UserController@show'))->before('auth');
Route::get('register',array('as'=>'register','uses'=>'UserController@create'))->before('guest');
Route::post('register','UserController@store');
Route::get('editProfile',array('as'=>'editProfile','uses'=>'UserController@edit'))->before('auth');
Route::put('editProfile','UserController@update');

Route::get('cart/{id}',array('as'=>'cart.create','uses'=>'CartController@create'))->before('auth');
Route::get('cart',array('as'=>'cart','uses'=>'CartController@index'))->before('auth');
Route::get('cart.multiple',array('as'=>'cart.getBooks','uses'=>'CartController@getBooks'))->before('auth');
Route::delete('cart/{id}',array('as'=>'cart.delete','uses'=>'CartController@destroy'));

Route::get('book.voteup/{id}',array('as'=>'book.voteup','uses'=>'BookController@voteup'))->before('auth');
Route::get('book.votedown/{id}',array('as'=>'book.votedown','uses'=>'BookController@votedown'))->before('auth');

?>