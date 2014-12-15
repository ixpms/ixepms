<?php
class Assessment  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
	protected $table = 'behavioralmain';

  public function behavioralsub($value='')
   {
   	 return $this->hasMany('BehavioralSub','parent_id','id');
   }

}