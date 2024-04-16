@extends('admin.layouts.main')
@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-3">
                        <a style="text-decoration: none; color: #3d444b" href="{{ route('admin.tag.index') }}">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                        Tag
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Tags</a></li>
                        <li class="breadcrumb-item active">Tag</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            {{-- table --}}
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Title</th>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ $tag->id }}</td>
                                    <td class="text-center"
                                        style="text-transform: capitalize;">{{ $tag->title }}
                                    </td>
                                    <td><a href="{{ route('admin.tag.edit', $tag->id) }}"
                                           class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.tag.delete', $tag->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger border-0 bg-transparent">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            {{-- table --}}
        </div><!-- /.container-fluid -->
    </div>
@endsection
