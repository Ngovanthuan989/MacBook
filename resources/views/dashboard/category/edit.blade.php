
@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">

    <div class="container">
        @include('elements.show_error')
        <div class="card card-default update_cate"  data-id="{{$edit_category->id}}">
            <div class="card-header">
                <h3 class="card-title">Cập nhập danh mục sản phẩm</h3>

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
                    <input type="text" name="category_name" class="form-control category_name" placeholder="Tên danh mục" value="{{$edit_category->category_name}}">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                    <label>Mã danh mục</label>
                    <input type="text" name="category_code" class="form-control category_code" placeholder="Mã danh mục" value="{{$edit_category->category_code}}">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Trạng thái</label>
                        <select id="status" class="form-control select2bs4">
                        <option value="1" @if ($edit_category->status==1)
                            selected
                        @endif>Hoạt động</option>
                        <option value="2" @if ($edit_category->status==2)
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
                <button type="button" class="btn btn-primary update-category"><i class="fas fa-pen-alt"></i> Cập nhập</button>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    $(document).on("click",".update-category",function() {
        Loading.show();
        var id = $('.update_cate').attr('data-id');
        var category_name = $('.category_name').val();
        var category_code = $('.category_code').val();
        var status = $('#status').val();

        axios({
            method: 'post',
            url: '/category/update',
            data: {
                id:id,
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
