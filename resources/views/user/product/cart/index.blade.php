@extends('user.layouts.user')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ $item->products_img }}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $item->name }}</a></h4>
                                    <p>Web ID: {{ $item->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ $item->products_price }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">

                                        <input class="cart_quantity_input" type="number" name="quantity"
                                            value="{{ $item->count_product }}"
                                            data-price-per-unit="{{ $item->products_price }}" autocomplete="off"
                                            size="2">

                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" id="sourceElement">
                                        {{ $item->products_price * $item->count_product }} VND</p>
                                </td>

                                <td class="cart_delete">
                                    <a class="cart_quantity_delete"
                                        href="{{ route('cart.delete.user', ['id' => $item->id]) }}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$59</span></li>
                            <li>Number product <span>{{ $dem }}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span id="sourceElement">{{ $total }}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{ route('cart.update.user') }}">Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#do_action-->
@endsection
@section('js')
    <script src="admin_assest//user//cart//add.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Get references to the source and destination elements
        const sourceElement = document.getElementById('sourceElement');
        const destinationElement = document.getElementById('destinationElement');

        // Function to copy content from the <p> element to the <h> element
        function copyContent() {
            // Get the text content from the <p> element
            const content = sourceElement.textContent;

            // Set the text content to the <h> element
            destinationElement.textContent = content;
        }

        // Call the copyContent function to copy the content initially
        copyContent();
    </script>
@endsection
