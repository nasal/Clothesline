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

Route::any('/', function() {
	return View::make('home');
});

Route::get('login', function() {
    return View::make('user.login');
});

Route::post('login', function() {
    if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
    {
        return Redirect::intended('likes');
    }
});

Route::get('signup', function() {
   return View::make('user.signup');
});

Route::post('signup', array('before' => 'csrf', function() {
    $user = new User;
    $user->username = Input::get('username');
    $user->password = Hash::make(Input::get('password'));
    //$user->created_on = time();
    $user->save();
    return Redirect::to('login');
}));

Route::get('likes', function() {
    return View::make('user.likes');
});

Route::get('directory', function() {
    return View::make('browse.list');
});

Route::get('favorites/{letter?}', function($letter = 'a') {
    return View::make('user.favorites')->with('letter', $letter);
});

Route::get('about', function() {
    return View::make('about');
});

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/')->with('message', 'Successfully logged out!');
});

Route::get('similar/{article?}', function($article = 'jeans') {
    return View::make('browse.similar')->with('article', $article);
});