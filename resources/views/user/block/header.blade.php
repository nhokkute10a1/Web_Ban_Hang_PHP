<body>
  <head>
    <div class="headerstrip">
      <div class="container">
        <div class="row">
          <div class="span12">
            <a href="index-2.html" class="logo pull-left"><img src="{!! url('public/user/img/logo.png') !!}" alt="SimpleOne" title="SimpleOne"></a>
            <!-- Top Nav Start -->
            <div class="pull-left">
              <div class="navbar" id="topnav">
                <div class="navbar-inner">
                  <ul class="nav" >
                    <li><a class="home active" href="#">Home</a>
                    </li>
                    @if (Auth::check())
                        <li><a class="myaccount" href="#">Xin chào, {{ Auth::user()->name }}</a></li>
                        <li><a href="{!! route('user.getLogout') !!}"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a></li>
                    @else
                    <li><a class="myaccount" href="{!! URL::route('user.login.getLogin')!!}">Tài Khoản</a></li>
                    @endif

                    <li><a class="shoppingcart" href="{!! route('giohang') !!}">Giỏ Hàng</a>

                    </li>
                   <!--<li><a class="checkout" href="#">Tìm Kiếm<input type="seach" name="tìm kiếm"></a>-->
                      <li>
                          <div class="col-xs-7 col-sm-7 header-search-box">
                              <form  action="{!! url('timkiem') !!}" method="post" class="form-inline">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <div class="form-group input-serach">
                                      <input type="text" name="txttukhoa" placeholder="Từ khóa ..." value="" width="100px">
                                      <button style="margin-right: 20px;border-radius: 3px" type="submit" class=" btn-search">Tìm Kiếm</button>
                                  </div>

                              </form>
                          </div>
                      </li>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Top Nav End -->
          </div>
        </div>
      </div>
    </div>
  </head>
</body>