@extends('personal.layouts.main')
@section('personal')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <a style="text-decoration: none; color: #3d444b" href="{{ route('personal.main.index') }}">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                        Comments
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Comments</li>
                    </ol>
                </div>
            </div><!-- /.row -->
            {{-- table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Comment</th>
                                    <th colspan="2" class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td class="text-center">{{ $comment->id }}</td>
                                        <td class="text-center" style="text-transform: capitalize;">{{ $comment->comment }}</td>
                                        <td class="text-center" ><a href="{{ route('personal.comment.edit', $comment->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td class="text-center" >
                                            <form action="{{ route('personal.comment.delete', $comment->id)}}" method="POST">
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

