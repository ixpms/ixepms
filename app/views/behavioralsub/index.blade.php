@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">

	    <!-- START DEFAULT DATATABLE -->
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title"></h3>
	            <ul class="panel-controls">
	                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
	                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
	                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
	            </ul>
	        </div>
	        <div class="panel-body">

	            <table class="table datatable">

	                <thead>
	                    <tr>
	                         <th>ID</th>
					        <th>Survey Question</th>
	                    </tr>
	                </thead>
	                <tbody>
					  @foreach($behavioralsubs as $behavioralsub)

	                    <tr>
	                        <td>{{{$behavioralsub->id}}}</td>
					        <td>{{{$behavioralsub->survey_question}}}</td>
					        <td>
					            <a href="{{{route('behavioralsub.edit',$behavioralsub->id)}}}"><i class="fa fa-edit"></i>Edit</a>

					        </td>
                            <td>
                                <a id="lnk-destroy"><i class="glyphicon glyphicon-trash"></i>Delete</a>

                            </td>

	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
            		<button class="btn btn-info" data-toggle="modal" data-target="#modal_create_behavioralsub">Add Survey Question</button>
	        </div>

	    </div>
	    <!-- END DEFAULT DATATABLE -->
	</div>
</div>

<!-- START MODAL FOR CREATE SUBTASK-->
<div class="modal" id="modal_create_behavioralsub" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Create Survey Question</h4>
            </div>
            <div class="modal-body">
            <!-- START CREATE SUBTASK FORM  -->
                <form class="form-horizontal" role="form" action="{{{route('behavioralsub.store')}}}" method="post">
	                <div class="form-group">
	                   	<!-- for behavioral main id -->
	                </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Survey Question</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="survey_question" placeholder="Survey Question"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Weight</label>
                        <div class="col-md-10">
                            <input class="form-control" rows="5" name="weight" placeholder="Weight"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">
                            <button type="submit" id="btn-create-survey" class="btn btn-info pull-right">Create</button>
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

$('#btn-create-survey').click(function (argument) {
      $.ajax({
        url:"{{{route('behavioralsub.store')}}}",
        method:'post',
        data:{
           survey_question: $('input[name=survey_question]').val(),
           weight: $('input[name=weight]').val()
        },
        success:function(data){
            window.location=data;
        }
      });
 });


$('#lnk-destroy').click(function (argument) {
     // body...
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
