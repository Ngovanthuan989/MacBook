
@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">

    <div class="container">
        @include('elements.show_error')
        <div class="card card-default update_per" data-id="{{$edit_permission->id}}">
            <div class="card-header">
              <h3 class="card-title">Sửa quyền truy cập</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tên quyền truy cập</label>
                    <input type="text" name="permission_name" class="form-control permission_name" placeholder="Tên quyền truy cập" value="{{$edit_permission->permission_name}}">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Mã quyền truy cập</label>
                    <input type="text" name="permission_code" class="form-control permission_code" placeholder="Mã quyền truy cập" value="{{$edit_permission->permission_code}}">
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control select2bs4" id="status" style="width: 100%;">
                        <option value="1" @if ($edit_permission->status==1)
                        selected
                                @endif>Hoạt động</option>
                        <option value="2" @if ($edit_permission->status==2)
                        selected
                                @endif>Dừng hoạt động</option>
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
                <button type="button" class="btn btn-primary update-permission"><i class="fas fa-pen-alt"></i> Cập nhập</button>
            </div>
          </div>
    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <script>
        $(document).on("click",".update-permission",function() {
            Loading.show();
            var id = $('.update_per').attr('data-id');
            var permission_name = $('.permission_name').val();
            var permission_code = $('.permission_code').val();
            var status = $('#status').val();

            axios({
                method: 'post',
                url: '/permission/update',
                data: {
                    id:id,
                    permission_name: permission_name,
                    permission_code:permission_code,
                    status:status
                }
            }).then(function (response) {
                Toastr.success(response.data);
                window.location='/permission';
            }).catch(function(error) {
                Toastr.error(error.response.data);
            }).finally(function() {
                Loading.hide();
            });
        });
    </script>
@endsection
