@extends('layouts.master')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
   
    <div class="panel-heading">                                
        <h3 class="panel-title">
           Supply Your Basic Information
        </h3>
    </div>

    <!-- START EDIT USERPROFILE FORM  -->
        <form class="form-horizontal" role="form" action="#" onsubmit="return false;">                                    
           <div class="form-group">
                <input style="display:none" name="id" value='{{{$userprofile->id}}}'></input>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">First Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="firstname" placeholder="First Name " value='{{{$userprofile->firstname}}}'/>
                </div>
            </div>                                                                
            <div class="form-group">
                <label class="col-md-2 control-label">Middle Name</label>
                <div class="col-md-10">
                    <input class="form-control" rows="5" name="middlename" placeholder="Middle Name" value='{{{$userprofile->middlename}}}'/>
                </div>
            </div> 
            <div class="form-group">
                <label class="col-md-2 control-label">Last Name</label>
                <div class="col-md-10">
                    <input class="form-control" rows="5" name="lastname" placeholder="Last Name" value='{{{$userprofile->lastname}}}'/>
                </div>
            </div> 
            <div class="form-group">
                <label class="col-md-2 control-label">Gender</label>
                <div class="col-md-10">
                    <input class="form-control" rows="5" name="gender" placeholder="Gender" value='{{{$userprofile->gender}}}'/>
                </div>
            </div> 
             <!-- <div class="form-group">
                <label class="col-md-2 control-label">Birthdate</label>
                <div class="col-md-10">
                <div class="input-group">
                        <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                </div>
                </div>
            </div> -->
            <div class="form-group">
                <label class="col-md-2 control-label">Address</label>
                <div class="col-md-10">
                    <input class="form-control" rows="5" name="address" placeholder="Address" value='{{{$userprofile->address}}}'/>
                </div>
            </div> 
            <div class="form-group">
                <label class="col-md-2 control-label">Contact Number</label>
                <div class="col-md-10">
                    <input class="form-control" rows="5" name="contact_number" placeholder="Contact Number" value='{{{$userprofile->contact_number}}}'/>
                </div>
            </div> 
            <div class="form-group">
                <label class="col-md-2 control-label">Designation</label>
                <div class="col-md-10">
                    <input class="form-control" rows="5" name="designation" placeholder="Designation" value='{{{$userprofile->designation}}}'/>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-md-5">
                    <button type="submit" id="btn-updateprofile" class="btn btn-info pull-right">Update</button>                       
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
  
 $('#btn-updateprofile').click(function (argument) {
     // body...

      $.ajax({
        url:"{{{route('UserProfile.update')}}}",
        method:'put',
        data:{
           id:$('input[name=id]').val(),
           firstname: $('input[name=firstname]').val(),
           middlename: $('input[name=middlename]').val(),
           lastname:$('input[name=lastname]').val(),
           gender:$('input[name=gender]').val(),
           birthdate:$('input[name=birthdate]').val(),
           address:$('input[name=address]').val(),
           age:$('input[name=age]').val(),
           contact_number:$('input[name=contact_number]').val(),
           designation:$('input[name=designation]').val()

        },
        success:function(data){
            console.log(data);
            window.location=data;
        }
      });
 });
</script>
@stop
