
<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu">
      <li><a class="active"  href="{!! url('/') !!}">Trang chủ</a>
      </li>

      <li><a href="">Sản Phẩm</a>
        <div>
          <ul>
            <?php 
            $menu =DB::table('LoaiSanPham')->get();
            ?>
            @foreach($menu as $item)
              <li><a href="{!! URL('loai-san-pham',[$item->id,$item->TenLoai]) !!}">{!! $item->TenLoai !!}</a></li>
            @endforeach
          </ul>
        </div>
      </li>
      <li><a  href="">Nhà Sản Xuất</a>
        <div>
          <ul>
            <?php 
            $menu =DB::table('NhaSanXuat')->get();
            ?>
            @foreach($menu as $item)
            <li><a href="{!! URL('nha-san-xuat',[$item->id,$item->TenNhaSanXuat]) !!}">{!! $item->TenNhaSanXuat !!}</a></li>
            @endforeach
          </ul>
        </div>
      </li>
      <li><a href="{!! url('lienhe')!!}">Liên Hệ</a>
      </li>
      <li><a href="{!!url('gioithieu')!!}">Giới Thiệu</a>
      </li>
      <li><a href="{!! url('lien-he') !!}">Góp ý kiến</a>
      </li>         
    </ul>
  </nav>
</div>