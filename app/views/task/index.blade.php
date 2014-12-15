@extends('layouts.master')
@section('content')
<!-- START SIMPLE DATATABLE -->
<div class="panel panel-default">

    <div class="panel-heading">
    <h3 class="panel-title">
        <span name="department_name" id = "department_name" value=""></span>
     </h3>
        <!-- <ul class="panel-controls">
            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
        </ul>  -->
    </div>

    <div class="panel-body">

        <table class="table datatable_simple">
            <thead>
                <tr>
                    <th>KRAID</th>
                    <th>Task Name</th>
                    <th>Task Description</th>
                     @if ($dash_id <> 3)
                         <th>User</th>
                     @endif
                    <th>Target Date</th>
                    <th> </th>

                </tr>
            </thead>

            <tbody>

     @foreach($tasks as $task)
                <tr>
                	<td>{{{$task->id}}}</td>
                    @if(Auth::id()==$task->user_id)
                    <td><a href="{{{route('subtask.show',$task->id)}}}">{{{$task->task_name}}}</a></td>
                    @else
                	<td>{{{$task->task_name}}}</td>
                    @endif
                	<td>{{{$task->task_desc}}}</td>
                    @if ($dash_id <> 3)
                    <td>
                      <select name="assign_user" data-task_id="{{$task->id}}" onchange="setUser()" class="form-control"  >
                       @foreach ($users as $user)
                           <option <?php  echo ($user->id == $task->user_id)?'selected':''; ?>  value="{{$user->id }}">{{ $user->lastname }},{{ $user->firstname }} </option>
                        @endforeach
                      </select>
                    </td>
                    @endif
                    <td>{{{$task->target_date}}}
                	<td><a href="" data-toggle="modal" data-target="#modal_edit_subtask"><i class="fa fa-edit"></i></a></td>
                </tr>

    @endforeach

            </tbody>

        </table>

    </div>


</div>
<!-- END SIMPLE DATATABLE -->
@stop
@section('script')
<script type="text/javascript">
 function setUser (argument) {
  $.ajax({
       url: 'setUser',
       type: 'POST',
       data: {
        task_id:$('select[name=assign_user]').data('task_id'),
        user_id:$('select[name=assign_user]').val()
       },
       success:function(data){
         if(data.success == 'ok') console.log('mana');
       }
   });

 }

</script>
@stop