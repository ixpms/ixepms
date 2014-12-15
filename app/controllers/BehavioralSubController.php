<?php

class BehavioralSubController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		
		
		return View::make('behavioralsub.index')->with('behavioralsubs',BehavioralSub::get())->with('behavioralmains',BehavioralMain::get());
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('behavioralsub.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$behavioralsub= new BehavioralSub();	
		$behavioralsub->survey_question= Input::get('survey_question');
		$behavioralsub->weight = Input::get('weight');	
		$behavioralsub->save();
		return View::make('behavioralsub.index')->with('behavioralsubs',BehavioralSub::get())->with('behavioralmains',BehavioralMain::get());
			

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('behavioralsub.show')->with('behavioralsubs', BehavioralSub::whereId($id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('behavioralsub.edit')->with('behavioralsub', BehavioralSub::find($id));
		 

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$behavioralsub=BehavioralSub::find(Input::get('id'));
		$behavioralsub->survey_question= Input::get('survey_question');
		$behavioralsub->weight = Input::get('weight');

		$behavioralsub->save();

		return URL::to('behavioralsub');
    }

		/*dd($id);*/

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		/*dd($id);*/
		BehavioralSub::find($id)->delete();

		return View::make('behavioralsub.index')->with('behavioralsubs',BehavioralSub::get())->with('behavioralmains',BehavioralMain::get());

	}


}
