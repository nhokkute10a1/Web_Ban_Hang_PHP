@extends('admin.master')
@section('controller','Loại Sản Phẩm')
@section('action','Danh sách')
@section('content')

<!-- /.col-lg-12 -->
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Tên</th>
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
            <td>{!! $item["TenLoai"] !!} </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacNhanXoa('Bạn có thật sự muốn xóa không?')" href="{!! URL::route('admin.cate.getDelete',$item['id'])!!} "> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getEdit',$item['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection()