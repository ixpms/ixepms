@extends('layouts.master')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
    @foreach($subtasks as $subtask)
    <div class="panel-heading">                                
        <h3 class="panel-title">
            {{{$subtask->subtask_name}}}
        </h3>
    </div>

    <!-- START EDIT SUBTASK FORM  -->
        <form class="form-horizontal" role="form" action="#" onsubmit="return false;">                                    
           <div class="form-group">
                <input style="display:none" name="parent_id" value='{{{$subtask->parent_id}}}'></input>
                <input style="display:none" name="id" value='{{{$subtask->id}}}'></input>
                <input style="display:none" name="started_date" value='{{{$subtask->started_date}}}'></input>
                <input style="display:none" name="estimated_duration" value='{{{$subtask->estimated_duration}}}'></input>


            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Task Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="subtask_name" placeholder="Subtask Name" value="{{{$subtask->subtask_name}}}"/>
                </div>
            </div>                                                                
            <div class="form-group">
                <label class="col-md-2 control-label">Task Description</label>
                <div class="col-md-10">
                    <input class="form-control" rows="5" name="subtask_description" placeholder=" Subtask Description" value="{{{$subtask->subtask_description}}}"/>
                </div>
            </div> 
             <div class="form-group">
                <label class="col-md-2 control-label">Target Date</label>
                <div class="col-md-10">
                <div class="input-group">
                        <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                        @if($subtask->started_date=="0000-00-00 00:00:00")
                        <input type="text" name="target_date" class="form-control datepicker" value="{{{$subtask->target_date}}}"/>                                                
                        @else
                        <input type="text" name="target_date" disabled='disabled' class="form-control datepicker" value="{{{$subtask->target_date}}}"/>
                        @endif

                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10">
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-info pull-right" id="btn-submit">Update</button>                       
                    </div>   
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-danger pull-right" id="btn-cancel">Cancel</button>                       

                        <!-- {{ link_to(URL::previous(), 'Cancel', ['type'=>'close','class' => 'btn btn-danger pull-right', 'id'=>'btn-cancel']) }} -->
                    </div>
                    
                </div>
                
            </div>
                              
        </form>
    <!-- END CREATE SUBTASK FORM  -->
    </div>
</div>

@endforeach


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

 $('#btn-cancel').click(function  (argument) {
     // body.../*
   alert($('input[name=parent_id]').val());
   $.ajax(
    url:"{{{route('subtask.index')}}}",
    method:'get',
    data:{
        id:$('input[name=parent_id]').val()
    },
    success:function  (data) {       
            window.location=data;
    }
   });
 });
</script>
@stop