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
              font-size: 20px;
              padding: 4px 10px;
          }
      </style>
  @endsection
  @section('content')
      <!-- Content Header (Page header) -->
      @include('user.home.components.slider')
      <section>
          <div class="container">
              <div class="row">
                  @include('user.partials.siderbar')
                  <div class="col-sm-9 padding-right">
                      <div class="features_items">
                          <!--features_items-->
                          @include('user.home.components.feature_product')
                          <!--features_items-->
                          @include('user.home.components.category_tab')

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
