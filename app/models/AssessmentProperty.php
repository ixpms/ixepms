<?php
class AssessmentProperty  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
  protected $fillable=['user_id','isPersonal','isPeer'];
	protected $table = 'assessment_property';
/*
  public function behavioralsub($value='')
   {
   	 return $this->hasMany('BehavioralSub','parent_id','id');
   }*/

}