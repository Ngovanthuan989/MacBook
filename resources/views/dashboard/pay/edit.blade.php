
@extends('dashboard.layout.master')
@section('main')
    <div class="container">
            <div class="title">
                <h2>Sửa phương thức</h2>
            </div>
            @include('elements.show_error')
            <div class="row mt-2 update_payment" data-id="{{$edit_pay->id}}">
                <div class="col-12 col-sm-6">
                    <div class="row mt-3">
                        <div class="col-6 col-sm-4">
                            <p class="font-weight-bold mb-0">Tên phương thức</p>
                        </div>
                        <div class="col-6 col-sm-8 form-group mb-0">
                            <input type="text" name="pay_name" class="form-control pay_name" placeholder="Tên phương thức" value="{{$edit_pay->pay_name}}">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-6 col-sm-4">
                            <p class="font-weight-bold mb-0">Mã phương thức</p>
                        </div>
                        <div class="col-6 col-sm-8 form-group mb-0">
                            <input type="text" name="category_code" class="form-control pay_code" placeholder="Mã phương thức" value="{{$edit_pay->pay_code}}">
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
                                <option value="1" @if ($edit_pay->status==1)
                                    selected
                                @endif>Hoạt động</option>
                                <option value="2" @if ($edit_pay->status==2)
                                    selected
                                @endif>Dừng hoạt động</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 mt-2">
                    <button type="button" class="btn btn-primary update-pay"><i class="fas fa-pen-alt"></i> Cập nhập</button>
                </div>
            </div>
    </div>
@endsection
@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    $(document).on("click",".update-pay",function() {
        Loading.show();
        var id = $('.update_payment').attr('data-id');
        var pay_name = $('.pay_name').val();
        var pay_code = $('.pay_code').val();
        var status = $('#status').val();

        axios({
            method: 'post',
            url: '/pay/update',
            data: {
                id:id,
                pay_name: pay_name,
                pay_code:pay_code,
                status:status
            }
        }).then(function (response) {
            Toastr.success(response.data);
            window.location='/pay';
        }).catch(function(error) {
            Toastr.error(error.response.data);
        }).finally(function() {
            Loading.hide();
        });
    });
</script>
@endsection
