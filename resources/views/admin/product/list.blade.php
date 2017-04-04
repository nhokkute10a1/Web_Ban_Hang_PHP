 @extends('admin.master')
 @section('content')

 <!-- /.col-lg-12 -->
 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
           <th>ID</th>
           <th>Mã loại</th>
           <th>Mã NSX</th>
           <th>Tên sản phẩm</th>
           <th>Giá bán</th>
           <th>Mô tả</th>
           <th>Ngày cập nhập</th>
           <th>Hình ảnh</th>
           <th>Số lượng</th>
            <th>VIP</th>
           <th>Delete</th>
           <th>Edit</th>
       </tr>
   </thead>
   <tbody>
        <?php $stt=0 ?>
        @foreach($data as $item)
        <?php $stt= $stt+1 ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt!!} </td>
            <td>
                <?php $idLoai=DB::table('LoaiSanPham')->where('id',$item["IdLoai"])->first(); ?>
                    @if(!empty($idLoai->TenLoai))
                        {!!$idLoai->TenLoai !!}
                    @endif
            </td>
            {{-- <td>{!! $item["IdLoai"] !!}</td> --}}
            {{-- <td>{!! $item["IdNsx"] !!}</td> --}}
            <td>
                <?php $idNSX=DB::table('NhaSanXuat')->where('id',$item["IdNsx"])->first(); ?>
                    @if(!empty($idNSX->TenNhaSanXuat))
                        {!!$idNSX->TenNhaSanXuat !!}
                    @endif
            </td>
            <td>{!! $item["TenSanPham"] !!}</td>
            <td>{!! number_format($item["GiaBan"],3)  !!} VNĐ</td>
            <td>{!! $item["Mota"] !!}</td>
            <td>{!! $item["NgayCapNhap"] !!}</td>
            <td><img src="{!! asset('resources/upload/'.$item['HinhAnh']) !!}" width="150px" /></td>
            {{-- <td>{!! $item["HinhAnh"] !!}</td> --}}
            <td>{!! $item["SoLuong"] !!}</td>
            <td>{!! $item["Vip"] !!}</td>
         
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacNhanXoa('Bạn có thật sự muốn xóa không?')" href="{!! URL::route('admin.product.getDelete',$item['id'])!!} "> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit',$item['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- /.container-fluid -->
@endsection()