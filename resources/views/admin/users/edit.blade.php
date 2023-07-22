@extends('layouts.admin')
@section('title')
    <title>Slider</title>
@endsection
@section('css')
    <link href="{{ asset('vendor/select2/css_select2.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('admin_assest/slider/add/add.css') }}" rel="stylesheet" /> --}}
@endsection
@section('js')
    <script src="{{ asset('vendor/select2/js_select2.min.js') }}"></script>
    <script src="{{ asset('admin_assest/user/add/add.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'User',
            'key' => 'Edit',
        ])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control " name="name" placeholder="Nhập tên "
                                    value="{{ $user->name }}">

                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control " name="email" placeholder="Nhập Email"
                                    value="{{ $user->email }}">

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control " name="password" placeholder="Nhập Password"
                                    value="{{ $user->password }}">

                            </div>
                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2_init " multiple>
                                    <option value=""></option>
                                    @foreach ($role as $roles)
                                        <option {{ $roleOfUser->contains('id', $roles->id) ? 'selected' : '' }}
                                            value="{{ $roles->id }}">
                                            {{ $roles->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
