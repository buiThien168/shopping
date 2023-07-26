@extends('admins.layouts.admin')
@section('title')
    <title>Product</title>
@endsection
@section('css')
    <link href="{{ asset('vendor/select2/css_select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assest/product/add/add.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admins.partials.content-header', [
            'name' => 'Product',
            'key' => 'Edit',
        ])
        <!-- Main content -->
        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input value="{{ $product->name }}" type="text" class="form-control" name="name"
                                    placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input value="{{ $product->price }}" type="text" class="form-control" name="price"
                                    placeholder="Nhập giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Chọn hình ảnh</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                                <div class="col-md-8 container_image_detail">
                                    <div class="row">
                                        <img src="{{ $product->feature_image_path }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chọn hình ảnh chi tiết</label>
                                <input multiple type="file" class="form-control-file" name="image_path[]">
                                <div class="col-md-8 container_image_detail">
                                    <div class="row">
                                        @foreach ($product->productImages as $product_imageItem)
                                            <div class="col-md-3">
                                                <img class="image_detail_upload" src="{{ $product_imageItem->image_path }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục cha</label>
                                <select class="form-control select2_init" name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn tags sản phẩm</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                    @foreach ($product->tags as $tagsItem)
                                        <option value="{{ $tagsItem->name }}" selected>{{ $tagsItem->name }}></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control tinymce_editor_init" name="contents" rows="8">{{ $product->content }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </form>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script src="{{ asset('vendor/select2/js_select2.min.js') }}"></script>
    <script src="{{ asset('admin_assest/product/add/add.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
