@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">
<div class="container">

    @include('elements.show_error')
    <form method="get">
        <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Tìm kiếm sản phẩm</h3>

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
                    <label>Tên sản phẩm</label>
                    <input type="text" name="product_name" class="form-control product_name" placeholder="Tên sản phẩm" value="">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="product_code" class="form-control product_code" placeholder="Mã sản phẩm" value="">
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control select2bs4" name="status" style="width: 100%;">
                        <option value="1">Đang bán</option>
                        <option value="2">Dừng bán</option>
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
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
            </div>
        </div>
    </form>
    <div class="title">
        <h2>Danh sách sản phẩm</h2>
    </div>
    <div class="row">
    </div>

    <div class="content-body">
        <div class="content-body--table table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">Tên sản phẩm</th>
                    <th class="text-center">Mã sản phẩm</th>
                    <th class="text-center">Ảnh sản phẩm</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Ngày áp dụng</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($get_product as $product)
                        <tr>
                            <td class="text-center font-w600">{{$product->product_name}}</td>
                            <td class="text-center font-w600">{{$product->product_code}}</td>
                            <td class="text-center" style="width: 25%;"><img src="{{asset('/uploads/images/'.$product->product_img.'')}}" class="elevation-2" alt="Product Image" style="width: 28%;"></td>
                            @if ($product->status == 1)
                                <td class="text-center">Đang bán</td>
                            @else
                                <td class="text-center">Dừng bán</td>
                            @endif

                            <td class="text-center font-w600">{{ date('d/m/Y H:i', strtotime($product->updated_at)) }}</td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('dashboard.product.edit', ['id' => $product->product_code]) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled delete_product" data-toggle="tooltip" data-id="{{$product->id}}" data-original-title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
{{--                @include('dashboard.layout.pagination')--}}
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    $(document).on("click",".delete_product",function() {
        $.confirm({
            content: '<p style="color:red;">Bạn có chắc chắn muốn xoá không?</p>',
            buttons: {
                'Yes': {
                    action: function () {
                        Loading.show();
                        var id = $('.delete_product').attr('data-id');
                        axios({
                            method: 'post',
                            url: '/product/delete',
                            data: {
                                id:id,
                            }
                        }).then(function (response) {
                            Toastr.success(response.data);
                            location.reload();
                        }).catch(function(error) {
                            Toastr.error(error.response.data);
                        }).finally(function() {
                            Loading.hide();
                        });
                    }
                },
                'No':{
                    action: function () {

                    }
                }

            }
        });

    });
</script>
@endsection
