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
Route::get('/',['as'=> 'viewlogin','uses' => 'SessionController@viewlogin']);
Route::get('login',['as'=> 'viewlogin','uses' => 'SessionController@viewlogin']);
Route::post('login',['as'=> 'login','uses' => 'SessionController@login']);
Route::get('logout',['as'=>'logout','do'=>function(){
	Auth::logout();
	return Redirect::route('viewlogin');
}]);


Route::group(['before' => 'auth'],function(){
	  Route::get('home',['as'=> 'home','uses' => 'HomeController@index']);
	  Route::controller('task','TaskController');
	  Route::get('subtask/start/{id}','SubTaskController@getStart');
	  Route::get('subtask/viewSubtaskDetails/{id}','SubTaskController@getViewSubtaskDetails');
	  Route::get('comment/createComment/{id}','CommentController@getCreateComment');
	  Route::post('setUser','TaskController@setUser');
	  Route::post('saveAnswer','AssessmentController@saveAnswer');
	  Route::resource('task','TaskController');
	  Route::resource('subtask','SubTaskController');
	  Route::resource('user','UserController');
	  Route::resource('behavioralmain','BehavioralMainController');
	  Route::resource('behavioralsub','BehavioralSubController');
	  Route::resource('UserProfile','UserProfileController');
	  Route::resource('comment','CommentController');
	  Route::resource('worklog','WorklogController');
	  Route::resource('assessment', 'AssessmentController');
 });

// ;
// Route::get('users', function()
// 	{
// 		return View::make('users');
// 	});

//Route::get('generalDash','TaskController@generalDash');
//Route::controller("generalDash","HomeController");


?>