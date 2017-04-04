 @extends('admin.master')
 @section('controller','Tài Khoản')
 @section('action','Danh Sách')
 @section('content')

 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Tài khoản</th>
            <th>Email</th>
           {{--  @for($i=0;$i<=1;$i++)
                <th>Quyền {!! $i+1!!}</th>
            @endfor --}}
            <th>Họ</th>
            <th>Tên</th>
            <th>Địa Chỉ</th>
            <th>Số điện thoại</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=0 ?>
        @foreach($user as $item)
        <?php $stt= $stt+1 ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt!!} </td>
            <td>{!! $item["name"] !!} </td>
            <td>{!! $item["email"] !!} </td>
            <td>{!! $item["Ho"] !!} </td>
            <td>{!! $item["Ten"] !!} </td>
            <td>{!! $item["DiaChi"] !!} </td>
            <td>{!! $item["SDT"] !!} </td>
            <td>
                @if( $item["id"]  ==1 && $item["level"] ==1)
                   SupperAdmin 
                @elseif( $item["level"] ==1 )
                    Admin
                @else
                    Member
                @endif
            </td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacNhanXoa('Bạn có thật sự muốn xóa không?')" href="{!! URL::route('admin.user.getDelete',$item['id'])!!} "> Delete</a>
        </td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item['id']) !!}">Edit</a></td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection()      