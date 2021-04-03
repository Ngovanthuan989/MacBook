
@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">

    <div class="container">
        <div class="title">
            <h2>Thêm quyền truy cập</h2>
        </div>
        @include('elements.show_error')
        <div class="row mt-2">
            <div class="col-12 col-sm-6">
                <div class="row mt-3">
                    <div class="col-6 col-sm-4">
                        <p class="font-weight-bold mb-0">Tên quyền truy cập</p>
                    </div>
                    <div class="col-6 col-sm-8 form-group mb-0">
                        <input type="text" name="per_name" class="form-control per_name" placeholder="Tên quyền truy cập" value="">
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-6 col-sm-4">
                        <p class="font-weight-bold mb-0">Mã quyền truy cập</p>
                    </div>
                    <div class="col-6 col-sm-8 form-group mb-0">
                        <input type="text" name="per_code" class="form-control per_code" placeholder="Mã quyền truy cập" value="">
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
