
@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">

    <div class="container">
            @include('elements.show_error')
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Thêm mới danh mục sản phẩm</h3>

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
                        <label>Tên danh mục</label>
                        <input type="text" name="category_name" class="form-control category_name" placeholder="Tên danh mục" value="">
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Mã danh mục</label>
                        <input type="text" name="category_code" class="form-control category_code" placeholder="Mã danh mục" value="">
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
                    <button type="button" class="btn btn-primary add-category"><i class="fas fa-plus"></i> Lưu</button>
                </div>
            </div>

    </div>
@endsection
@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $(document).on("click",".add-category",function() {
        Loading.show();
        var category_name = $('.category_name').val();
        var category_code = $('.category_code').val();
        var status = $('#status').val();

        axios({
            method: 'post',
            url: '/category/addPost',
            data: {
                category_name: category_name,
                category_code:category_code,
                status:status
            }
        }).then(function (response) {
            Toastr.success(response.data);
            window.location='/category';
        }).catch(function(error) {
            Toastr.error(error.response.data);
        }).finally(function() {
            Loading.hide();
        });

    });
</script>
@endsection
