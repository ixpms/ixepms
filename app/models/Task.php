<?php 
class Task  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
	protected $table = 'tasks';
	protected $fillable=array('task_name','task_desc');

	public function scopeBelongsToDepartment($query,$id)
	{
	   if($id == 1){
	   	  return $query;
	   }else if($id == 2 ){
          return $query->whereDep_id(Auth::user()->department_id);
	   }else if($id == 3){
	   	  return $query->whereUser_id(Auth::id());
	   }
	}
	public function subtasks()
	{
		return $this->hasMany('Task','parent_id');
	}


}