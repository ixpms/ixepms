@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- START SIMPLE DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">
                    
                     
                        {{{$task->id}}}
                        @if(Auth::id()==$task->user_id)
                        <a href="{{{route('subtask.show',$task->id)}}}">{{{$task->task_name}}}</a>
                        @else
                        {{{$task->task_name}}}
                        @endif
                   
                 </h3>
                <div class="col-md-6">
        	        <div class="progress">
        		        <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45% Complete</div>
        		    </div>  
        	    </div>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>                                
            </div>
                <div class="panel-body">
                    <table class="table datatable_simple">
                        <thead>
                            <tr>
                                <th>KRAID</th>
                                <th>Task Name</th>
                                <th>Task Description</th>
                                <th>Status</th>
                                <th>Duration</th>
                                <th>Started Date</th>
                                <th>Target Date</th>
                                <!-- <th id='moveddate_head' style='display:none'>Moved Date</th> -->
                                
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($subtasks as $subtask)
                            <tr>
                                <td>{{{$subtask->id}}}</td>
                                <td>{{{$subtask->subtask_name}}}</td>
                                <td>{{{$subtask->subtask_description}}}</td>
                                <td>
                                    <div class="progress progress-small">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{{$subtask->status}}}" aria-valuemin="0" aria-valuemax="100" style="width:{{{$subtask->status}}}%;"></div>
                                    </div>
                                    <span>{{{$subtask->status}}}%</span>
                                </td>
                                <td>{{{$subtask->actual_duration}}}</td>
                                <td>{{{$subtask->started_date}}}</td>
                                <td>{{{$subtask->target_date}}}</td>
                                <!-- @if($subtask->move_date =='')
                                
                                $('#moveddate_head').style.display="none";
                                
                                @else
                                $('#moveddate_head').style.display="block";
                                    <td>{{{$subtask->moved_date}}}</td>    
                                @endif -->
                                
                                <td>
                                    <a href="{{{route('subtask.edit',$subtask->id)}}}"><i class="fa fa-edit"></i></a>                        
                                </td>
                                <td>
                                    @if($subtask->started_date=="0000-00-00 00:00:00")
                                        <a href="{{{URL::to('subtask/start',$subtask->id)}}}" >Start</a>
                                    @endif
                                </td>
                                
                                <td>
                                    <a href="{{{URL::to('subtask/viewSubtaskDetails',$subtask->id)}}}">View Details</a>
                                </td>
                            </tr>
                          @endforeach
                                
                        </tbody>
                    </table>
                 
                    <div class="panel-body">
                        <button class="btn btn-info" data-toggle="modal" data-target="#modal_create_subtask">Add Subtask</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SIMPLE DATATABLE -->
<!-- START MODAL FOR CREATE SUBTASK-->
<div class="modal" id="modal_create_subtask" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Create Subtask</h4>
            </div>
            <div class="modal-body">
            <!-- START CREATE SUBTASK FORM  -->
                <form class="form-horizontal" role="form" action="{{{route('subtask.store')}}}" method="post">                                    
                   <div class="form-group">
                        <input style="display:none" name="parent_id" value='{{{$task->id}}}'></input>
                </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Task Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="subtask_name" placeholder="Subtask Name"/>
                        </div>
                    </div>                                                                
                    <div class="form-group">
                        <label class="col-md-2 control-label">Task Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" name="subtask_description" placeholder=" Subtask Description"></textarea>
                        </div>
                    </div> 
                     <div class="form-group">
                        <label class="col-md-2 control-label">Target Date</label>
                        <div class="col-md-10">

                            <div class="input-group">
                                    <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                                    <input type="text" name="target_date" class="form-control datepicker"  value=""/> <!-- class="form-control datepicker" -->                                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">
                            <button type="submit" id="btn-create" class="btn btn-info pull-right">Create</button>                       
                        </div>   
                        <div class="col-md-2">
                            <button type="close" data-dismiss="modal" class="btn btn-danger pull-right">Cancel</button>
                        </div> 
                        
                    </div>
                                      
                </form>
            <!-- END CREATE SUBTASK FORM  -->
            </div>
        </div>
    </div>
</div>
<!-- END MODAL FOR CREATE SUBTASK-->

@stop
@section('script')
<script type="text/javascript">
  
 $('#btn-submit').click(function (argument) {
     
     // body...
      $.ajax({
        url:"{{{route('subtask.update')}}}",
        method:'put',
        data:{
           id:$('input[name=id]').val(),
           parent_id: $('input[name=parent_id]').val(),
           subtask_name: $('input[name=subtask_name]').val(),
           subtask_description:$('input[name=subtask_description]').val(),
           target_date:$('input[name=target_date]').val(),
           started_date:$('input[name=started_date]').val(),
           estimated_duration:$('input[name=estimated_duration]').val()


        },
        success:function(data){
            window.location=data;
        }
      });
 });
/* $('#btn-create').click(function  (argument) {
     // body...
     $.ajax({
        url:"{{{route('subtask.store')}}}",
        method:'post',
        data:{
            id:$('input[name=id]').val(),
           parent_id: $('input[name=parent_id]').val(),
           subtask_name: $('input[name=subtask_name]').val(),
           subtask_description:$('input[name=subtask_description]').val(),
           target_date:$('input[name=target_date]').val(),
           started_date:$('input[name=started_date]').val(),
           estimated_duration:$('input[name=estimated_duration]').val()
        success:function(data){
                    console.log(data);
                   window.location=data;
                }
              });
        }
     });
 });*/
 $('#btn-confirm').click(function (argument) {
     alert(1);
      $.ajax({
        url:"{{{route('subtask.update')}}}",
        method:'put',
        data:{
           id:$('input[name=id]').val(),
           parent_id: $('input[name=parent_id]').val(),
           started_date:$('input[name=started_date]').val(),
           estimated_duration:$('input[name=estimated_duration]').val()

        },
        success:function(data){
            window.location=data;
        }
      });
 });
</script>
@stop