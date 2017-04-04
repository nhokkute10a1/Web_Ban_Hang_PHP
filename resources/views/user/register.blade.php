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
      <li class="active">Register Account</li>
  </ul>
  <div class="row">        
    <!-- Register Account-->
    <div class="span9">
      <h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext">Register Your details with us</span></h1>
      @include('admin.blocks.error')
      <form class="form-horizontal"action="{!!url('/user/register')  !!}" method="POST">
         <input type="hidden" name="_token" value="{!! csrf_token()!!}">
         <h3 class="heading3">Thông tin cá  nhân</h3>
         <div class="registerbox">
          <fieldset>
            <div class="control-group">
              <label class="control-label"><span class="red">*</span> Tài khoản:</label>
              <div class="controls">
                  <input class="form-control" name="txtUser" placeholder="Vui lòng nhập tài khoản" required="" />
              </div>
          </div>
          <div class="control-group">
              <label class="control-label"><span class="red">*</span> Email:</label>
              <div class="controls">
                <input type="email" class="form-control" name="txtEmail" placeholder="Vui lòng nhập email" required="" />
            </div>
        </div>
        <div class="control-group">
          <label class="control-label"><span class="red">*</span> Họ:</label>
          <div class="controls">
            <input type="text" class="form-control" name="txtHo" placeholder="Vui lòng nhập họ" required="" />
        </div>
    </div>
    <div class="control-group">
      <label class="control-label"><span class="red">*</span> Tên:</label>
      <div class="controls">
        <input type="text" class="form-control" name="txtTen" placeholder="Vui lòng nhập tên" required="" />
    </div>
</div>
<div class="control-group">
  <label class="control-label"> Địa chỉ:</label>
  <div class="controls">
    <input type="text" class="form-control" name="txtDiaChi" placeholder="Vui lòng nhập địa chỉ" required="" />
</div>
</div>
<label class="control-label"> Số điện thoại:</label>
<div class="controls">
    <input type="text" class="form-control" name="txtSDT" placeholder="Vui lòng nhập số điện thoại" required="" />

</div>
<div class="form-group">
    <label class="radio-inline">
        <input name="rdoLevel" type="hidden" value="2" type="radio">
    </label>
</div>
</fieldset>
</div>
<h3 class="heading3">Mật khẩu của bạn</h3>
<div class="registerbox">
  <fieldset>
    <div class="control-group">
      <label  class="control-label"><span class="red">*</span> Mật khẩu:</label>
      <div class="controls">
        <input type="password" class="form-control" name="txtPass" placeholder="Vui lòng nhập mật khẩu"  required=""/>
    </div>
</div>
<div class="control-group">
  <label  class="control-label"><span class="red">*</span> Mật khẩu nhập lại:</label>
  <div class="controls">
    <input type="password" class="form-control" name="txtRePass" placeholder="Vui lòng nhập lại mật khẩu" required="" />
</div>
</div>
</fieldset>
</div>
<div class="pull-right">
  
    <button type="submit" class="btn btn-success">Thêm</button>
    <a href="{!! URL::route('user.pages.home')!!}" class="btn btn-default">Trở về</a>
</div>
</form>
<div class="clearfix"></div>
<br>
</div>
</div>
</div>
</section>
</div>
@endsection