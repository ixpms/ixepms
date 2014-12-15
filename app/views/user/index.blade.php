@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">

	    <!-- START DEFAULT DATATABLE -->
	    <div class="panel panel-default">
	        <div class="panel-heading">                                
	            <h3 class="panel-title">User List</h3>
	            <ul class="panel-controls">
	                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
	                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
	                <!-- <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li> -->
	            </ul> 
	        </div>
	        <div class="panel-body">

	            <table class="table datatable">

	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Username</th>
	                        <th>Role</th>
	                        <th>Employee Name</th>
	                        <th>Gender</th>
	                        <th>Age</th>
	                        <th>Birth Date</th>
	                        <th>Address</th>
	                        <th>Designation</th>
	                        <th>Contact Number</th>
	                        <th>Department Name</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach($users as $user)
	                    <tr>
	                        <td>{{{$user->id}}}</td>
	                        <td>{{{$user->username}}}</td>
	                        <td>{{{$user->role_id}}}</td>
	                        <td>{{{$user->firstname}}} {{{$user->middlename}}} {{{$user->lastname}}}</td>
	                        <td>{{{$user->gender}}}</td>
	                        <td>{{{$user->age}}}</td>
	                        <td>{{{$user->birthdate}}}</td>
	                        <td>{{{$user->address}}}</td>
	                        <td>{{{$user->designation}}}</td>
	                        <td>{{{$user->contact_number}}}</td>
	                        <td>{{{$user->department_id}}}</td>
	                        <td>
                        		<a href="{{{route('user.edit',$user->id)}}}"><i class="fa fa-edit"></i></a>
<!--             					<button class="btn btn-info" data-toggle="modal" data-target="#modal_edit_user">Edit</button> -->

                       		</td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
            		<button class="btn btn-info" data-toggle="modal" data-target="#modal_create_user">Create</button>
	        </div>

	    </div>
	    <!-- END DEFAULT DATATABLE -->
	</div>
</div>
<!-- START MODAL FOR USER SUBTASK-->
<div class="modal" id="modal_create_user" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Create User</h4>
            </div>
            <div class="modal-body">
            <!-- START CREATE USER FORM  -->
                <form class="form-horizontal" role="form" action="#" onsubmit="return false;">                                     
                   
                    <div class="form-group">
                        <label class="col-md-2 control-label">Username</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="username" placeholder="Username"/>
                        </div>
                    </div>                                                                
                    <div class="form-group">
                        <label class="col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" rows="5" name="password" placeholder="Password"></input>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-md-2 control-label">Role</label>
						<div class="col-md-10">
						    <!-- <select class="form-control">
						    	@foreach($roles as $role)
						        <option name="role_id{{{$role->role_id}}}" class="" value="{{{$role->role_id}}}"><span>{{{$role->role_desc}}}</span></option>
						        @endforeach
						    </select> -->
                            <input class="form-control" rows="5" name="role_id" placeholder=""></input>

						</div>
                    </div> 
                    <div class="form-group">
                        <div class="col-md-5">
                            <button type="submit"id="btn-submituser" class="btn btn-info pull-right">Authorize</button>                       
                        </div>   
                        <div class="col-md-2">
                            <button type="close" data-dismiss="modal" class="btn btn-danger pull-right">Cancel</button>
                        </div>                     
                    </div>
                                      
                </form>
            <!-- END CREATE USER FORM  -->
            </div>
        </div>
    </div>
</div>
<!-- END MODAL FOR CREATE USER-->

<!-- START MODAL FOR EDIT USER-->
<!-- <div class="modal" id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Edit User Information</h4>
            </div>
            <div class="modal-body"> -->
            <!-- START EDIT USER FORM  -->
                <!-- <form class="form-horizontal" role="form" action="#" onsubmit="return false;">                                     
               	<div class="form-group">
		            <input style="display:none" name="id" value='{{{$user->id}}}'></input>
		            <input style="display:none"name ='new_username' value='{{{$user->usename}}}' ></input>
		        </div>                                                                                    
                   <div class="form-group">
			            <label class="col-md-2 control-label">New Password</label>
			            <div class="col-md-10">
			                <input type="password" class="form-control" name="new_password" placeholder="Password" value=""/>
			            </div>
			         </div>
			         <div class="form-group">
			            <label class="col-md-2 control-label">Confirm Password</label>
			            <div class="col-md-10">
			                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" value=""/>
			            </div>
			         </div>
			        <div class="form-group">
			            <label class="col-md-2 control-label">Role</label>
			            <div class="col-md-10">
			                <input type="text" class="form-control" name="new_role_id" placeholder="Role ID" value="{{{$user->role_id}}}"/>
			            </div>
			        </div>
                    <div class="form-group">
                        <div class="col-md-5">
                            <button type="submit"id="btn-updateuser" class="btn btn-info pull-right">Update</button>                       
                        </div>   
                        <div class="col-md-2">
                            <button type="close" data-dismiss="modal" class="btn btn-danger pull-right">Cancel</button>
                        </div>                     
                    </div>
                                      
                </form> -->
            <!-- END EDIT USER FORM  -->
       <!--      </div>
        </div>
    </div>
</div> -->
<!-- END MODAL FOR EDIT SUBTASK-->


@stop

@section('script')
<script type="text/javascript">
  
 $('#btn-submituser').click(function (argument) {
     // body...
      $.ajax({
        url:"{{{route('user.store')}}}",
        method:'post',
        data:{
           username: $('input[name=username]').val(),
           password: $('input[name=password]').val(),
           role_id: $('input[name=role_id]').val()
        },
        success:function(data){
            window.location=data;
        }
      });
 });
/*
$('#btn-updateuser').click(function (argument) {
	
      $.ajax({
        url:"{{{route('user.update')}}}",
        method:'put',
        data:{
           id: $('input[name=id]').val(),
           username: $('input[name=new_username]').val(),
           password: $('input[name=new_password]').val(),
           role_id: $('input[name=new_role_id]').val()
        },
        success:function(data){
            console.log(data);
            window.location=data;
        }
      });
 });*/

</script>
@stop