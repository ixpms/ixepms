<?php 
class Department  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
	protected $table = 'departments';
	

/*	public function scopeBelongsToDepartment($query,$id)
	{
	   if($id == 1){
	   	  return $query;
	   }else if($id == 2 ){
          return $query->whereDep_id(Auth::user()->department_id);
	   }else if($id == 3){
	   	  return $query->whereUser_id(Auth::id());          
	   }
	}*/


}