@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">

    <div class="container">
        <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Tìm kiếm quyền truy cập</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <form method="get">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tên quyền truy cập</label>
                    <input type="text" name="permission_name" class="form-control per_name" placeholder="Tên quyền truy cập" value="">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Mã quyền truy cập</label>
                    <input type="text" name="per_code" class="form-control per_code" placeholder="Mã quyền truy cập" value="">
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control select2bs4" name="status"  style="width: 100%;">
                        <option value="1">Hoạt động</option>
                        <option value="2">Dừng hoạt động</option>
                      </select>
                  </div>
                  <!-- /.form-group -->
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
            </div>
        </form>
        </div>
        <div class="title">
            <h2>Danh sách quyền truy cập</h2>
        </div>
        @include('elements.show_error')

        <div class="content-body">
            <div class="content-body--table table-responsive">
                <table class="table table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center">Tên quyền truy cập</th>
                        <th class="text-center">Mã quyền truy cập</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Ngày áp dụng</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($get_permission as $get_permissions)
                        <tr>
                            <td class="text-center font-w600">{{$get_permissions->permission_name}}</td>
                            <td class="text-center font-w600">{{$get_permissions->permission_code}}</td>
                            @if ($get_permissions->status == 1)
                                <td class="text-center">Đang hoạt động</td>
                            @else
                                <td class="text-center">Dừng hoạt động</td>
                            @endif

                            <td class="text-center font-w600">{{ date('d/m/Y H:i', strtotime($get_permissions->updated_at)) }}</td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('dashboard.permission.edit', ['id' => $get_permissions->permission_code]) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled delete_permission" data-toggle="tooltip" data-id="{{$get_permissions->id}}" data-original-title="Delete">
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
        $(document).on("click",".delete_permission",function() {
            $.confirm({
                content: '<p style="color:black;">Bạn có chắc chắn muốn xoá không?</p>',
                buttons: {
                    'Yes': {
                        action: function () {
                            Loading.show();
                            var id = $('.delete_permission').attr('data-id');
                            axios({
                                method: 'post',
                                url: '/permission/delete',
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
