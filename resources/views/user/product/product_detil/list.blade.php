@extends('user.layouts.user')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        .swiper-button-prev:after,
        .swiper-button-next:after {
            background: none repeat scroll 0 0 #FE980F;
            color: #FFFFFF;
            font-size: 10px;
            padding: 4px 5px;
            margin-top: 10px
        }

        .swiper-button-lock {
            display: block;
        }
    </style>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('user.partials.siderbar')
                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ $product->feature_image_path }}" alt="" />
                                <h3>ZOOM</h3>
                            </div>

                            <div id="" class="swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($product->productImages as $key => $ItemRecomment)
                                        <div class=" swiper-slide">
                                            <div class="">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{ $ItemRecomment->image_path }}" alt="" />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                {{-- <img src="{{ $product->feature_image_path }}" class="newarrival" alt="" /> --}}
                                <h2>{{ $product->name }}</h2>
                                <p>Web ID: {{ $product->id }}</p>
                                <span>
                                    <span>US {{ $product->price }}</span>
                                    <form action="{{ route('order.store', ['id' => $product->id]) }}" method="post">
                                        @csrf
                                        <label>Quantity:</label>
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="number" name="count_product" value="1" />
                                        <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </form>
                                </span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> E-SHOPPER</p>
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->

                    <div class="category-tab shop-details-tab">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#details" data-toggle="tab">Details</a></li>
                                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="details">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery4.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="companyprofile">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery4.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tag">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery4.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade active in" id="reviews">
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <p><b>Write Your Review</b></p>

                                    <form action="#">
                                        <span>
                                            <input type="text" placeholder="Your Name" />
                                            <input type="email" placeholder="Email Address" />
                                        </span>
                                        <textarea name=""></textarea>
                                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                        <button type="button" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/category-tab-->



                    @include('user.home.components.recomment_product')
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            slidesPerView: 3,
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    </script>
@endsection
