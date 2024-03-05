@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">
                        <a style="text-decoration: none; color: #3d444b" href="{{ route('admin.tag.index') }}">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                        Add tag
                    </h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
                <form action="{{ route('admin.tag.store') }}" method="POST" class="mt-3">
                    @csrf
                    <div class="mb-1">
                        <input type="text" name="title" class="form-control" placeholder="tag">
                    </div>
                    @error('title')
                        <div class="text-danger fs-1">{{ $message }}</div>
                    @enderror
                    <input type="submit" class="btn btn-primary mt-1" value="Add">
                </form>

            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
