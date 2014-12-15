@extends('layouts.master')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
    
    <div class="panel-heading">                                
        <h3 class="panel-title">
           Edit Survey Question
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
                    <input type="text" class="form-control" name="survey_question" placeholder="Survey Question" value='{{{$behavioralsub->survey_question}}}'/>
                </div>
            </div>                                                                
            <div class="form-group">
                <label class="col-md-2 control-label">Weight</label>
                <div class="col-md-10">
                    <input class="form-control" rows="5" name="weight" placeholder="Weight" value='{{{$behavioralsub->weight}}}'/>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-md-5">
                    <button type="submit" id="btn-submit" class="btn btn-info pull-right">Update</button>                       
                </div>   
                <div class="col-md-2">
                    <button type="close" data-dismiss="modal" class="btn btn-danger pull-right">Cancel</button>
                </div> 
                
            </div>
                      
        </form>
    <!-- END CREATE USERPROFILE FORM  -->
    </div>
</div>


@stop

@section('script')
<script type="text/javascript">
  
$('#btn-submit').click(function (argument) {
     // body...
      $.ajax({
        url:"{{{route('behavioralsub.update')}}}",
        method:'put',
        data:{
           id:$('input[name=id]').val(),
           survey_question: $('input[name=survey_question]').val(),
           weight: $('input[name=weight]').val()

        },
        success:function(data){
            window.location=data;
        }
      });
 });
</script>
@stop
