@extends('layouts.master')
@section('content')
<div class="panel panel-default">
<div class="panel-body">

<div class="panel-heading">                                    
    <h3 class="panel-title">
        Create Another User
    </h3>
</div>
    <!-- START CREATE USER FORM  -->
    <form class="form-horizontal" role="form" action="{{{route('user.store')}}}" method="post">                                    
       
        <div class="form-group">
            <label class="col-md-2 control-label">Username</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="username" placeholder="Username"/>
            </div>
        </div>                                                                
        <div class="form-group">
            <label class="col-md-2 control-label">Password</label>
            <div class="col-md-10">
                <input class="form-control" rows="5" name="password" placeholder="Password"></input>
            </div>
        </div> 
        <div class="form-group">
            <label class="col-md-2 control-label">Role</label>
    		<div class="col-md-10 form-group" rows="5">
    		    <select class="form-control">
    		    	@foreach($roles as $role)
    		        <option name="role_id" class="" value="{{{$role->role_id}}}"><span>{{{$role->role_desc}}}</span></option>
    		        @endforeach
    		    </select>
    		</div>
        </div> 
        <div class="form-group">
            <div class="col-md-5">
                <button type="submit" class="btn btn-info pull-right">Authorize</button>                       
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
@stop