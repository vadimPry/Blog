@extends('admin.layouts.main')
@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">
                        <a style="text-decoration: none; color: #3d444b" href="{{ route('admin.post.index') }}">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                        Add post
                    </h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                        <li class="breadcrumb-item active">Create post</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div>
        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2 w-25">
                <input type="text" name="title" class="form-control" placeholder="post" value="{{ old('title') }}">
            </div>
            @error('title')
            <div class="text-danger fs-1">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <textarea id="summernote" name="content">
                    {{ old('content') }}
                </textarea>
            </div>
            @error('content')
            <div class="text-danger fs-1">{{ $message }}</div>
            @enderror


            {{--<<__Main_Image__>>--}}
            <div class="form-group w-50">
                <label for="exampleInputFile">Main image input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="main_image">
                        <label class="custom-file-label">Choose main image</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('main_image')
                <div class="text-danger fs-1">{{ $message }}</div>
                @enderror
            </div>

            {{--<<__Preview_Image__>>--}}
            <div class="form-group w-50">
                <label for="exampleInputFile">Preview image input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="preview_image">
                        <label class="custom-file-label">Choose preview image</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('preview_image')
                <div class="text-danger fs-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-50">
                <!-- select -->
                <div class="form-group">
                    <label>Select category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id') ? 'selected' : '' }}
                            >{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <div class="text-danger fs-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Select tags</label>
                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a tags" style="width: 100%;">
                    @foreach($tags as $tag)
                        <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                                value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
                @error('tags_ids')
                <div class="text-danger fs-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary mt-1" value="Add">
            </div>
        </form>
    </div><!-- /.row -->

@endsection
