<?php 
class BehavioralSub  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
	protected $table = 'behavioralsub';

	protected $fillable=array('id','survey_question','weight');
	
	
}