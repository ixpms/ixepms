<?php 
class Comment  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
	protected $table = 'comments';

	protected $fillable=array('subtask_id','comment_desc');

	//These comments belong to one subtask
	public function subtask(){
		return $this->belongsTo('SubTask');
	}
	
	
}