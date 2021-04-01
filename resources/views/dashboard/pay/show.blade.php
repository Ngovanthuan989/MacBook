@extends('dashboard.layout.master')
@section('main')

<div class="container">
    <div class="title">
        <h2>Danh sách phương thức thanh toán</h2>
    </div>
    @include('elements.show_error')
    <form method="get">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="row">
                    <p class="col-sm-3 col-md-4 font-weight-bold">Trạng thái</p>
                    <div class="col-sm-9 col-md-8 ">
                        <select class="custom-select" name="status">
                            <option value="0">Tất cả trạng thái</option>
                            <option value="1">Hoạt động</option>
                            <option value="2">Dừng hoạt động</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <p class="col-sm-3 col-md-4 font-weight-bold">Tên phương thức</p>
                    <div class="col-sm-9 col-md-8 ">
                        <input type="text" name="pay_name" class="form-control" placeholder="Tên phương thức" value="">
                    </div>
                </div>


            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12 col-sm-12 mt-2 ">
            {{-- <button type="button" class="btn btn-search btn-primary add-category">Lưu</button> --}}
            <button type="button" class="btn btn-primary float-right"><i class=""></i> Tìm kiếm</button>
            <a href="pay/add" type="button" class="btn-add btn btn-warning float-right"><i class="fas fa-plus"></i> Thêm mới</a>
        </div>
    </div>

    <div class="content-body">
        <div class="content-body--table table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">Tên phương thức</th>
                    <th class="text-center">Mã phương thức</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Ngày áp dụng</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($get_pay as $get_pays)
                        <tr>
                            <td class="text-center font-w600">{{$get_pays->pay_name}}</td>
                            <td class="text-center font-w600">{{$get_pays->pay_code}}</td>
                            @if ($get_pays->status == 1)
                                <td class="text-center">Đang hoạt động</td>
                            @else
                                <td class="text-center">Dừng hoạt động</td>
                            @endif

                            <td class="text-center font-w600">{{ date('d/m/Y H:i', strtotime($get_pays->updated_at)) }}</td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('dashboard.pay.edit', ['id' => $get_pays->pay_code]) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled delete_pay" data-toggle="tooltip" data-id="{{$get_pays->id}}" data-original-title="Delete">
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
    $(document).on("click",".delete_pay",function() {
        $.confirm({
            content: '<p style="color:black;">Bạn có chắc chắn muốn xoá không?</p>',
            buttons: {
                'Yes': {
                    action: function () {
                        Loading.show();
                        var id = $('.delete_pay').attr('data-id');
                        axios({
                            method: 'post',
                            url: '/pay/delete',
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
