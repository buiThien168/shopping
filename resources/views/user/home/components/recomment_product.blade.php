<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="" class="swiper">
        <div class="swiper-wrapper">
            @foreach ($productsRecomment as $key => $ItemRecomment)
                <div class=" swiper-slide">
                    <div class="">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ $ItemRecomment->feature_image_path }}" alt="" />
                                    <h2>{{ number_format($ItemRecomment->price) }}</h2>
                                    <p>{{ $ItemRecomment->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
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
