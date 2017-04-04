@extends('user.master')
@section('description','Đây là trang thanh toan')
@section('content')
    <div id="maincontainer">
        <section id="product">
            <div class="container">
                <!--  breadcrumb -->
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Home</a>
                        <span class="divider">/</span>
                    </li>
                    <li class="active"> Shopping Cart</li>
                </ul>
                <!--thong tin dat-->
                <div class="pull-right">
                    <div class="col-xs-8">
                        <form action="{!! route('user.pages.getThanhToan') !!}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                            <table>
                                <tr>
                                    <td>
                                        <label for="" style="color: black">Tên: </label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="txtID" value="{!! Auth::user()->id !!}">
                                        <input type="text" name="txtTen" value="{!! Auth::user()->Ten !!}" disabled>
                                    </td>
                                    <br>
                                </tr>
                                <tr>
                                   <td> <label for="" style="color: black">Ngày đặt: </label></td>
                                    <td>
                                        <input class="form-control" type="date"  name="txtNgayDat" placeholder="Nhập Ngày" required=""  id="datePicker" disabled />
                                    </td><br>
                                </tr>
                                <tr>
                                  <td>  <label for="" style="color: black">Ngày giao: </label></td>
                                    <td>
                                        <input class="form-control" type="date"  name="txtNgayGiao" placeholder="Nhập Ngày" required=""   />
                                    </td><br>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> <button type="submit" class="btn btn-success">Đồng ý thanh toán</button></td>
                                </tr>
                            </table>
                        </form>

                    </div>
                </div>
                <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
                <!-- Cart-->
                <h4>Có {{ $content->count() }} sản phẩm trong giỏ hàng của bạn</h4>
                <div class="cart-info">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th class="image">Image</th>
                            <th class="name">Product Name</th>
                            <!-- <th class="model">Description</th>-->
                            <th class="quantity">Qty</th>
                            <th class="price">Unit Price</th>
                            <th class="total">Total</th>

                        </tr>
                        <form method="POST" action="">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                            @foreach($content as $item)
                                <tr>
                                    <td class="image"><a href="#"><img title="product" alt="product" src="{!! asset('resources/upload/'.$item->options->hinh) !!}" height="50" width="50"></a></td>
                                    <td  class="name"><a href="#">{!! $item->name !!}</a></td>
                                <!--<td class="model">{!! $item->Mota!!}</td>-->
                                    <td class="quantity">
                                        <input disabled class="qty" type="text" size="1" value="{!! $item->qty !!}" name="quantity[40]" class="span1">

                                    </td>
                                    <td class="price"><input type="hidden" name="txtGiaBan" value="{!! $item->price !!}"> {!! number_format($item->price,0) !!}</td>
                                    <td class="total">{!! number_format($item->price * $item->qty,0,",",".") !!}</td>

                                </tr>
                            @endforeach
                        </form>

                    </table>
                </div>
                <div class="container">
                    <div class="pull-right">
                        <div class="span4 pull-right">
                            <table class="table table-striped table-bordered ">
                                <tr>
                                    <td><span class="extra bold totalamout">Số lượng :</span></td>
                                    <td><input type="hidden" name="txtSoLuong" value="{!! $count !!}"> <span class="bold totalamout">{!! $count !!}</span></td>
                                </tr>

                                <tr>
                                    <td><span class="extra bold totalamout">Tổng tiền :</span></td>
                                    <td><input type="hidden" name="txtThanhTien" value="{!! $total !!}"> <span class="bold totalamout">{!! $total !!}</span></td>
                                </tr>
                            </table>
                            {{-- <input type="submit" value="CheckOut" class="btn btn-orange pull-right">
                            <input type="submit" value="Continue Shopping" > --}}

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
