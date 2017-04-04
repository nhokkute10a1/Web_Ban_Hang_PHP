@extends('user.master')
@section('description','Đây là trang chủ')
@section('content')

<!-- Slider Start-->
  @include('user.block.slider')
  <!-- Slider End-->

  <!-- Section Start-->
  @include('user.block.orderdetail')
  <!-- Section End-->
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Sản phẩm bán chạy</span><span class="subtext"> See Our Most featured Products</span></h1>
    <ul class="thumbnails">
    <?php
        $product = DB::table('sanpham')->select('id','TenSanPham','GiaBan','HinhAnh')->where('Vip',1)->get();
    ?>
    @foreach( $product as $item)
      <li class="span3">
        <a class="prdocutname" href="{!! url('chi_tiet_san_pham',[$item->id,$item->TenSanPham])!!}">{!! $item->TenSanPham !!}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="{!! url('chi_tiet_san_pham',[$item->id,$item->TenSanPham])!!}"><img alt="" src="{!! asset('resources/upload/'.$item->HinhAnh )!!}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->TenSanPham]) !!}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{!! $item->GiaBan !!}</div>
              <div class="priceold"></div>
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Sản phẩm mới</span><span class="subtext"> See Our  Latest Products</span></h1>
    <ul class="thumbnails">
    <?php
        $product = DB::table('sanpham')->select('id','TenSanPham','GiaBan','HinhAnh')->orderBy('id','DESC')->get();
    ?>
    @foreach($product as $item)
      <li class="span3">
        <a class="prdocutname" href="{!! url('chi_tiet_san_pham',[$item->id,$item->TenSanPham])!!}">{!! $item->TenSanPham !!}</a>
        <div class="thumbnail">
          <a href="{!! url('chi_tiet_san_pham',[$item->id,$item->TenSanPham])!!}"><img alt="" src="{!! asset('resources/upload/'.$item->HinhAnh )!!}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->TenSanPham]) !!}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{!! $item->GiaBan !!}</div>
              <div class="priceold"></div>
            </div>
          </div>
        </div>
      </li>
     @endforeach
    </ul>
  </div>
</section>
@endsection