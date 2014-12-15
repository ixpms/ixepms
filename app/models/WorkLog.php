<?php 
class WorkLog  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
	protected $table = 'worklogs';

	protected $fillable=array('subtask_id','worklog_desc','time_spent');
	
	
}