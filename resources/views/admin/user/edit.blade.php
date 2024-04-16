@extends('admin.layouts.main')
@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">
                        <a style="text-decoration: none; color: #3d444b" href="{{ route('admin.user.show', $user->id) }}">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                        User edit
                    </h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Users update</li>
                    </ol>
                </div><!-- /.col -->
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="mt-3">
                    @csrf
                    @method('PATCH')

                    <div class="mb-1">
                        <label for="exampleInputFile">Name edit</label>
                        <input type="text" autocomplete="off" name="name" class="form-control" placeholder="name"
                               value="{{ $user->name }}">
                    </div>
                    @error('name')
                    <div class="text-danger fs-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputFile">Email edit</label>
                        <input type="email" autocomplete="off" name="email" class="form-control" placeholder="email"
                               value="{{ $user->email }}">
                    </div>
                    @error('email')
                    <div class="text-danger fs-1">{{ $message }}</div>
                    @enderror
                    <div class="w-100">
                        <!-- select -->
                        <div class="form-group">
                            <label>Select role</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == old('role', $user->role) ? 'selected' : '' }}
                                    >{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                        <div class="text-danger fs-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary mt-1" value="Edit">
                </form>

            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
