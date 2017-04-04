 @extends('admin.master')
 @section('controller','Nhà Sản Xuất')
 @section('action','Thêm')
 @section('content')

 <div class="col-lg-7" style="padding-bottom:120px">
  @include('admin.blocks.error')
  <form action="{!! route('admin.producer.getAdd')!!}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token()!!}">
    <div class="form-group">
        <label>Tên nhà sản xuất</label>
        <input class="form-control" name="txtTenNSX" placeholder="Nhập tên nhà sản xuất" required="" />
    </div>
    <div class="form-group">
        <label>Địa chỉ</label>
        <input class="form-control" name="txtDiaChi" placeholder="Nhập địa chỉ" required="" />
    </div>
    <div class="form-group">
        <label>Sô điện thoại</label>
        <input class="form-control" name="txtSDT" placeholder="Nhập số điện thoại" required="" />
    </div>
    <button type="submit" class="btn btn-success">Thêm</button>
    <a href="{!! URL::route('admin.producer.list')!!}" class="btn btn-default">Trở về</a>
    <form>
    </div>
</div>


@endsection()