 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Trang chủ</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>



        <li class="nav-item dropdown show user user-menu">
            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('/backend/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                {{--<span class="dropdown-item dropdown-header">15 Notifications</span>--}}
                <div class="dropdown-divider"></div>
                <a href="/profile" class="dropdown-item">
                    <i class="fas fa-user-circle  mr-2"></i>Hồ sơ
                    {{--<span class="float-right text-muted text-sm">3 mins</span>--}}
                </a>
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a href="#" class="dropdown-item">--}}
                    {{--<i class="fas fa-users mr-2"></i> 8 friend requests--}}
                    {{--<span class="float-right text-muted text-sm">12 hours</span>--}}
                {{--</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a href="#" class="dropdown-item">--}}
                    {{--<i class="fas fa-file mr-2"></i> 3 new reports--}}
                    {{--<span class="float-right text-muted text-sm">2 days</span>--}}
                {{--</a>--}}
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item dropdown-footer">Đăng xuất</a>
            </div>
        </li>
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">--}}
          {{--<i class="fas fa-th-large"></i>--}}
        {{--</a>--}}
      {{--</li>--}}
    </ul>
  </nav>
  <!-- /.navbar -->

