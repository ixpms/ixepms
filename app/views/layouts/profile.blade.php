<li class="xn-logo">
    <a href="#">iXEPMS</a>
    <a href="#" class="x-navigation-control"></a>
</li>
<li class="xn-profile">
    <a href="#" class="profile-mini">
        <img src="assets/images/users/user3.jpg" alt="Nadia Ali"/>
    </a>
    <div class="profile">
        <div class="profile-image">
        <img src="assets/images/users/user3.jpg" alt="Nadia Ali"/>
            
        </div>
        <div class="profile-data">
            <div class="profile-data-name">{{{Auth::user()->firstname}}} {{{Auth::user()->middlename}}} {{{Auth::user()->lastname}}}</div>
            <div class="profile-data-title">Web Developer/Designer</div>
        </div>
        <div class="profile-controls">
            <a href="{{{route('UserProfile.index')}}}" class="profile-control-left"><span class="fa fa-info"></span></a>
            <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
        </div>
    </div>                                                                        
</li>