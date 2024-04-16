@extends('personal.layouts.main')
@section('personal')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <a style="text-decoration: none; color: #3d444b" href="{{ route('personal.comment.index') }}">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                        Comments update
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Comments</a></li>
                        <li class="breadcrumb-item active">Comment update</li>
                    </ol>
                </div>
            </div><!-- /.row -->
            <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="mt-3">
                @csrf
                @method('PATCH')
                <div class="mb-1">
                    <input type="text" name="comment" class="form-control" placeholder="comment" value="{{ $comment->comment }}">

                </div>
                @error('comment')
                <div class="text-danger fs-1">{{ $message }}</div>
                @enderror
                <input type="submit" class="btn btn-primary mt-1" value="Edit">
            </form>
        </div><!-- /.container-fluid -->
    </div>


@endsection
