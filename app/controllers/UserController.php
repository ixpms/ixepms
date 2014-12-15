<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('user.index')->with('users', User::all())->with('roles',Role::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//dd(Input::all());
		/*$user= User::create(Input::only('username','password','role_id'));
		$user->save();
		Redirect::route('user.index');*/
		$user= new User();
		$user->username= Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->role_id=Input::get('role_id');

		$user->save();
		return URL::to('user');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('user.edit')->with('user', User::find($id));
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user=User::find($id);
		$user->id=Input::get('id');
		$user->password= Hash::make(Input::get('password'));
		$user->role_id=Input::get('role_id');

		$user->save();
		return URL::to('user');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
