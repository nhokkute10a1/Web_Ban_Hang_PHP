@extends('admin.master')
@section('controller','Tài Khoản')
@section('action','Thêm')
@section('content')
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token()!!}">
        <div class="form-group">
            <label>Tài khoản</label>
            <input class="form-control" name="txtUser" value="{!! old('txtUser',isset($data) ? $data['name']:null ) !!}" disabled="" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="txtEmail" value="{!! old('txtEmail',isset($data) ? $data['email']:null ) !!}" />
        </div>
        <div class="form-group">
            <label>Họ</label>
            <input type="text" class="form-control" name="txtHo" value="{!! old('txtHo',isset($data) ? $data['Ho']:null ) !!}" />
        </div>
        <div class="form-group">
            <label>Tên</label>
            <input type="text" class="form-control" name="txtTen" value="{!! old('txtTen',isset($data) ? $data['Ten']:null ) !!}" />
        </div>
        <div class="form-group">
            <label>Địa Chỉ</label>
            <input type="text" class="form-control" name="txtDiaChi" value="{!! old('txtDiaChi',isset($data) ? $data['DiaChi']:null ) !!}" />
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" name="txtSDT" value="{!! old('txtSDT',isset($data) ? $data['SDT']:null ) !!}" />
        </div>
        @if(Auth::user()->id != $id)
        <div class="form-group">
            <label>Quyền</label>
            <label class="radio-inline">
                <input name="rdoLevel" value="1" checked="" type="radio"
                @if($data['level']==1)
                    checked="checked"
                @endif
                >Admin
                
            </label>
            <label class="radio-inline">
                <input name="rdoLevel" value="2" type="radio"
                @if($data['level']==2)
                    checked="checked"
                @endif
                >Member

            </label>
        </div>
        @endif
        <div class="form-group">
            <label>Mật Khẩu</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Vui lòng nhập mật khẩu"/>
        </div>
        <div class="form-group">
            <label>Mật Khẩu Nhập Lại</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Vui lòng nhập lại mật khẩu"  />
        </div>
        
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{!! URL::route('admin.user.list')!!}" class="btn btn-default">Trở về</a>
        <form>
        </div>
    </div>
    @endsection()