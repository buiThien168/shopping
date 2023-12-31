@extends('admins.layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link href="{{ asset('admin_assest/settings/add/add.css') }}" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{ asset('vendor/sweetalert/sweetalert.js') }}"></script>
    <script src="{{ asset('admin_assest/main.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admins.partials.content-header', [
            'name' => 'Setting',
            'key' => 'List',
        ])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Add setting
                            </button>
                            <div class="dropdown-menu">
                                <li><a href="{{ route('settings.create') . '?type=Text' }}">Text</a></li>
                                <li><a href="{{ route('settings.create') . '?type=Textarea' }}">Textarea</a></li>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Config key</th>
                                    <th scope="col">Config value</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($setting as $settings)
                                    <tr>
                                        <th scope="row">{{ $settings->id }}</th>
                                        <th scope="row">{{ $settings->config_key }}</th>
                                        <th scope="row">{{ $settings->config_value }}</th>
                                        <th scope="row">{{ $settings->type }}</th>
                                        <td>
                                            <a href="{{ route('settings.edit', ['id' => $settings->id]) . request()->type }}"
                                                class="btn btn-default">Edit</a>
                                            <a href=""
                                                data-url="{{ route('settings.delete', ['id' => $settings->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $setting->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
