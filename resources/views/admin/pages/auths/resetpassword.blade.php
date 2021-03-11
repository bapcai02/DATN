<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme - Multipurpose Bootstrap4 Admin Template</title>
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

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="height-100v d-flex align-items-center justify-content-center">
	<div class="card card-authentication1 mb-0">
		<div class="card-body">
		 <div class="card-content p-2">
		  <div class="card-title text-uppercase pb-2">Reset Password</div>
		    <form action="{{ url('auth/set-password') }}" method="POST">
			  <div class="form-group">
			  <label for="exampleInputEmailAddress" class="">Password Reset</label>
			   <div class="position-relative has-icon-right">
           <input type="hidden" name="token" value="{{ $token }}">
           @csrf
				  <input type="password" name="password" class="form-control input-shadow" placeholder="Enter New PassWord">
			   </div>
			  </div>
			 
			  <button type="submit" class="btn btn-light btn-block mt-3">Reset Password</button>
			 </form>
		   </div>
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
