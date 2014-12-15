@extends('layouts.master')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
    @foreach($behavioralsubs as $behavioralsub)
    <div class="panel-heading">                                
        <h3 class="panel-title">
           Are you sure you want to delete this question?
        </h3>
    </div>

    <!-- START EDIT USERPROFILE FORM  -->
        <form class="form-horizontal" role="form" action="#" onsubmit="return false;">                                    
           <div class="form-group">
                <input style="display:none" name="id" value='{{{$behavioralsub->id}}}'></input>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Survey Question</label>
                <div class="col-md-10">
                    <span type="text" class="form-control" name="survey_question" placeholder="Survey Question" value='{{{$behavioralsub->survey_question}}}'/>
                </div>
            </div>                                                                
            <div class="form-group">
                <label class="col-md-2 control-label">Weight</label>
                <div class="col-md-10">
                    <span class="form-control" rows="5" name="weight" placeholder="Weight" value='{{{$behavioralsub->weight}}}'/>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-md-5">
                    <button type="submit" id="btn-submit" class="btn btn-info pull-right">Confirm</button>                       
                </div>   
                <div class="col-md-2">
                    <button type="close" data-dismiss="modal" class="btn btn-danger pull-right">Cancel</button>
                </div> 
                
            </div>
                      
        </form>
    </div>
</div>

@endforeach

@stop

@section('script')
<script type="text/javascript">
  
$('#btn-submit').click(function (argument) {
     // body...
     alert(12);
      $.ajax({
        url:"{{{route('behavioralsub.destroy')}}}",
        method:'delete',
        data:{
           id:$('input[name=id]').val()
        },
        success:function(data){
            window.location=data;
        }
      });
 });
</script>
@stop
