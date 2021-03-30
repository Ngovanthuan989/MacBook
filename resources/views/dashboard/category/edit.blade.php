
@extends('dashboard.layout.master')
@section('main')
    <div class="container">
            <div class="title">
                <h2>Sửa danh mục</h2>
            </div>
            @include('elements.show_error')
            <div class="row mt-2 update_cate" data-id="{{$edit_category->id}}">
                <div class="col-12 col-sm-6">
                    <div class="row mt-3">
                        <div class="col-6 col-sm-4">
                            <p class="font-weight-bold mb-0">Tên danh mục</p>
                        </div>
                        <div class="col-6 col-sm-8 form-group mb-0">
                            <input type="text" name="category_name" class="form-control category_name" placeholder="Tên danh mục" value="{{$edit_category->category_name}}">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-6 col-sm-4">
                            <p class="font-weight-bold mb-0">Mã danh mục</p>
                        </div>
                        <div class="col-6 col-sm-8 form-group mb-0">
                            <input type="text" name="category_code" class="form-control category_code" placeholder="Mã danh mục" value="{{$edit_category->category_code}}">
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
                                <option value="1" @if ($edit_category->status==1)
                                    selected
                                @endif>Hoạt động</option>
                                <option value="2" @if ($edit_category->status==2)
                                    selected
                                @endif>Dừng hoạt động</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 mt-2">
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
