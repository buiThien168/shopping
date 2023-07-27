@extends('user.layouts.user')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endsection
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <input type="hidden" name="_token" value="">
                    <div class="col-sm-12 clearfix">
                        <div class="container">
                            <div class="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Shopping Cart</li>
                                </ol>
                            </div>
                            <div class="bill-to">
                                <p>Thông tin khách hàng</p>

                                <div class="form-one">
                                    <input type="text" name="fullName" value="{{ old('fullName') }}"
                                        placeholder="Họ và Tên *">
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email *">
                                    <input type="text" name="address" value="{{ old('address') }}"
                                        placeholder="Địa Chỉ *">
                                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}"
                                        placeholder="Số điện thoại *">
                                    <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                </div>
                                <div class="form-two">
                                    <textarea name="note" value="" placeholder="Ghi chú" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <section id="cart_items">
                            <div class="container">
                                <div class="table-responsive cart_info">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr class="cart_menu">
                                                <td class="image">Ảnh minh họa</td>
                                                <td class="description">Tên sản phẩm</td>
                                                <td class="price">Giá</td>
                                                <td class="quantity">Số lượng</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($orderItems))
                                                @foreach ($orderItems as $item)
                                                    <tr>
                                                        <td class="cart_product" style="margin: 0px">
                                                            <img width="100px" height="100px"
                                                                src="{{ asset($item->products_img) }}" alt="" />
                                                        </td>
                                                        <td class="cart_description">
                                                            <h4><a href="">{{ $item->name }}</a></h4>

                                                            <p>Web ID: {{ $item->id }}</p>
                                                        </td>
                                                        <td class="cart_price">
                                                            <p>{{ number_format($item->products_price) }} VNĐ</p>
                                                        </td>
                                                        <td class="cart_quantity">
                                                            {{ $item->count_product }}
                                                        </td>
                                                        {{-- <td class="cart_total">
                                                        <p class="cart_total_price">
                                                            {{ number_format($item->subtotal) }}
                                                            VNĐ</p>
                                                    </td> --}}
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="4">&nbsp;
                                                        <span>
                                                            <a class="btn btn-default update"
                                                                href="{{ route('cart.user') }}">Quay về giỏ
                                                                hàng</a>
                                                        </span>

                                                    </td>
                                                    <td colspan="2">
                                                        <table class="table table-condensed total-result">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Tổng :</td>
                                                                    <td><span>{{ $total }} VNĐ</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    </td>
                                                                    <td>
                                                                        <button type="submit"
                                                                            class="btn btn-default check_out"
                                                                            href="">Gửi đơn
                                                                            hàng</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>You have no items in the shopping cart</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">&nbsp;
                                                        <a class="btn btn-default update" href="{{ url('/') }}">Mua
                                                            hàng</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        <!--/#cart_items-->
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
@endsection
