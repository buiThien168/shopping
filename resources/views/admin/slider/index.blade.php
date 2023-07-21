@extends('layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin_assest/slider/index/list.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendor/sweetalert/sweetalert.js') }}"></script>
    <script src="{{ asset('admin_assest/product/index/list.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Slider',
            'key' => 'List',
        ])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên slider</th>
                                    <th scope="col">Desciption</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider as $sliderItem)
                                    <tr>
                                        <th scope="row">{{ $sliderItem->id }}</th>
                                        <td>{{ $sliderItem->name }}</td>
                                        <td>{{ $sliderItem->description }}</td>
                                        <td><img class="product_images" src="{{ $sliderItem->image_path }}" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ route('slider.edit', ['id' => $sliderItem->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href=""
                                                data-url="{{ route('slider.delete', ['id' => $sliderItem->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $slider->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
