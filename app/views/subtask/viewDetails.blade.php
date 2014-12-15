@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
    
    	<table>
    		<tr>
                <td>{{{$subtask->subtask_name}}}</td>
                <td>estimated_duration: {{{$subtask->estimated_duration}}}</td>
                <td>actual_duration: {{{$subtask->actual_duration}}}</td>

    		</tr>
    		<tr>
    			<a  data-toggle="modal" data-target="#modal_create_comment">Add Comment</a><!--   onclick="javascript:ixepms.createComment();" -->
    		</tr>
    	</table>

	<div>

       @if(count($subtask->comments)>0)
       <span>Comments:</span>
    	    @foreach($subtask->comments as $comment)
    	    	<table>
                    <tr>
                        <td>{{{$comment->comment_desc}}}</td>
                        <td>
                            <a href="{{{route('comment.edit',$comment->id)}}}">Edit</a> 
                            <a id="lnk-destroy" name="" data-method='delete' href="{{{route('comment.destroy',array($comment->id,$subtask->subtask_id))}}}"><i class="glyphicon glyphicon-trash"></i>Delete</a>                        

                        </td>
                    </tr>
                </table>
    	    @endforeach
        @endif
       
	</div>

    <div>   
       <a  data-toggle="modal" data-target="#modal_logwork">Log Work</a><!--   onclick="javascript:ixepms.createComment();" -->
    </div>
    
    <div>
        
    </div>
    </div>
</div>


<!-- START MODAL FOR CREATE SUBTASK-->
<div class="modal" id="modal_create_comment" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Add Comment</h4>
            </div>
            <div class="modal-body">
            <!-- START CREATE SUBTASK FORM  -->
                <form class="form-horizontal" role="form" action="{{{route('comment.store')}}}" method="post">                                    
                 <div class="form-group">
                 	
                 	  <input type="text"name="subtask_id" value="{{{$subtask->id}}}" style="display:none"/>
                
                </div>                                                                                  
                    <div class="form-group">
                        <label class="col-md-2 control-label">Comment here</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" name="comment_desc" placeholder=" Comment Description"></textarea>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <div class="col-md-5">
                            <button type="submit" id="btn-createComment" class="btn btn-info pull-right">Create</button>                       
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


<!-- START MODAL FOR CREATE SUBTASK-->
<div class="modal" id="modal_logwork" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Log Work</h4>
            </div>
            <div class="modal-body">
            <!-- START CREATE SUBTASK FORM  -->
                <form class="form-horizontal" role="form" action="#" onsubmit="return false;">                                    
                 <div class="form-group">
                   
                      <input type="text"name="subtask_id" value="{{{$subtask->id}}}" style="display:none"/>
                      <input type="text"name="actual_duration" id="actDuration" value="{{{$subtask->actual_duration}}}" style="display:none"/>
                      <input type="text"name="estimated_duration" id="estDuration" value="{{{$subtask->estimated_duration}}}" style="display:none"/>

                     
                </div>                                                                                  
                    <div class="form-group">
                        <label class="col-md-2 control-label">Log here</label>
                        <div class="col-md-10">
                            <input class="form-control" rows="5" name="worklog_desc" placeholder="Work Description"></input>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-md-2 control-label">Time Spent</label>
                        <div class="col-md-10">
                            <input class="form-control" rows="5" id="timeSpent" name="time_spent" placeholder="time spent"></input>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="col-md-5">
                            <button type="submit" id="btn-logWork" class="btn btn-info pull-right">Log</button>                       
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
$('#lnk-destroy').click(function (argument) {
     // body
     //get the number :D and remove the other characters 
     var comment_id= $('#deleteComment').val();
    
      $.ajax({
        url:"{{{route('comment.destroy')}}}",
        method:'delete',
        data:{
           id:$('input[name=id]').val()
        },
        success:function(data){
            window.location=data;
        }
      });
 });

$('#btn-logWork').click(function (argument) {
      var actual_duration =$('#actDuration').val();
      var time_spent = $('#timeSpent').val();
      var estimated_duration = $('#estDuration').val();

      var total_duration =0;
      var status=0;
      var tempDur=0;
      tempDur = parseInt(actual_duration) + parseInt(time_spent);
      alert(tempDur);
      if(tempDur<=estimated_duration){
        total_duration = parseInt(actual_duration) + parseInt(time_spent);
        status = Math.round((total_duration/estimated_duration)*100);
            $.ajax({
                url:"{{{route('worklog.store')}}}",
                method:'post',
                data:{
                   subtask_id:$('input[name=subtask_id]').val(),
                   worklog_desc: $('input[name=worklog_desc]').val(),
                   time_spent :time_spent,
                   actual_duration : total_duration,
                   status: status

                },
                success:function(data){
                    window.location=data;
                    tempDur=0;
                    total_duration=0;
                }
            });
        }else{
         alert("Time spent exceeds to the estimated Duration.. Ibagsak si Clarette..");                   
         var subtask_id=$('input[name=subtask_id]').val();
          $.ajax({
              url:"{{{URL::to('subtask/viewSubtaskDetails')}}}"+subtask_id,
             /*
              data:{
                 id:subtask_id
              },*/
              success:function(data){
                 alert(data);
                 // window.location=data;
              }
          });
      }
        
      
     /**/
 });


</script>

@stop