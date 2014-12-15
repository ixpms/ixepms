<?php

class UserProfileController extends \BaseController {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$user = UserProfile::where('id', '=', Input::get()->('id') -> get());
		//$user = UserProfile::where('id', '=', Input::get('id') -> get());
		//$user_id= Auth::id();
		//$user = UserProfile::find(Auth::user()->id);
		//var_dump($user);
		return View::make('UserProfile.index')->with('userprofile',  UserProfile::find(Auth::user()->id));
		//return View::make('UserProfiles.index', ['UserProfiles' => $user]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$UserProfile = Input::all();

		UserProfile::create($UserProfile);
			return Redirect::route('UserProfile.index') 
			-> withInput() 
			-> with('message', 'Successfully Created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$UserProfile = UserProfile::find($id);

		//return View::make('behavioralsub.show') ->with('behavioralsub', $behavioralsub);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		return View::make('userprofile.edit')->with('userprofile', UserProfile::find($id));

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//$UserProfile = Input::all();


		$userprofile=UserProfile::find(Input::get('id'));
		$userprofile->firstname= Input::get('firstname');
		$userprofile->lastname= Input::get('lastname');
		$userprofile->middlename= Input::get('middlename');
		$userprofile->gender= Input::get('gender');
		$userprofile->age= Input::get('age');
		$userprofile->birthdate= Input::get('birthdate');
		$userprofile->address= Input::get('address');
		$userprofile->contact_number= Input::get('contact_number');
		$userprofile->designation= Input::get('designation');

		$userprofile->save();
		

		//return Redirect::route('UserProfile.index');
		return URL::to('UserProfile');
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
