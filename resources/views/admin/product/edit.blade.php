 @extends('admin.master')
 @section('controller','Sản Phẩm')
 @section('action','Sửa')
 @section('content')
<style>
    .img_curent{
        width: 150px;
    }
</style>

 <!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token()!!}">
        <div class="form-group">
            <label>Loại</label>
            <select class="form-control" name="checkLoai" required >
                <option value="">Vui lòng chọn</option>
               <?php id_Loai($idLoai,$data ["IdLoai"]); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nhà sản xuất</label>
            <select class="form-control" name="checkNsx" required>
                <option value="">Vui lòng chọn</option>
                <?php id_NhaSanXuat($idNSX,$data ["IdNsx"]); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input class="form-control" name="txtTenSanPham" placeholder="Nhập tên sản phẩm"  required="" value="{!! old('txtTenSanPham',isset($data)?$data['TenSanPham']:null) !!}" />
        </div>
        <div class="form-group">
            <label>Giá bán</label>
            <input class="form-control" type="number" name="txtGiaBan" placeholder="Nhập Giá bán"  required="" value="{!! old('txtGiaBan',isset($data)?$data['GiaBan']:null) !!}"/>
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" rows="3" name="txtMoTa" >{!! old('txtMoTa',isset($data)?$data['Mota']:null) !!}</textarea>
            <script type="text/javascript">ckeditor("txtMoTa")</script>
        </div>
        <div class="form-group">
            <label>Ngày cập nhập</label>
            <input class="form-control" type="date"  name="txtDate" placeholder="Nhập Ngày" required=""  id="datePicker" value="{!! old('txtDate',isset($data)?$data['NgayCapNhap']:null) !!}" />
        </div>
        <div class="form-group">
            <label>Hình ảnh hiện tại</label>
            <img src="{!! asset('resources/upload/'.$data['HinhAnh']) !!}" class="img_curent" /> 
            <input type="hidden" name="img_current" 
            value="{!! $data['HinhAnh'] !!}">
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="fImages"  > 
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input class="form-control" type="number" name="txtSoLuong" placeholder="Nhập số lượng"  required="" value="{!! old('txtSoLuong',isset($data)?$data['SoLuong']:null) !!}"/>
        </div>
        <div class="form-group">
            <label>VIP</label><label>Quyền</label>
            <label class="radio-inline">
                <input name="rdoLevel" value="0" checked="" type="radio"
                       @if($data['Vip']==0)
                       checked="checked"
                        @endif
                >Không
            </label>
            <label class="radio-inline">
                <input name="rdoLevel" value="1" type="radio"
                       @if($data['Vip']==1)
                       checked="checked"
                        @endif
                >Có
            </label>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{!! URL::route('admin.product.list')!!}" class="btn btn-default">Trở về</a>
        <form>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection()