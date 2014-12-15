
@extends('layouts.master')
@section('content')

<div class="row col-md-12">
        <!-- PROFILE ITEM -->
        <div class="panel panel-default">
            <div class="panel-body profile">
                <div class="profile-image">
                    <img src="assets/images/users/user3.jpg" alt="Nadia Ali"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"></div>
                    <div class="profile-data-title"></div>
                </div>
                <!-- <div class="profile-controls">
                    <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="#" class="profile-control-right"><span class="fa fa-phone"></span></a>
                </div> -->
            </div>                                
            <div class="panel-body">                                    
                <div class="contact-info">

                    <p><small>Name</small><br/>{{{$userprofile->lastname}}}, {{{$userprofile->firstname}}} {{{$userprofile->middlename}}} </p>
                    <p><small>Gender</small><br/>{{{$userprofile->gender}}}</p>
                    <p><small>Age</small><br/>{{{$userprofile->age}}}</p>
                    <p><small>Birthdate</small><br/>{{{$userprofile->birthdate}}}</p>
                    <p><small>Address</small><br/>{{{$userprofile->address}}}</p>
                    <p><small>Contact Number</small><br/>{{{$userprofile->contact_number}}}</p>
                    <p><small>Designation</small><br/>{{{$userprofile->designation}}}</p>
                                              
                </div>
                <div>
                <a href="{{{route('UserProfile.edit',$userprofile->id)}}}">Edit</a>   <!-- <i class="fa fa-edit"></i> -->                     
                </div>
            </div>                                
        </div>
        <!-- END PROFILE ITEM -->

</div>

@stop