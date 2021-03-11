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
        @if(session('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('message')}}
            </div>
        @endif
		    <form action="{{ url('auth/p-confirm') }}" method="POST" >
          @csrf
          @if($errors->has('errorlogin'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{$errors->first('errorlogin')}}
                </div>
            @endif
          <div class="form-group">
            <label for="exampleInputEmailAddress" class="">Email Address</label>
            <div class="position-relative has-icon-right">
              <input type="email" name="email" class="form-control input-shadow" placeholder="Email Address" required>
              <div class="form-control-position">
                <i class="icon-envelope-open"></i>
              </div>
            </div>
          </div>
        
          <button type="submit" class="btn btn-light btn-block mt-3">Reset Password</button>
			 </form>
		   </div>
		  </div>
		   <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Return to the <a href="{{ url('auth/login') }}"> Sign In</a></p>
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
