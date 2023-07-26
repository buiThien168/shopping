@extends('admins.layouts.admin')
@section('title')
    <title>Add Product</title>
@endsection
@section('css')
    <link href="{{ asset('admin_assest/product/index/list.css') }}" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{ asset('vendor/sweetalert/sweetalert.js') }}"></script>
    <script src="{{ asset('admin_assest/product/index/list.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admins.partials.content-header', [
            'name' => 'Product',
            'key' => 'List',
        ])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá sản phẩm</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $productItem)
                                    <tr>
                                        <th scope="row">{{ $productItem->id }}</th>
                                        <td>{{ $productItem->name }}</td>
                                        <td>{{ number_format($productItem->price) }}</td>
                                        <td><img class="product_images" src="{{ $productItem->feature_image_path }}"
                                                alt=""></td>
                                        {{-- <td>{{ optional($productItem->category)->name }}</td> --}}
                                        <td>{{ $productItem->category_name }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', ['id' => $productItem->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="{{ route('product.delete', ['id' => $productItem->id]) }}"
                                                data-url="{{ route('product.delete', ['id' => $productItem->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
