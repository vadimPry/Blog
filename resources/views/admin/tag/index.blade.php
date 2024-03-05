@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <a style="text-decoration: none; color: #3d444b" href="{{ route('admin.main.index') }}">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                        Tags
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-2 mt-3">
                    <a type="button" href="{{ route('admin.tag.create') }}" class="btn btn-block btn-primary">Create
                        tag</a>
                </div>
            </div><!-- /.row -->
            {{-- table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Created_at</th>
                                    <th class="text-center">Updated_at</th>
                                    <th colspan="3" class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td class="text-center">{{ $tag->id }}</td>
                                        <td class="text-center" style="text-transform: capitalize;">{{ $tag->title }}</td>
                                        <td class="text-center">{{ $tag->created_at }}</td>
                                        <td class="text-center">{{ $tag->updated_at }}</td>
                                        <td class="text-center" ><a href="{{ route('admin.tag.show', $tag->id) }}"><i class="far fa-eye"></i></a></td>
                                        <td class="text-center" ><a href="{{ route('admin.tag.edit', $tag->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td class="text-center" >
                                            <form action="{{ route('admin.tag.delete', $tag->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="text-danger border-0 bg-transparent">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
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
