<?php
class AssessmentAnswers  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
	protected $fillable=['behavioralsub_id','weight','user_id'];
	protected $table = 'assessment_results';

}