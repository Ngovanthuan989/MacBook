
@extends('dashboard.layout.master')
@section('main')
    <div class="container">
            <div class="title">
                <h2>Thêm danh mục</h2>
            </div>
            @include('elements.show_error')
            <div class="row mt-2">
                <div class="col-12 col-sm-6">
                    <div class="row mt-3">
                        <div class="col-6 col-sm-4">
                            <p class="font-weight-bold mb-0">Tên danh mục</p>
                        </div>
                        <div class="col-6 col-sm-8 form-group mb-0">
                            <input type="text" name="category_name" class="form-control category_name" placeholder="Tên danh mục" value="">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-6 col-sm-4">
                            <p class="font-weight-bold mb-0">Mã danh mục</p>
                        </div>
                        <div class="col-6 col-sm-8 form-group mb-0">
                            <input type="text" name="category_code" class="form-control category_code" placeholder="Mã danh mục" value="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="row mt-3">
                        <div class="col-6 col-sm-4">
                            <p class="font-weight-bold mb-0">Trạng thái</p>
                        </div>
                        <div class="col-6 col-sm-8 form-group mb-0">
                            <select id="status" class="form-control">
                                <option value="1">Hoạt động</option>
                                <option value="2">Dừng hoạt động</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 mt-2">
                    {{-- <button type="button" class="btn btn-search btn-primary add-category">Lưu</button> --}}
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
        }).catch(function(error) {
            Toastr.error(error.response.data);
        }).finally(function() {
            Loading.hide();
        });

    });
</script>
@endsection
