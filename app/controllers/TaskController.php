<?php

class TaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Input::all();
		//return View::make('task.index')->with('tasks',Task::all());
	}

    public function getDash($id=0)
    {
		return View::make('task.index')->with('dash_id',$id)->with('users',User::all())->with('tasks',Task::belongsToDepartment($id)->get());//->with('users',User::whereRole_id($id)->get());//->with('departments' ,Department::whereId($id)->get());
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
		print_r(Input::all());
		$task= Task::create(Input::only('task_name','task_desc'));
		return Redirect::route('task.index');
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
		print_r(Input::all());


		//$task=Task::update(Input::only('task_name','task_desc')->with('task',Task::find($id));
		//return Redirect::route('task.index');
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
	public function getGeneralDash()
	{
		return View::make('task.index');

	}
	public function setUser($value='')
	{
		   $input=Input::only('task_id','user_id');
		   $task= Task::find($input['task_id']);
       $task->user_id=(int)$input['user_id'];
       $task->save();
       return Response::make(['success'=>'ok'],200);
 	}


}
