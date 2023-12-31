@extends('admins.layouts.admin')
@section('title')
    <title>Setting</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admins.partials.content-header', [
            'name' => 'Setting',
            'key' => 'Edit',
        ])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text" class="form-control @error('config_key') is-invalid @enderror"
                                    name="config_key" placeholder="Nhập tên config key" value="{{ $setting->config_key }}">
                                @error('config_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($setting->type == 'Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input type="text" class="form-control @error('config_value') is-invalid @enderror"
                                        name="config_value" placeholder="Nhập tên config value"
                                        value="{{ $setting->config_value }}">
                                    @error('config_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif ($setting->type == 'Textarea')
                                <div class="form-group">
                                    <textarea name="config_value" class="form-control @error('config_value') is-invalid @enderror" rows="5"> {{ $setting->config_value }}</textarea>
                                    @error('config_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Update</button>
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
