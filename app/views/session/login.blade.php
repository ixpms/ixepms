<html>
	<head>@include('layouts.head')</head>	
		<body>
			<div class="login-container lightmode">
	            <div class="login-box animated fadeInDown">
	                <div class="login-logo" style="background:rgba(255,255,255,.1);"></div>
	                <div class="login-body">
	                    <div class="login-title"><strong>Log In</strong> to your account</div>
	                    @if(Session::has('message') )
						 	<p class="text-danger">{{{Session::get('message')}}}</p>
						@endif
	                    <form action="login" class="form-horizontal" method="post">
		                    <div class="form-group">
		                        <div class="col-md-12">
		                            <input type="text" class="form-control" name="username" placeholder="Username"/>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <div class="col-md-12">
		                            <input type="password" class="form-control" name="password" placeholder="Password"/>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        	
		                        <div class="col-md-6">
		                            <button class="btn btn-info btn-block" type="submit">Log In</button>
		                        </div>
		                    </div>
		                   
		                    <div class="login-subtitle">
		                        Don't have an account yet? <a href="#">Create an account</a>
		                    </div>
	                    </form>
	                </div>
	                <div class="login-footer" style="background:rgba(255,255,255,.1)">
	                    <div class="pull-left">
	                        &copy; 2015 iXePMS
	                    </div>
	                    <div class="pull-right">
	                        <a href="#">About</a> |
	                        <a href="#">Privacy</a> |
	                        <a href="#">Contact Us</a>
	                    </div>
	                </div>
	            </div>   
		 </div>
	</body>
</html>