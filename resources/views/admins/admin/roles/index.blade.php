@extends('admins.layouts.admin')
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
        @include('admins.partials.content-header', [
            'name' => 'Roles',
            'key' => 'List',
        ])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên vai trò</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role as $roleItem)
                                    <tr>
                                        <th scope="row">{{ $roleItem->id }}</th>
                                        <td>{{ $roleItem->name }}</td>
                                        <td>{{ $roleItem->display_name }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit', ['id' => $roleItem->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href=""
                                                data-url="{{ route('roles.delete', ['id' => $roleItem->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $role->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
