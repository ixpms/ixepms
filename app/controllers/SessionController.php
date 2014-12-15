<?php
class SessionController extends BaseController {

	function __construct() {

	}
	public function viewlogin($value='')
	{
		if (Auth::check()) {
			return Redirect::route('home');
		}
		return View::make('session.login');
	}
	public function login($value='')
	{
		 $creds=Input::only('username','password');
		 if(Auth::attempt($creds)){
	     return Redirect::route('home');
		 }
		 return Redirect::back()->with(['message'=>'Oops! Your username and password are invalid']);

		  // $creds['password']=Hash::make($creds['password']);
		  // User::create( $creds);
	}
}