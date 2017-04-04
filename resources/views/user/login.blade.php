@extends('user.master')
@section('description','Loại sản phẩm')
@section('content')
  <div id="maincontainer">
    <section id="product">
      <div class="container">
        <!--  breadcrumb -->
        <ul class="breadcrumb">
          <li>
            <a href="#">Home</a>
            <span class="divider">/</span>
          </li>
          <li class="active">Login</li>
        </ul>
        <!-- Account Login-->
        <div class="row">
          <div class="span9">
            <h1 class="heading1"><span class="maintext">Login</span><span class="subtext">First Login here to View All your account information</span></h1>
            <section class="newcustomer">
              <h2 class="heading2">New Customer </h2>
              <div class="loginbox">
                <h4 class="heading4"> Đăng ký tài khoản</h4>
                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                <br>
                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                <br>
                <br>
                <a  href="{!! URL::route('user.register.getRegister')!!}" class="btn btn-primary">Tiếp tục</a>
              </div>
            </section>
            <section class="returncustomer">
              <h2 class="heading2">Returning Customer </h2>
              <div class="loginbox">
                <h4 class="heading4">I am a returning customer</h4>
                @include('admin.blocks.error')
                <form role="form" action="" method="POST">
                  <fieldset>
                    <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                    <div class="form-group">
                      <input class="form-control" placeholder="Tài khoản" name="txtUser" type="text" autofocus>
                    </div>
                    <div class="form-group">
                      <input class="form-control" placeholder="Password" name="txtPassword" type="password" value="">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Đăng Nhập</button>
                  </fieldset>
                </form>
              </div>
            </section>
          </div>

          <!-- Sidebar Start-->
          <aside class="span3">
            <div class="sidewidt">
              <h2 class="heading2"><span>Account</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a href="#"> My Account</a>
                </li>
                <li>
                  <a href="#">Edit Account</a>
                </li>
                <li>
                  <a href="#">Password</a>
                </li>
                <li>
                  <a href="#">Wish List</a>
                </li>
                <li><a href="#">Order History</a>
                </li>
                <li><a href="#">Downloads</a>
                </li>
                <li><a href="#">Returns</a>
                </li>
                <li>
                  <a href="#"> Transactions</a>
                </li>
                <li>
                  <a href="category.html">Newsletter</a>
                </li>
                <li>
                  <a href="category.html">Logout</a>
                </li>
              </ul>
            </div>
          </aside>
          <!-- Sidebar End-->
        </div>
      </div>
    </section>
  </div>

@endsection