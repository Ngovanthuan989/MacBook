@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">
    <div class="right_col container" role="main">
            <div class="col-xs-12" id="show_success_mss" style="display: none;"></div>

            <div class="profile">
                <form id="demo-form2" method="post" autocomplete="off" class="form-horizontal form-label-left">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <center>
                            <div class="avatar-cs" style="margin-bottom: 30px;">

                                <div class="preview" data-a="">
                                    <img id="preview" class="preview_img img-round" src="">
                                    <i class="fa fa-camera fa-2x" style="display: none;"></i>
                                </div>
                                <div class="file-input">
                                    <input type="hidden" name="photo" class="data-image" value="">
                                    <input type="file" id="file" class="file-upload" style="display: none;" name="avatar">
                                </div>

                                <!-- <div class="popup_image customer_avatar" data-url="https://photo.salekit.vn/uploads/salekit_7e51746feafa7f2621f71943da8f603c/60689886e94f4.png" data-input="customer_avatar" name="customer_avatar"></div>
                               <div class="div-name"> -->
                                <span><b>Thuận Đẹp Trai</b>( ID:154951334)</span>
                            </div>
                        </center>
                    </div>
                </form>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
                <label class="control-label col-md-4 col-sm-4 col-xs-12 mr-top-10">
                    Họ tên:
                </label>
                <div class="col-md-8 col-sm-8 col-xs-12 mr-top-10">
                    <input type="text" class="form-control contact_name" name="fullname" value="Thuận Đẹp Trai" required="">
                </div>
                <label class="control-label col-md-4 col-sm-4 col-xs-12 mr-top-10">
                    Số điện thoại:
                </label>
                <div class="col-md-8 col-sm-8 col-xs-12 mr-top-10">
                    <input type="text" name="mobile" class="form-control" value="0969698888">
                </div>

                <br>

                <script type="text/javascript">
                    function preview_cmt(elem){
                        let reader = new FileReader();
                        reader.readAsDataURL(elem.files[0]);
                        reader.addEventListener("load", function (data) {
                            document.body.querySelector('.preview_cmt').setAttribute('src',reader.result);
                            document.body.querySelector('[name="data_cmt"]').setAttribute('value',reader.result);
                        });
                    }

                </script>

            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <label class="control-label col-md-4 col-sm-4 col-xs-12 mr-top-10">
                    Email:
                </label>
                <div class="col-md-8 col-sm-8 col-xs-12 mr-top-10">
                    <input type="text" class="form-control" name="email" autocomplete="off" value="ngovanthuan989@gmail.com" placeholder="Email">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <div class="col-12 col-sm-12 mt-2">
                    <button id="btn-save" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
                </div>
            </div>


    </div>

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <script type="text/javascript">
        $( document ).ready(function() {
            function readURL(input,selectId) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').remove();
                        $('.preview').prepend('<img id="preview" class="preview_img" src="'+e.target.result+'">');
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
            $('.preview').hover(function () {
                $('.fa-camera').show();
            },function () {
                $('.fa-camera').hide();
            });
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
@endsection