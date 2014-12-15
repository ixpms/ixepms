@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
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
                <input style="display:none" name="subtask_name" value='{{{$subtask->subtask_name}}}'> </input>
                <input style="display:none" name="subtask_description" value='{{{$subtask->subtask_description}}}'> </input>
                <input style="display:none" name="target_date" value='{{{$subtask->target_date}}}'> </input>
                <input style="display:none" name="actual_duration" value="{{{$subtask->actual_duration}}}"></input>
            </div>
           <div class="form-group">
                <label class="col-md-2 control-label">Start Date</label>
                <div class="col-md-10">
                    <div class="input-group">
                            <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                            <input type="text" name="started_date" id="start_date" class="form-control datepicker"  onload="javascript:subtask.getStartedDate()"  value=""/> <!--  disabled="disabled" -->                                                
                    </div>
                </div>
            </div>                                                              
            <div class="form-group">
                        <label class="col-md-2 control-label">Estimated Duration</label>
                        <div class="col-md-10">
                            <input class="form-control" rows="5" name="estimated_duration" placeholder="Estimated Duration "></input>
                        </div>
                    </div> 
            <div class="form-group">
                <div class="col-md-10">
                  <div class="col-md-5">
                      <button type="submit" id="btn-begin" class="btn btn-info pull-right">Begin Task</button>                       
                  </div>   
                  <div class="col-md-2">
                      <button type="close" class="btn btn-danger pull-right">Cancel</button>
                  </div>                     
                </div>
                
            </div>
                              
        </form>
    <!-- END CREATE SUBTASK FORM  -->
    </div>
</div>
</div>
</div>
@endforeach


@stop

@section('script')
<script type="text/javascript">
  
 $('#btn-begin').click(function (argument) {
     // body...
     var actual_dur= $('input[name=actual_duration]').val();
     var estimated_dur = $('input[name=estimated_duration]').val();
     var status_val = Math.round((actual_dur/estimated_dur)*100);
     
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
           estimated_duration: estimated_dur,
           actual_duration:actual_dur,
           status:status_val

        },
        success:function(data){
            console.log(data);
            window.location=data;
        }
      });
 });
 
</script>
@stop