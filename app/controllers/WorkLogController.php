<?php

class WorkLogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		$worklog = Worklog:: create(Input::only('subtask_id','worklog_desc','time_spent'));
		$worklog->subtask_id = Input::get('subtask_id');
		$worklog->save();
		
		//->with('tasks',Task::belongsToDepartment($id)->get())
 		/*Update status, actual duration */
		$subtask=SubTask::find(Input::get('subtask_id'));
		$subtask->actual_duration= Input::get('actual_duration');
		$subtask->status= Input::get('status');
		$subtask->save();

		//return URL::to('subtask/viewSubtaskDetails',$worklog->subtask_id);
		return URL::to('subtask/viewSubtaskDetails/'.$worklog->subtask_id);
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
