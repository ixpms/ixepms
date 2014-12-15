@extends('layouts.master')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
    
    <div class="panel-heading">                                
        <h3 class="panel-title">
            Edit User Information
        </h3>
    </div>

    <!-- START EDIT USER FORM  -->
        <form class="form-horizontal" role="form" action="#" onsubmit="return false;">    
          <ul>
            </ul>                                
           <div class="form-group">
                <input style="display:none" name="id" value='{{{$user->id}}}'></input>
                <input style="display:none"name ='username' value='{{{$user->username}}}' ></input>

            </div>
            
             <div class="form-group">
                <label class="col-md-2 control-label">New Password</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="new_password" placeholder="Password" value=""/>
                </div>
             </div>
             <div class="form-group">
                <label class="col-md-2 control-label">Confirm Password</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="confirm_password" placeholder="Password" value=""/>
                </div>
             </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Role</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="role_id" placeholder="ID ROLE" value="{{{$user->role_id}}}"/>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-info pull-right" id="btn-updateuser">Update</button>
                </div>   
                <div class="col-md-2">
                    {{ link_to(URL::previous(), 'Cancel', ['type'=>'close','class' => 'btn btn-danger pull-right', 'id'=>'btn-cancel']) }}
                </div> 
            
            </div>
                              
        </form>
    <!-- END CREATE SUBTASK FORM  -->
    </div>
</div>

@stop

@section('script')
<script type="text/javascript">
  
 $('#btn-updateuser').click(function (argument) {
     // body...()
      $.ajax({
        url:"{{{route('user.update')}}}",
        method:'put',
        data:{
           id:$('input[name=id]').val(),
           username: $('input[name=username]').val(),
           password: $('input[name=password]').val(),
           role_id: $('input[name=role_id]').val()
        },
        success:function(data){
            console.log(data);
            window.location=data;
        }
      });
 });
/*
 $('#btn-cancel').click(function (argument) {
     // body...()
      $.ajax({
        url:"{{{route('user.index')}}}",    
        success:function(data){
            console.log(data);
            window.location=data;
        }
      });
 });
*/

</script>
@stop