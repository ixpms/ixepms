@extends('layouts.master')
<!-- <ol class="breadcrumb">
	<li>
		<a href="#">Home</a>
	</li>
	<li>
		<a href="#">Link</a>
	</li>
	<li class="active">Current</li>
</ol> -->
@section('content')
	<div class="row">
		<div class="col-md-12">
		<form action="saveAnswer" method="post" accept-charset="utf-8">
 	  	@foreach ($assessments as $assessment)
		    	<div class="form-group">
           <label for="">{{$assessment->comp_name}}</label>
            <div class="clearfix">
            </div>
           @foreach ($assessment->behavioralsub as $element)
                  {{$element->survey_question}}
               		<input type="radio" name="{{$element->id}}" value="1" checked >
               		<input type="radio" name="{{$element->id}}" value="2" >
               		<input type="radio" name="{{$element->id}}" value="3" >
               		<input type="radio" name="{{$element->id}}" value="4" >
               		<input type="radio" name="{{$element->id}}" value="5" >
           @endforeach
          </div>
		    @endforeach
		      <div class="form-group">
		      	<label for="">User</label>
		      	<select name="user_id"  class="form-control" >
				       @foreach ($users as $user)
				           <option  <?php echo ($user->id == Auth::id()) ? 'selected' :'' ?> value="{{$user->id}}">{{$user->lastname}},{{$user->firstname}} </option>
				       @endforeach
				     </select>
		      </div>
		    <input type="submit" name="" class="btn btn-submit" value="Go">
		  </form>
  	</div>
	</div>
@stop