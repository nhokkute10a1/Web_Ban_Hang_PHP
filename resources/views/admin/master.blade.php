<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website ứng dụng Larave;">
    <meta name="author" content="Doan Thu Thuy">
    <title>Admin Area</title>

    <!--icon-->
    <link rel="icon" href="{{url('public/icon-web.ico')}}" type="image/x-icon"/>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('public/admin/bower_components/metisMenu/dist/metisMenu.min.css') }} " rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('public/admin/dist/css/sb-admin-2.css') }} " rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('public/admin/bower_components/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

    {{-- <!-- DataTables CSS -->
    <link href="{{url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }} " rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{url('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }} " rel="stylesheet"> --}}

    <!--aaa-->
    <link href="{{url('public/admin/table/dataTables.bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{url('public/admin/table/responsive.bootstrap.min.css') }} " rel="stylesheet">
    <!-- my -->

    <!--nhung js ckceditor va ckfinder-->
    <script src="{{url('public/admin/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{url('public/admin/js/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript">
       var baseURL="{!! url('/') !!}";
       //alert(baseURL); 
   </script>
   <script type="text/javascript" src="{{url('public/admin/js/func_ckfinder.js') }}"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Area </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>{!! Auth::user()->name !!}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài Đặt</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!! url('admin/logout')!!}"><i class="fa fa-sign-out fa-fw"></i> Đăng Xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Loại Sản Phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.cate.list')!!}">Danh Sách Loại</a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('admin.cate.getAdd')!!}">Thêm Loại</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-leaf"></i> Nhà Sản Xuất<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.producer.list')!!}">Danh Sách NSX</a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('admin.producer.getAdd')!!}">Thêm NSX</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Sản Phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.product.list')!!}">Danh Sách Sản Phẩm</a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('admin.product.getAdd')!!}">Thêm Sản Phẩn</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Tài Khoản<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.user.list')!!}">Danh Sách Tài Khoản</a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('admin.user.getAdd')!!}">Thêm Tài Khoản</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <!-- /.container-fluid -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('controller')
                            <small>@yield('action')</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        @if(Session::has('flash_message'))
                        <div class="alert alert-{!! Session::get('flash_level') !!}">
                            {!! Session::get('flash_message') !!}
                        </div>
                        @endif
                    </div>
                    <!-- Nội dung body-->
                    @yield('content')
                    <!-- Nội dung body-->
                    <!-- /.container-fluid -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{url('public/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('public/admin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('public/admin/dist/js/sb-admin-2.js') }}"></script>

    <!-- DataTables JavaScript -->
   {{--  <script src="{{url('public/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script> --}}

   <!--aaa-->
   <script src="{{url('public/admin/table/jquery.dataTables.min.js') }}"></script>
   <script src="{{url('public/admin/table/dataTables.bootstrap.min.js') }}"></script>
   <script src="{{url('public/admin/table/dataTables.responsive.min.js') }}"></script>
   <script src="{{url('public/admin/table/responsive.bootstrap.min.js') }}"></script>
   
   <!--aaa-->
   <script src="{{url('public/admin/js/myscript.js') }}"></script>

   <!-- Page-Level Demo Scripts - Tables - Use for reference -->

   <script>
    $(document).ready(function() {
        $('#example').DataTable({
           responsive: true
       });
    } );
</script>


</body>

</html>
