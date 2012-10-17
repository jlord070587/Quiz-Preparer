<?php

// Login
Route::get('/', array('as' => 'login', 'uses' => 'home@index'));
Route::get('login', 'home@index');
Route::get('logout', 'home@logout');
Route::post('authentication', 'authentication@create');


// Quiz Resource
Route::get('quizzes', array('as' => 'quizzes', 'uses' => 'quizzes@index'));
Route::get('quizzes/(:any)', array('as' => 'quiz', 'uses' => 'questions@index'));
Route::get('quizzes/new', array('as' => 'new_quiz', 'uses' => 'quizzes@new'));
Route::get('quizzes/(:any)edit', array('as' => 'edit_quiz', 'uses' => 'quizzes@edit'));
Route::post('quizzes', 'quizzes@create');

Route::put('quizzes/(:any)', 'quizzes@update');
Route::get('quizzes/(:any)/addScore', 'quizzes@update');

Route::delete('quizzes/(:any)', 'quizzes@destroy');

Route::get('quizzes/(:any)/questions.json', 'questions@json');

Route::get('quizzes/(:any)/questions', array('as' => 'questions', 'uses' => 'questions@index'));
Route::get('quizzes/(:any)/questions/(:num)', array('as' => 'question', 'uses' => 'questions@show'));
Route::post('quizzes/(:any)/questions', 'questions@create');
Route::put('quizzes/(:any)/questions/(:num)', 'questions@update');
Route::delete('quizzes/(:any)/questions/(:num)', 'questions@destroy');

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});