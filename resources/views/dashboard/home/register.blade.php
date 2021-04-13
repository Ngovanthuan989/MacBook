<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in - Admin</title>

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{asset('themelogin/css/style.css')}}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



</head>
<body class="img js-fullheight" style="background-image: url(themelogin/images/bg.jpg);">
@include('elements.loading')
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-5">
        <h2 class="heading-section">Công ty cổ phần MacTree</h2>
      </div>
    </div>
    <div class="row justify-content-center cards">
      <div class="col-md-6 col-lg-4">
        <div class="login-wrap p-0">
          <h3 class="mb-4 text-center">Đăng kí tài khoản</h3>

          <div class="form-group">
            <input type="text" class="form-control full_name" placeholder="Họ và Tên" >
          </div>
          <div class="form-group">
            <input type="text" class="form-control phone" placeholder="Số điện thoại" >
          </div>
          <div class="form-group">
            <input type="email" class="form-control email" placeholder="Email" >
          </div>
          <div class="form-group">
            <input type="password" class="form-control password" placeholder="Mật khẩu" >
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control password2" placeholder="Nhập lại mật khẩu" >
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          </div>
          <div class="form-group">
            <button type="button" class="form-control btn btn-primary register-admin">Đăng kí</button>
          </div>
          <div class="form-group d-md-flex">
            <div class="w-50">
              <a href="/login" style="color: #fff">Đăng nhập</a>
            </div>

          </div>

          {{-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
          <div class="social d-flex text-center">
                  <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                  <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</section>



<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
@include('elements.toastr')



<script>
$(document).on("click",".register-admin",function() {
    Loading.show();
    var full_name = $('.full_name').val();
    var phone = $('.phone').val();
    var email = $('.email').val();
    var password = $('.password').val();
    var password2 = $('.password2').val();
    axios({
            method: 'post',
            url: '/postRegister',
            data: {
                full_name:full_name,
                phone:phone,
                email: email,
                password:password,
                password2:password2
            }
        }).then(function (response) {
            Toastr.success(response.data);
            window.location='/login';
        }).catch(function(error) {
            Toastr.error(error.response.data);
        }).finally(function() {
            Loading.hide();
        });
});
</script>
</body>
</html>
