
@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">

    <div class="container">
            @include('elements.show_error')

            <div class="card card-default update_payment" data-id="{{$edit_pay->id}}">
                <div class="card-header">
                    <h3 class="card-title">Cập nhập phương thức thanh toán</h3>
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
                        <label>Tên phương thức</label>
                        <input type="text" name="pay_name" class="form-control pay_name" placeholder="Tên phương thức" value="{{$edit_pay->pay_name}}">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                        <label>Mã phương thức</label>
                        <input type="text" name="category_code" class="form-control pay_code" placeholder="Mã phương thức" value="{{$edit_pay->pay_code}}">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control select2bs4" id="status"  style="width: 100%;">
                            <option value="1" @if ($edit_pay->status==1)
                                selected
                            @endif>Hoạt động</option>
                            <option value="2" @if ($edit_pay->status==2)
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
