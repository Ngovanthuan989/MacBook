
@extends('dashboard.layout.master')
@section('main')
    <div class="container">
        <div class="title">
            <h2>Sửa quyền truy cập</h2>
        </div>
        @include('elements.show_error')
        <div class="row mt-2 update_per" data-id="{{$edit_permission->id}}">
            <div class="col-12 col-sm-6">
                <div class="row mt-3">
                    <div class="col-6 col-sm-4">
                        <p class="font-weight-bold mb-0">Tên quyền truy cập</p>
                    </div>
                    <div class="col-6 col-sm-8 form-group mb-0">
                        <input type="text" name="permission_name" class="form-control permission_name" placeholder="Tên quyền truy cập" value="{{$edit_permission->permission_name}}">
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-6 col-sm-4">
                        <p class="font-weight-bold mb-0">Mã quyền truy cập</p>
                    </div>
                    <div class="col-6 col-sm-8 form-group mb-0">
                        <input type="text" name="permission_code" class="form-control permission_code" placeholder="Mã quyền truy cập" value="{{$edit_permission->permission_code}}">
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
                            <option value="1" @if ($edit_permission->status==1)
                            selected
                                    @endif>Hoạt động</option>
                            <option value="2" @if ($edit_permission->status==2)
                            selected
                                    @endif>Dừng hoạt động</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 mt-2">
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
