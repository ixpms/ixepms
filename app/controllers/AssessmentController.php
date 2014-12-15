<?php

class AssessmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
   	return (User::find(Auth::id())->assess_activated == 1)?View::make('assessment.index')->with('users',User::all())->with('assessments',Assessment::all()):View::make('info.error');
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
		//
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
	public function saveAnswer()
	{
     $input=Input::all();
     $user_id =  (int)$input['user_id'];
     foreach ($input as $key => $value) {
          AssessmentAnswers::create(['behavioralsub_id' => $key ,'weight' =>  $value ,'user_id' =>$user_id ]);
     }

     $record=AssessmentProperty::whereUser_id(Auth::id())->first();


     if( $record != NULL){
     	  if ($user_id != Auth::id()) {
     	  	 $record->isPeer = $record->isPeer+1;
     	  }else{
     	  	$record->isPersonal = 1;
     	  }

     	  // $record->user_id  = $user_id;

     	   if ($record->isPeer > 3){
     	   	   $user= User::find(Auth::id());
     	   	   $user->assess_activated=0;
     	   	   $user->save();
     	   }

     	   $record->save();

     }else{
      	$property=[];
        $property['user_id'] = Auth::id();
        $property['isPersonal'] = ( Auth::id() == (int)$input['user_id'] ) ? 1 : 0 ;
        if (Auth::id() !=  (int)$input['user_id']) {
        	 $property['isPeer']=1;
        }
         AssessmentProperty::create($property);
     }

  return Redirect::back();

	}


}
