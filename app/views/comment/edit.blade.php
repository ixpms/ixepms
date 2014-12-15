@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
            @foreach($comments as $comment)
            <div class="panel-heading">                                
                Edit Comment
            </div>

            <!-- START EDIT SUBTASK FORM  -->
                <form class="form-horizontal" role="form" action="#" onsubmit="return false;">                                    
                   <div class="form-group">
                        <input style="display:none" name="id" value='{{{$comment->id}}}'></input>
                        <input style="display:none" name="subtask_id" value='{{{$comment->subtask_id}}}'></input>                
                    </div>                                                               
                    <div class="form-group">
                        <label class="col-md-2 control-label">Comment Here</label>
                        <div class="col-md-10">
                            <input class="form-control" rows="5" name="comment_desc" value="{{{$comment->comment_desc}}}"></input>

                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="col-md-10">
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-info pull-right" id="btn-update">Update</button>                       
                            </div>   
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-danger pull-right" id="btn-cancel">Cancel</button>                       

                                <!-- {{ link_to(URL::previous(), 'Cancel', ['type'=>'close','class' => 'btn btn-danger pull-right', 'id'=>'btn-cancel']) }} -->
                            </div>
                            
                        </div>
                        
                    </div>
                                      
                </form>
            <!-- END CREATE SUBTASK FORM  -->

                @endforeach
            </div>
        </div>
    </div>
</div>


@stop

@section('script')
<script type="text/javascript">
  
 $('#btn-update').click(function (argument) {
     // body...
     alert($('input[name=comment_desc]').val());
      $.ajax({
        url:"{{{route('comment.update')}}}",
        method:'put',
        data:{
           id:$('input[name=id]').val(),
           subtask_id: $('input[name=subtask_id]').val(),
           comment_desc:$('input[name=comment_desc]').val()

        },
        success:function(data){
            console.log(data);
            window.location=data;
        }
      });
 });

/* $('#btn-cancel').click(function  (argument) {
    
     window.location.href="URL::to('subtask/viewSubtaskDetails/', $comment->subtask_id)')";
 });*/

</script>
@stop