 @extends('admin.master')
 @section('controller','Sản Phẩm')
 @section('action','Thêm')
 @section('content')

 <!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="{!!url('/admin/product/add')  !!}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token()!!}">
        <div class="form-group">
            <label>Loại</label>
            <select class="form-control" name="checkLoai" required >
                <option value="">Vui lòng chọn</option>
               <?php id_Loai($idLoai);?>
            </select>
        </div>
        <div class="form-group">
            <label>Nhà sản xuất</label>
            <select class="form-control" name="checkNsx" required>
                <option value="">Vui lòng chọn</option>
                <?php id_NhaSanXuat($idNSX); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input class="form-control" name="txtTenSanPham" placeholder="Nhập tên sản phẩm"  required=""/>
        </div>
        <div class="form-group">
            <label>Giá bán</label>
            <input class="form-control" type="number" min="0" value="1" name="txtGiaBan" placeholder="Nhập Giá bán"  required=""/>
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" rows="3" name="txtMoTa"></textarea>
            <script type="text/javascript">ckeditor("txtMoTa")</script>
        </div>
        <div class="form-group">
            <label>Ngày cập nhập</label>
            <input class="form-control" type="date"  name="txtDate" placeholder="Nhập Ngày" required=""  id="datePicker" />
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="fImages"  required=""> 
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input class="form-control" type="number" min="0" value="1" name="txtSoLuong" placeholder="Nhập số lượng"  required=""/>
        </div>
        {{-- <div class="form-group">
            <label>Phân loại</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="" type="radio">Nữ
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" type="radio">Nam
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="3" type="radio">Cả 2
            </label>
        </div> --}}
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{!! URL::route('admin.product.list')!!}" class="btn btn-default">Trở về</a>
        <form>
        </div>
    </div>
    <!-- /.row -->
</div>
{{-- <!-- them nhiu hinh -->
<div class="col-md-1"></div>
<div class="col-md-4">
    @for($i=1;$i<=10;$i++)

    <div class="form-group">
        <label for="form-control"> Hình ảnh sản phẩm chi tiết{!!$i!!}</label>
        <input type="file" name="fProductDetail[]" >
    </div>
    @endfor
</div> --}}
@endsection()