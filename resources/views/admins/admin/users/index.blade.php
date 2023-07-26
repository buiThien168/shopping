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
    <script src="{{ asset('admin_assest/main.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admins.partials.content-header', [
            'name' => 'User',
            'key' => 'List',
        ])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('user.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $users)
                                    <tr>
                                        <th scope="row">{{ $users->id }}</th>
                                        <td>{{ $users->email }}</td>
                                        <td>{{ $users->password }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', ['id' => $users->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{ route('user.delete', ['id' => $users->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $user->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
