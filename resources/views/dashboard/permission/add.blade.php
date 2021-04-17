
@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">

    <div class="container">
        @include('elements.show_error')

        <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Thêm quyền truy cập</h3>

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
                    <input type="text" name="per_name" class="form-control per_name" placeholder="Tên quyền truy cập" value="">
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
                    <select class="form-control select2bs4" id="status"  style="width: 100%;">
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
                <button type="button" class="btn btn-primary add-per"><i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $(document).on("click",".add-per",function() {
            Loading.show();
            var per_name = $('.per_name').val();
            var per_code = $('.per_code').val();
            var status = $('#status').val();

            axios({
                method: 'post',
                url: '/permission/addPost',
                data: {
                    per_name: per_name,
                    per_code:per_code,
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
