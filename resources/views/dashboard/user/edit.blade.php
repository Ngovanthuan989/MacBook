@extends('dashboard.layout.master')
@section('main')
    <link rel="stylesheet" href="https://dongiannhat.salekit.vn/assets/css/ace_agency.css?vs=0.1150">
    <div class="right_col container" role="main">
        <div class="col-xs-12" id="show_success_mss" style="display: none;"></div>
        @include('elements.show_error')
        <div class="profile">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <center>
                        <div class="avatar-cs" style="margin-bottom: 30px;">

                            <div class="preview" data-a="">
                                <img id="preview" class="preview_img img-round" src="{{asset('/uploads/images/'.$user->avatar.'')}}">
                                <i class="fa fa-camera fa-2x" style="display: none;"></i>
                            </div>
                            {{--<div class="file-input">--}}
                                {{--<input type="file" id="file" class="file-upload" style="display: none;" name="avatar" value="{{$user->avatar}}">--}}
                            {{--</div>--}}

                            <input type="hidden" class="form-control id_user"  value="{{$user->id}}">
                            <!-- <div class="popup_image customer_avatar" data-url="https://photo.salekit.vn/uploads/salekit_7e51746feafa7f2621f71943da8f603c/60689886e94f4.png" data-input="customer_avatar" name="customer_avatar"></div>
                           <div class="div-name"> -->
                            <span><b>{{$user->full_name}}</b>( ID:{{$user->id}})</span>
                        </div>
                    </center>
                </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12 mr-top-10">
                Họ tên:
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12 mr-top-10">
                <input type="text" class="form-control full_name" name="full_name" value="{{$user->full_name}}" disabled>
            </div>
            <label class="control-label col-md-4 col-sm-4 col-xs-12 mr-top-10">
                Số điện thoại:
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12 mr-top-10">
                <input type="text" name="phone" class="form-control phone" value="{{$user->phone}}" disabled>
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
                <input type="text" class="form-control" name="email" autocomplete="off" value="{{$user->email}}" placeholder="Email" disabled>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <label class="control-label col-md-4 col-sm-4 col-xs-12 mr-top-10">
                Quyền truy cập:
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12 mr-top-10">
                <select name="permission" class="form-control permission">
                    @foreach($get_permission as $permission)
                        <option value="{{$permission->id}}"
                            @if($user->permission == $permission->id)
                              selected
                            @endif>{{$permission->permission_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <div class="col-12 col-sm-12 mt-2">
                <button id="btn-save" type="button" class="btn btn-success update_user"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>


    </div>

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        $(document).on("click",".update_user",function() {
            Loading.show();
            var id = $('.id_user').val();
            var permission = $('.permission').val();


            axios({
                method: 'post',
                url: '/user/update',
                data: {
                    id:id,
                    permission: permission,
                }
            }).then(function (response) {
                Toastr.success(response.data);
                window.location='/user';
            }).catch(function(error) {
                Toastr.error(error.response.data);
            }).finally(function() {
                Loading.hide();
            });
        });
    </script>

@endsection