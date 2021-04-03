
@extends('dashboard.layout.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{$user->avatar}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->full_name}}</h3>

                        @if($user->permission==1)
                            <p class="text-muted text-center">Admin</p>
                        @else
                            <p class="text-muted text-center"></p>
                        @endif

                        {{--<ul class="list-group list-group-unbordered mb-3">--}}
                            {{--<li class="list-group-item">--}}
                                {{--<b>Followers</b> <a class="float-right">1,322</a>--}}
                            {{--</li>--}}
                            {{--<li class="list-group-item">--}}
                                {{--<b>Following</b> <a class="float-right">543</a>--}}
                            {{--</li>--}}
                            {{--<li class="list-group-item">--}}
                                {{--<b>Friends</b> <a class="float-right">13,287</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                        <a href="#" class="btn btn-primary btn-block"><b>Chỉnh sửa</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin về tôi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                        <p class="text-muted">
                            {{$user->email}}
                        </p>

                        <hr>

                        <strong><i class="fas fa-phone mr-1"></i> Số điện thoại</strong>

                        <p class="text-muted">{{$user->phone}}</p>

                        {{--<hr>--}}

                        {{--<strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>--}}

                        {{--<p class="text-muted">--}}
                            {{--<span class="tag tag-danger">UI Design</span>--}}
                            {{--<span class="tag tag-success">Coding</span>--}}
                            {{--<span class="tag tag-info">Javascript</span>--}}
                            {{--<span class="tag tag-warning">PHP</span>--}}
                            {{--<span class="tag tag-primary">Node.js</span>--}}
                        {{--</p>--}}

                        <hr>

                        <strong><i class="fas fa-user-lock mr-1"></i> Quyền truy cập</strong>

                        @if($user->permission==1)
                            <p class="text-muted">Admin</p>
                        @else
                            <p class="text-muted text-center"></p>
                        @endif

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

