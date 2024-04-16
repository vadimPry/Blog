@extends('admin.layouts.main')
@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <a style="text-decoration: none; color: #3d444b" href="{{ route('admin.category.index') }}">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                        Users
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-2 mt-3">
                    <a type="button" href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary">Add user</a>
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
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Created_at</th>
                                    <th colspan="3" class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->created_at }}</td>
                                        <td class="text-center" ><a href="{{ route('admin.user.show', $user->id) }}"><i class="far fa-eye"></i></a></td>
                                        <td class="text-center" ><a href="{{ route('admin.user.edit', $user->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td class="text-center" >
                                            <form action="{{ route('admin.user.delete', $user->id)}}" method="POST">
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
