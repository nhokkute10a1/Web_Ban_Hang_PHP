 @extends('admin.master')
 @section('controller','Tài Khoản')
 @section('action','Thêm')
 @section('content')
 <!-- /.col-lg-12 -->
 <div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="{!!url('/admin/user/add')  !!}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token()!!}">
        <div class="form-group">
            <label>Tài khoản</label>
            <input class="form-control" name="txtUser" placeholder="Vui lòng nhập tài khoản" required="" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="txtEmail" placeholder="Vui lòng nhập email" required="" />
        </div>
        <div class="form-group">
            <label>Họ</label>
            <input type="text" class="form-control" name="txtHo" placeholder="Vui lòng nhập họ" required="" />
        </div>
        <div class="form-group">
            <label>Tên</label>
            <input type="text" class="form-control" name="txtTen" placeholder="Vui lòng nhập tên" required="" />
        </div>
        <div class="form-group">
            <label>Địa Chỉ</label>
            <input type="text" class="form-control" name="txtDiaChi" placeholder="Vui lòng nhập địa chỉ" required="" />
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" name="txtSDT" placeholder="Vui lòng nhập số điện thoại" required="" />
        </div>
        <div class="form-group">
            <label>Quyền</label>
            <label class="radio-inline">
                <input name="rdoLevel" value="1" checked="" type="radio">Admin
            </label>
            <label class="radio-inline">
                <input name="rdoLevel" value="2" type="radio">Member
            </label>
        </div>
        <div class="form-group">
            <label>Mật Khẩu</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Vui lòng nhập mật khẩu"  required=""/>
        </div>
        <div class="form-group">
            <label>Mật Khẩu Nhập Lại</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Vui lòng nhập lại mật khẩu" required="" />
        </div>
        
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{!! URL::route('admin.user.list')!!}" class="btn btn-default">Trở về</a>
        <form>
        </div>
    </div>
</div>>
@endsection()       