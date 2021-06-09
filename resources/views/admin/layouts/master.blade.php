<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>SHOP</title>
  <!-- loader-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{'https://dvha-datn.herokuapp.com/assets/css/pace.min.css'}}" rel="stylesheet"/>
  <script src="{{'https://dvha-datn.herokuapp.com/assets/js/pace.min.js'}}"></script>
  <!--favicon-->
  <link href="{{'https://dvha-datn.herokuapp.com/assets/plugins/fullcalendar/css/fullcalendar.min.css'}}" rel='stylesheet'/>
  <link rel="icon" href="{{'https://dvha-datn.herokuapp.com/assets/images/favicon.ico'}}" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="{{'https://dvha-datn.herokuapp.com/assets/plugins/simplebar/css/simplebar.css'}}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{'https://dvha-datn.herokuapp.com/assets/css/bootstrap.min.css'}}" rel="stylesheet"/>

  <!-- animate CSS-->
  <link href="{{'https://dvha-datn.herokuapp.com/assets/css/animate.css'}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{'https://dvha-datn.herokuapp.com/assets/css/icons.css'}}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{'https://dvha-datn.herokuapp.com/assets/css/sidebar-menu.css'}}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{'https://dvha-datn.herokuapp.com/assets/css/app-style.css'}}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   @include('admin.partials.menu')
   
</div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
  @include('admin.partials.header')
<!--End topbar header-->

    @yield('content')
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!-- Start footer-->
	<!-- <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © Admin
        </div>
      </div>
    </footer> -->
	<!--End footer -->
	
  <!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="{{'https://dvha-datn.herokuapp.com/assets/js/jquery.min.js'}}"></script>
  <script src="{{'https://dvha-datn.herokuapp.com/assets/js/popper.min.js'}}"></script>
  <script src="{{'https://dvha-datn.herokuapp.com/assets/js/bootstrap.min.js'}}"></script>
	
 <!-- simplebar js -->
  <script src="{{'https://dvha-datn.herokuapp.com/assets/plugins/simplebar/js/simplebar.js'}}"></script>
  <!-- sidebar-menu js -->
  <script src="{{'https://dvha-datn.herokuapp.com/assets/js/sidebar-menu.js'}}"></script>
  <!-- Custom scripts -->
  <script src="{{'https://dvha-datn.herokuapp.com/assets/js/app-script.js'}}"></script>
  <!-- Chart js -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @stack('script')
</body>
</html>
