<?php 
class SubTask  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
	protected $table = 'subtasks';
	protected $fillable=array('subtask_name','subtask_description','target_date','estimated_duration','actual_duration');
  
	//this subtasks has many comments
	public function comments(){
		return $this->hasMany('Comment', 'subtask_id');
	}
	public function tasks()
	{
		return $this->belongsTo('Task');
	}
  }