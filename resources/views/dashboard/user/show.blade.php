@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">
    <div class="container">
        <div class="title">
            <h2>Danh sách khách hàng</h2>
        </div>
        @include('elements.show_error')
        {{--<form method="get">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-12 col-md-8 col-lg-6">--}}
                    {{--<div class="row">--}}
                        {{--<p class="col-sm-3 col-md-4 font-weight-bold">Trạng thái</p>--}}
                        {{--<div class="col-sm-9 col-md-8 ">--}}
                            {{--<select class="custom-select" name="status">--}}
                                {{--<option value="0">Tất cả trạng thái</option>--}}
                                {{--<option value="1">Hoạt động</option>--}}
                                {{--<option value="2">Dừng hoạt động</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<p class="col-sm-3 col-md-4 font-weight-bold">Tên danh mục</p>--}}
                        {{--<div class="col-sm-9 col-md-8 ">--}}
                            {{--<input type="text" name="category_name" class="form-control" placeholder="Tên danh mục" value="">--}}
                        {{--</div>--}}
                    {{--</div>--}}


                {{--</div>--}}
            {{--</div>--}}
        {{--</form>--}}
        <div class="row">
            <div class="col-12 col-sm-12 mt-2 ">
                {{-- <button type="button" class="btn btn-search btn-primary add-category">Lưu</button> --}}
                <button type="button" class="btn btn-primary float-right"><i class=""></i> Tìm kiếm</button>
                <a href="user/add" type="button" class="btn-add btn btn-warning float-right"><i class="fas fa-plus"></i> Thêm mới</a>
            </div>
        </div>

        <div class="content-body">
            <div class="content-body--table table-responsive">
                <table class="table table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center">Tên người dùng</th>
                        <th class="text-center">Avatar</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Số điện thoại</th>
                        <th class="text-center">Ngày đăng kí</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($get_user as $get_users)
                        <tr>
                            <td class="text-center font-w600">{{$get_users->full_name}}</td>
                            <td class="text-center" style="width: 25%;"><img src="{{asset('/uploads/images/'.$get_users->avatar.'')}}" class="img-circle elevation-2" alt="User Image" style="width: 18%;"></td>
                            <td class="text-center">{{$get_users->email}}</td>
                            <td class="text-center">{{$get_users->phone}}</td>


                            <td class="text-center font-w600">{{ date('d/m/Y H:i', strtotime($get_users->updated_at)) }}</td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('dashboard.user.edit', ['id' => $get_users->id]) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled delete_user" data-toggle="tooltip" data-id="{{$get_users->id}}" data-original-title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{--                @include('dashboard.layout.pagination')--}}
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <script>
        $(document).on("click",".delete_user",function() {
            $.confirm({
                content: '<p style="color:black;">Bạn có chắc chắn muốn xoá không?</p>',
                buttons: {
                    'Yes': {
                        action: function () {
                            Loading.show();
                            var id = $('.delete_user').attr('data-id');
                            axios({
                                method: 'post',
                                url: '/user/delete',
                                data: {
                                    id:id,
                                }
                            }).then(function (response) {
                                Toastr.success(response.data);
                                location.reload();
                            }).catch(function(error) {
                                Toastr.error(error.response.data);
                            }).finally(function() {
                                Loading.hide();
                            });
                        }
                    },
                    'No':{
                        action: function () {

                        }
                    }

                }
            });

        });
    </script>
@endsection
