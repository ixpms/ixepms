<?php

class CommentController extends \BaseController {

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

		$comment = Comment:: create(Input::only('subtask_id','comment_desc'));
		$comment->subtask_id = Input::get('subtask_id');
		$comment->save();
		//return URL::to('subtask/viewSubtaskDetails',$comment->subtask_id);
		return Redirect::to('subtask/viewSubtaskDetails/'.$comment->subtask_id);
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
		return View ::make('comment.edit')->with('comments', Comment::whereId($id)->get());
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$comment=Comment::find(Input::get('id'));
		$comment->subtask_id= Input::get('subtask_id');
		$comment->comment_desc = Input::get('comment_desc');

		$comment->save();

		return URL::to('subtask/viewSubtaskDetails/'.$comment->subtask_id);

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,$subtask_id)
	{	
				
			dd($subtask_id);
			$comment= Comment::find($id);
			//print_r($comment);
			//$comment->delete();
			
			//return URL::to('subtask/viewSubtaskDetails/'.$comment->subtask_id);

	}

	public function getCreateComment($id)
	{
		//dd($id);
		return View::make('comment.createComment')->with('comments', Comment::whereSubtask_id($id)->get());
	}

}
