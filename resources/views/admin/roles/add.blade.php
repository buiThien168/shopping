@extends('layouts.admin')
@section('title')
    <title>Slider</title>
@endsection
@section('css')
    <link href="{{ asset('vendor/select2/css_select2.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('admin_assest/slider/add/add.css') }}" rel="stylesheet" /> --}}
@endsection
@section('js')
    <script src="{{ asset('admin_assest/roles/add/add.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Roles',
            'key' => 'Add',
        ])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data" style="width:100%;">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control " name="name" placeholder="Nhập tên "
                                    value="{{ old('name') }}">

                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="display_name" class="form-control "rows="8"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="checkbox" class="checkall">
                                    <label>CheckAll</label>
                                </div>
                                @foreach ($permission as $permissionItem)
                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header" style="background-color: aquamarine;">
                                            <label>
                                                <input type="checkbox" class="checkbox_wrapper">
                                            </label>
                                            Module {{ $permissionItem->name }}
                                        </div>
                                        <div class="row">
                                            @foreach ($permissionItem->permissionChildrenr as $permissionChildrenrItem)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" name="permission_id[]"
                                                                class="checkbox_children"
                                                                value="{{ $permissionChildrenrItem->id }}">
                                                        </label>
                                                        {{ $permissionChildrenrItem->name }}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
