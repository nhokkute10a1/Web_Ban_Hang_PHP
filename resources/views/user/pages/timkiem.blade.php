@extends('user.master')
@section('description','Loại sản phẩm')
@section('content')
<section id="product">
  <div class="container">
   <!--  breadcrumb -->  
   <ul class="breadcrumb">
    <li>
      <a href="#">Home</a>
      <span class="divider">/</span>
    </li>
    <li class="active">Tìm Kiếm từ khóa :{{ $tukhoa }} </li>
  </ul>
  <div class="row">        
    <!-- Sidebar Start-->
    <aside class="span3">
     <!-- Category-->  
     <div class="sidewidt">
      <h2 class="heading2"><span>Categories</span></h2>
      <ul class="nav nav-list categories">
        <?php 
        $menu =DB::table('LoaiSanPham')->get();
        ?>
        @foreach($menu as $item)
        <li><a href="{!! URL('loai-san-pham',[$item->id,$item->TenLoai]) !!}">{!! $item->TenLoai !!}</a></li>
        @endforeach
      </ul>
    </div>
  </aside>
  <!-- Sidebar End-->
  <!-- Category-->
  <div class="span9">          
    <!-- Category Products-->
    <section id="category">
      <div class="row">
        <div class="span9">
         <!-- Category-->
         <section id="categorygrid">
          <ul class="thumbnails grid">
            @foreach($sanpham as $item)
            <li class="span3">
              <a class="prdocutname" href="{!! url('chi_tiet_san_pham',[$item->id,$item->TenSanPham])!!}">{!! $item->TenSanPham !!}</a>
              <div class="thumbnail">
                <span class="sale tooltip-test">Sale</span>
                <a href="{!! url('chi_tiet_san_pham',[$item->id,$item->TenSanPham])!!}"><img alt="" src="{!!asset('resources/upload/'.$item->HinhAnh) !!}" width="300px" height="350px"></a>
                <div class="pricetag">
                  <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->TenSanPham])!!}" class="productcart">ADD TO CART</a>
                  <div class="price">
                    <div class="pricenew">{!! $item->GiaBan !!}</div>
                    <div class="priceold">$5000.00</div>
                  </div>
                </div>
              </div>
            </li>
            @endforeach         
          </ul>
          <div class="pagination pull-right">
            <ul>
              @if($sanpham->currentPage() != 1)
              <li><a href="{!! str_replace('/?','?',$sanpham->url($sanpham->currentPage() - 1)) !!}">Prev</a>
               @endif
             </li>
             @for( $i = 1; $i <= $sanpham->lastPage(); $i = $i+1)
             <li class="{!!($sanpham->currentPage() == $i) ? 'active' : '' !!}">
              <a href="{!! str_replace('/?','?',$sanpham->url($i)) !!}">{!! $i !!}</a>
            </li>
            @endfor
            @if($sanpham->currentPage() != $sanpham->lastPage())
            <li><a href="{!!str_replace('/?','?',$sanpham->url($sanpham->currentPage() + 1)) !!}">Next</a>
            </li>
            @endif
          </ul>
        </div>
      </section>
    </div>
  </div>
</section>
</div>
</div>
</section>
</div>
</div>
</div>
</section>

@endsection