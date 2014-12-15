<?php

class SubTaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($parent_id)
	{
		dd($parent_id);
		// /return URL::to('subtask/'.$parent_id);
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
		
		$subtask= SubTask:: create(Input::only('parent_id','subtask_name','subtask_description','target_date'));
		$subtask->parent_id= Input::get('parent_id');
		
		$subtask->save();
		return Redirect::to('subtask/'.$subtask->parent_id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		//var_dump($subtask);
		//return View::make('subtask.viewDetails')->with('subtask',$subtask);
		$subtask=SubTask::whereParent_id($id)->get();
/*
		for ($i=0; $i < count($subtask); $i++) { 
			 $subtask_id=  $subtask->id->get();
			 print_r($subtask_id);

		}
*/
		

		return View::make('subtask.index')->with('subtasks',SubTask::whereParent_id($id)->get())->with('task',Task::find($id));
		 
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		/*dd($id);
		#*/
		return View::make('subtask.edit')->with('subtasks', SubTask::whereId($id)->get());
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		$subtask=SubTask::find(Input::get('id'));
		$subtask->parent_id= Input::get('parent_id');
		$subtask->subtask_name = Input::get('subtask_name');
		$subtask->subtask_description=Input::get('subtask_description');
		$subtask->target_date=Input::get('target_date');
		$subtask->started_date=Input::get('started_date');
		$subtask->estimated_duration=Input::get('estimated_duration');
		$subtask->actual_duration=Input::get('actual_duration');
		$subtask->status=Input::get('status');


		$subtask->save();

		//subtask=Task::update(Input::only('subtask_name','subtask_description','target_date')->with('subtask',Subtask::find($id)));
		

		return URL::to('subtask/'.$subtask->parent_id);

		/*dd($id);*/
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
	public function getStart($id)
	{
		//print_r($id);
		return View::make('subtask.start')->with('subtasks', SubTask::whereId($id)->get());
	}
	public function getViewSubtaskDetails($id)
	{

		$subtask = Subtask::with('comments')->find($id);
		//var_dump($subtask->comments->count());	
		return View::make('subtask.viewDetails')->with('subtask',$subtask);
		//print_r($id
		//return View::make('subtask.viewDetails')->with('subtasks')->with('comments', Comment::whereSubtask_id($id)->get())->with('worklogs', WorkLog::whereSubtask_id($id)->get());
	}


}
