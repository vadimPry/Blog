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
                            Edit post
                    </h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                        <li class="breadcrumb-item active">Post update</li>
                    </ol>
                </div><!-- /.col -->
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-1">
                        <input type="text" name="title" class="form-control" placeholder="post" value="{{ old('title') }}{{ $post->title }}">

                    </div>
                    @error('title')
                        <div class="text-danger fs-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <textarea id="summernote" name="content" >
                            {{ old('content')}}
                            {{ $post->content }}
                        </textarea>
                    </div>
                    @error('content')
                    <div class="text-danger fs-1">{{ $message }}</div>
                    @enderror

                    {{--<<__Main_Image__>>--}}
                    <div class="form-group">
                        <div class="col-md-4 fetured-post blog-post aos-init aos-animate" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper w-50">
                                <img class="img-thumbnail" src="{{ url('storage/' . $post->main_image) }}" alt="main_image">
                            </div>
                            <label for="exampleInputFile">Main image edit</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Choose main image</label>
                                </div>
                                <div class= "input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger fs-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{--<<__Preview_Image__>>--}}
                    <div class="form-group">
                         <div class="col-md-4 fetured-post blog-post aos-init aos-animate" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper w-50">
                                <img class="img-thumbnail" src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image">
                            </div>
                             <label for="exampleInputFile">Preview image edit</label>
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
                    </div>

                    <div class="w-50">
                        <!-- select -->
                        <div class="form-group">
                            <label>Select category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}
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
                                <option {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array($tag->id, $post->tags->pluck('id')->toArray() ) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                        @error('tags_ids[]')
                        <div class="text-danger fs-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary mt-1" value="Edit">
                </form>

            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
