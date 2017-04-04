 @extends('admin.master')
 @section('controller','Loại Sản Phẩm')
 @section('action','Thêm')
 @section('content')
 
 <div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="{!! route('admin.cate.getAdd')!!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token()!!}">
        <div class="form-group">
            <label>Tên Loại</label>
            <input class="form-control" name="txtTenLoai" placeholder="Nhập tên loại" />
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{!! URL::route('admin.cate.list')!!}" class="btn btn-default">Trở về</a>
        <form>
        </div>
    </div>
    <!-- /.row -->
</div>

@endsection()