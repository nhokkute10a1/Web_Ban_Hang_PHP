 @extends('admin.master')
 @section('controller','Loại Sản Phẩm')
 @section('action','Sửa')
 @section('content')

 <div class="col-lg-7" style="padding-bottom:120px">
     @include('admin.blocks.error')
    <form action="" method="POST">
     <input type="hidden" name="_token" value="{!! csrf_token()!!}">
     <div class="form-group">
        <label>Tên Loại</label>
        <input class="form-control" name="txtTenLoai" placeholder="Nhập tên loại" value="{!! old('txtTenLoai',isset($data) ? $data['TenLoai']:null ) !!}" />
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{!! URL::route('admin.cate.list')!!}" class="btn btn-default">Trở về</a>
    <form>
    </div>
</div>
<!-- /.row -->
</div>
@endsection()