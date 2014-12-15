
@extends('layouts.master')
@section('content')
            <div class="header">
                <button type="button" class="close" data-dismiss=""><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="title">Create Survey Questionnaire</h4>
            </div>
            <div class="body">
                <form class="form-horizontal" role="form" action="{{{route('behavioralsub.store')}}}" method="post">                                    
                   <div class="form-group">
                    
                    </div>                                                                               
                    <div class="form-group">
                        <label class="col-md-2 control-label">Survey Question</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" name="survey_question" placeholder=" Survey Question"></textarea>
                        </div>
                    </div> 
                     
                    <div class="form-group">
                        <div class="col-md-10">
                            <button type="close" data-dismiss="modal" class="btn btn-danger pull-right">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Create</button>                       
                        </div>
                        
                    </div>
                                      
                </form>
            </div>
@stop
@section('script')
<script type="text/javascript">
  
 $('#btn-submit').click(function (argument) {
     
     // body...
      $.ajax({
        url:"{{{route('behavioralsub.update')}}}",
        method:'post',
        data:{
           id:$('input[name=id]').val(),
           survey_question:$('input[name=survey_question]').val(),
        },
        success:function(data){
            console.log(data);
            window.location=data;
        }
      });
 });
</script>
@stop