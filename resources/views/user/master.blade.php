<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>NTF Shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('description')">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{!! url('public/user/css/bootstrap.css') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/bootstrap-responsive.css') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/style.css') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/flexslider.css') !!}" type="text/css" media="screen" rel="stylesheet"  />
<link href="{!! url('public/user/css/jquery.fancybox.css') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/cloud-zoom.css') !!}" rel="stylesheet">
<link href="{!! url('public/user/css/toastr.min.css') !!}" rel="stylesheet">
 <!--icon-->
    <link rel="icon" href="{{url('public/icon-web.ico')}}" type="image/x-icon"/>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="{!! url('public/user/assets/ico/favicon.html') !!}">

</head>
<body>
<!-- Header Start -->
<header>
  @include('user.block.header')
  <div class="container">
  @include('user.block.nav')
  </div>
</header>
<!-- Header End -->

<div id="maincontainer">

  
  <!-- Featured Product-->
  @yield('content')
  <!-- Featured Product-->
  <!-- Latest Product-->
</div>
<!-- Footer -->
  @include('user.block.footer')
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="{!! url('public/user/js/jquery.js') !!}"></script>
<script src="{!! url('public/user/js/bootstrap.js') !!}"></script>
<script src="{!! url('public/user/js/respond.min.js') !!}"></script>
<script src="{!! url('public/user/js/application.js') !!}"></script>
<script src="{!! url('public/user/js/bootstrap-tooltip.js') !!}"></script>
<script defer src="{!! url('public/user/js/jquery.fancybox.js') !!}"></script>
<script defer src="{!! url('public/user/js/jquery.flexslider.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/user/js/jquery.tweet.js') !!}"></script>
<script  src="{!! url('public/user/js/cloud-zoom.1.0.2.js') !!}"></script>
<script  type="text/javascript" src="{!! url('public/user/js/jquery.validate.js') !!}"></script>
<script type="text/javascript"  src="{!! url('public/user/js/jquery.carouFredSel-6.1.0-packed.js') !!}"></script>
<script type="text/javascript"  src="{!! url('public/user/js/jquery.mousewheel.min.js') !!}"></script>
<script type="text/javascript"  src="{!! url('public/user/js/jquery.touchSwipe.min.js') !!}"></script>
<script type="text/javascript"  src="{!! url('public/user/js/jquery.ba-throttle-debounce.min.js') !!}"></script>
<script type="text/javascript"  src="{!! url('public/user/js/toastr.min.js') !!}"></script>
<script defer src="{!! url('public/user/js/custom.js') !!}"></script>
<!--<script defer src="{!! url('public/user/js/myscript.js') !!}"></script>-->
<script defer src="{!! url('public/user/js/abc.js') !!}"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "500",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@if(Session::has('flash_message'))
    <script>
        toastr["{!! Session::get('flash_level') !!}"]("{!! Session::get('flash_message') !!}")
    </script>
@endif

</body>
</html>