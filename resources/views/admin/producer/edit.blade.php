 @extends('admin.master')
 @section('controller','Loại Sản Phẩm')
 @section('action','Sửa')
 @section('content')

<div class="col-lg-7" style="padding-bottom:120px">
  @include('admin.blocks.error')
  <form action="" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token()!!}">
    <div class="form-group">
        <label>Tên nhà sản xuất</label>
        <input class="form-control" name="txtTenNSX" placeholder="Nhập tên nhà sản xuất" required=""
            value="{!! old('txtTenNSX',isset($data) ? $data['TenNhaSanXuat']:null ) !!} "/>
    </div>
    <div class="form-group">
        <label>Địa chỉ</label>
        <input class="form-control" name="txtDiaChi" placeholder="Nhập địa chỉ" required=""
             value="{!! old('txtDiaChi',isset($data) ? $data['DiaChi']:null ) !!} "/>
    </div>
    <div class="form-group">
        <label>Sô điện thoại</label>
        <input class="form-control" name="txtSDT" placeholder="Nhập số điện thoại" required=""
             value="{!! old('txtSDT',isset($data) ? $data['SDT']:null ) !!} "/>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{!! URL::route('admin.producer.list')!!}" class="btn btn-default">Trở về</a>
    <form>
    </div>
</div>

@endsection()