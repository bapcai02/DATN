<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Login</title>
  <!-- loader-->
  <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet"/>
  <script src="{{asset('assets/js/pace.min.js')}}"></script>
  <!--favicon-->
  <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{asset('assets/css/app-style.css')}}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="{{asset('assets/images/logo-icon.png')}}" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
		    <form action="{{url('auth/login')}}" method="POST" >
            @csrf
            @if($errors->has('errorlogin'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{$errors->first('errorlogin')}}
                </div>
            @endif
            @if(!empty(session('reset-success')))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('reset-success')}}
                </div>
            @endif
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input name="email" type="text" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Email" required value="{{ old('email') }}">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" name = "password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password" required value="{{ old('password') }}">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row">
			 <div class="form-group col-6 text-right">
			    <a href="{{ url('auth/confirm') }}">Reset Password</a>
			 </div>
			</div>
			 <button type="submit" class="btn btn-light btn-block">Sign In</button>
			</div>
			 
			 </form>
		   </div>
		  </div>
	     </div>
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	
  <!-- sidebar-menu js -->
  <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
  
  <!-- Custom scripts -->
  <script src="{{asset('assets/js/app-script.js')}}"></script>
  
</body>
</html>
