@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">
     <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/backend/plugins/summernote/summernote-bs4.min.css')}}">
<style>
    .img-round {
        border-radius: 0% !important;
    }
    .error{
        color:red;
    }
</style>
    <div class="container">
            @include('elements.show_error')
            <h3>Thêm mới sản phẩm</h3>
            <form id="form" method="post" action="{{ route('dashboard.product.addPost') }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Thông tin chung</h3>

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
                        <label> Mô tả ngắn </label>
                        <textarea class="form-control" name="product_description" rows="3" placeholder="Mô tả ngắn sản phẩm" maxlength="65535"></textarea>
                    </div>
                      <!-- /.form-group -->

                      <div class="form-group">
                        <label>Giới thiệu sản phẩm</label>
                        <textarea id="summernote" name="product_content">
                            Place <em>some</em> <u>text</u> <strong>here</strong>
                        </textarea>
                      </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control select2bs4" name="status"  style="width: 100%;">
                            <option value="1">Đang bán</option>
                            <option value="2">Dừng bán</option>
                          </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        <select class="form-control select2bs4" name="category_id"  style="width: 100%;">
                            @foreach ($get_category as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Ảnh đại diện sản phẩm</label>
                        <div class="avatar-cs" style="margin-bottom: 30px;">
                            <div class="preview" data-a="" style="border: 1px dashed rgb(67, 158, 215);">
                                <img id="preview" class="preview_img img-round" src="">
                                <i class="fa fa-camera fa-2x"></i>
                            </div>
                            <div class="file-input">
                                <input type="file" id="file" class="file-upload" style="display: none;" name="product_img" value="">
                            </div>
                        </div>
                     </div>



                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
            </div>



            {{-- Danh sách ảnh sản phẩm --}}

            {{-- <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Danh sách ảnh sản phẩm</h3>

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

                  <!-- /.row -->
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group mt-10">
                        <label>Chiều dài sản phẩm</label>
                        <input type="number" min="1" name="product_length" value="" placeholder="Chiều dài: cm" class="form-control data_pro">
                      </div>

                    </div>

                     <div class="col-sm-3">
                      <div class="form-group mt-10">
                        <label>Chiều rộng sản phẩm</label>
                        <input type="number" name="product_width" id="package_width" value="" placeholder="Chiều rộng: cm" class=" form-control data_pro">
                      </div>

                    </div>

                    <div class="col-sm-3">
                      <div class="form-group mt-10">
                        <label>Chiều cao sản phẩm</label>
                        <input type="number" name="product_height" value="" placeholder="Chiều cao: cm" class="form-control data_pro">
                      </div>

                    </div>


                  </div>
                </div>
            </div> --}}


            {{-- Giá bán,kích thước sản phẩm --}}

            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Giá bán, Kích thưóc sản phẩm</h3>

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
                        <div class="col-sm-6">
                          <div class="form-group mt-10">
                            <label>Giá gốc (Giá so sánh)</label>
                            <input type="text" name="unit_price" onchange="this.value=formatNumber(this.value.replace(/\./g,''))" value="" placeholder="Giá gốc" class="form-control data_pro">
                          </div>
                          <div class="form-group mt-10">
                            <label>Mã sản phẩm</label>
                            <input type="text" name="product_code" id="product_code" value="" placeholder="Mã sản phẩm" class=" form-control data_pro">
                            <svg id="barcode_sku" style="display: none;"></svg>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group mt-10">
                            <label>Giá bán (<= giá gốc)</label>
                            <input type="text" name="price_sale" onchange="this.value=formatNumber(this.value.replace(/\./g,''))" value="" placeholder="Giá bán" class="form-control data_pro">
                          </div>
                          <div class="form-group mt-10">
                            <label>Đơn vị tính (chiếc, hộp, lọ, kg...)</label>
                            <input type="text" id="unit_name" name="unit_name" value="" class="form-control data_pro" placeholder="Đơn vị tính, vd: hộp, lạng, con, bộ,..">
                          </div>
                        </div>

                      </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group mt-10">
                        <label>Chiều dài sản phẩm</label>
                        <input type="number" min="1" name="product_length" value="" placeholder="Chiều dài: cm" class="form-control data_pro">
                      </div>

                    </div>

                     <div class="col-sm-3">
                      <div class="form-group mt-10">
                        <label>Chiều rộng sản phẩm</label>
                        <input type="number" name="product_width" id="package_width" value="" placeholder="Chiều rộng: cm" class=" form-control data_pro">
                      </div>

                    </div>

                    <div class="col-sm-3">
                      <div class="form-group mt-10">
                        <label>Chiều cao sản phẩm</label>
                        <input type="number" name="product_height" value="" placeholder="Chiều cao: cm" class="form-control data_pro">
                      </div>

                    </div>
                    <div class="col-sm-3">
                      <div class="form-group mt-10">
                        <label>Số lượng sản phẩm</label>
                        <input type="number" name="product_amount" value="" placeholder="Số lượng sản phẩm" class="form-control data_pro">
                      </div>

                    </div>

                  </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Lưu</button>
        </form>
    </div>

@endsection
@section('js')
<!-- Summernote -->
<script src="{{asset('/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- CodeMirror -->
<script src="{{asset('/backend/plugins/codemirror/codemirror.js')}}"></script>
<script src="{{asset('/backend/plugins/codemirror/mode/css/css.js')}}"></script>
<script src="{{asset('/backend/plugins/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{asset('/backend/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>

<script type="text/javascript">
    $( document ).ready(function() {
        function readURL(input,selectId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').remove();
                    $('.preview').prepend('<img id="preview" class="preview_img img-round" src="'+e.target.result+'">');
                    //$('#'+selectId).attr('src', e.target.result);
                    $('.preview_img').rcrop({
                        grid : true,
                        minSize : [50,50],
                        minSize : [200,200],
                        preserveAspectRatio : true
                    });
                };
                reader.readAsDataURL(input.files[0]);
            }
        };
        // $('.preview').hover(function () {
        //     $('.fa-camera').show();
        // },function () {
        //     $('.fa-camera').hide();
        // });
        $('.fa-camera').on('click',function () {
            $('#file').click();
        });
        $('body').on('change', '.file-upload', function() {
            if(typeof this.files[0] != "undefined"){
                var sizeImage = this.files[0].size;
                if(sizeImage > 2242880){
                    alert('Ảnh của bạn vượt quá kích thước cho phép. Chỉ được phép upload ảnh từ 2mb trở xuống.');
                    $(this).val('');
                    window.location.reload();
                    return false;
                }
                readURL(this,'preview');
            }
        });


    });

</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script>
    $(document).ready(function () {
        jQuery.validator.addMethod("noSpace", function(value, element) {
            value = value.trim();
            if (value != "") {
                return true;
            }
            return value.indexOf(" ") < 0 && value != "";
        }, "No space please and don't leave it empty");

        $("#form").validate({
            rules: {
                product_name: {
                    required: true,
                    noSpace: true,
                },
                product_description:{
                    required: true,
                    noSpace: true,
                    maxlength: 300,
                    minlength: 50
                },
                product_amount:{
                    required: true,
                    noSpace: true,
                    number: true
                },
                product_content:{
                    required: true,
                    noSpace: true,
                    minlength: 100
                },
                unit_price:{
                    required: true,
                    noSpace: true,
                    number: true,
                },
                price_sale:{
                    required: true,
                    noSpace: true,
                    number: true,
                },
                product_code:{
                    required: true,
                    noSpace: true,
                    maxlength: 6,
                    minlength: 4
                },
                unit_name:{
                    required: true,
                    noSpace: true,
                },
                product_length:{
                    required: true,
                    noSpace: true,
                    number: true,
                },
                product_width:{
                    required: true,
                    noSpace: true,
                    number: true,
                },
                product_height:{
                    required: true,
                    noSpace: true,
                    number: true,
                }

            },
            // Specify validation error messages
            messages: {
                product_name:{
                    required: '* Tên sản phẩm không được để trống!',
                    noSpace: '* Tên sản phẩm không được để trống!',

                },
                product_description:{
                    required: '* Mô tả ngắn không được để trống!',
                    noSpace: '* Mô tả ngắn không được để trống!',
                    minlength:'* Mô tả ngắn ít nhất phải là 50 kí tự',
                    maxlength: '* Mô tả ngắn nhiều nhất là 300 kí tự'
                },
                product_content:{
                    required: '* Giới thiệu sản phẩm không được để trống!',
                    noSpace: '* Giới thiệu sản phẩm không được để trống!',
                    minlength: '* Giới thiệu sản phẩm ít nhất phải có 100 ký tự'
                },
                unit_price:{
                    required: '* Giá gốc sản phẩm không được để trống!',
                    noSpace: '* Giá gốc sản phẩm không được để trống!',
                    number:'* Giá gốc sản phẩm phải là số!'
                },
                price_sale:{
                    required: '* Giá bán sản phẩm không được để trống!',
                    noSpace: '* Giá bán sản phẩm không được để trống!',
                    number:'* Giá sản bán sản phẩm phải là số!'
                },
                product_code:{
                    required: '* Mã sản phẩm không được để trống!',
                    noSpace: '* Mã sản phẩm không được để trống!',
                    minlength:'* Mã sản phẩm ít nhất phải là 4 kí tự',
                    maxlength: '* Mã sản phẩm nhiều nhất là 6 kí tự'
                },
                unit_name:{
                    required: '* Đơn vị tính không được để trống!',
                    noSpace: '* Đơn vị tính không được để trống!',
                },
                product_length:{
                    required: '* Chiều dài sản phẩm không được để trống!',
                    noSpace: '* Chiều dài sản phẩm không được để trống!',
                    number:'* Chiều dài sản phẩm phải là số!'
                },
                product_amount:{
                    required: '* Số lượng sản phẩm không được để trống!',
                    noSpace: '* Số lượng sản phẩm không được để trống!',
                    number:'* Số lượng sản phẩm phải là số!'
                },
                product_width:{
                    required: '* Chiều rộng sản phẩm không được để trống!',
                    noSpace: '* Chiều rộng sản phẩm không được để trống!',
                    number:'* Chiều rộng sản phẩm phải là số!'
                },
                product_height:{
                    required: '* Chiều cao sản phẩm không được để trống!',
                    noSpace: '* Chiều cao sản phẩm không được để trống!',
                    number:'* Chiều cao sản phẩm phải là số!'
                },

            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    })
 </script>
@endsection
