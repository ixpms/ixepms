<?php 
class UserProfile  extends Eloquent   {

	 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps=false;
	protected $table = 'users';
	protected $fillable=array('id','firstname','lastname', 'middlename', 'gender', 'age', 'birthdate', 'address', 'contact_number', 'designation');



}