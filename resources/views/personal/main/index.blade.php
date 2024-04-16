@extends('personal.layouts.main')
@section('personal')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3>0</h3>

                    <p>Liked</p>
                </div>
                <div class="icon">
                    <i class="nav-icon far fa-thumbs-up"></i>
                </div>
                <a href="{{ route('personal.liked.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-yellow">
                <div class="inner">
                    <h3>0</h3>

                    <p>Comment</p>
                </div>
                <div class="icon">
                    <i class="nav-icon far fa-comment"></i>
                </div>
                <a href="{{ route('personal.comment.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection

