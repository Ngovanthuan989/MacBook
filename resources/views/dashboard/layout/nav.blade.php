<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->


       {{--Quản lí đơn hàng--}}
      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fas fa-shopping-cart"></i>
          <p>
            Quản lí đơn hàng
            <i class="fas fa-angle-left right"></i>
            {{--<span class="badge badge-info right">6</span>--}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/order" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách đơn hàng</p>
            </a>
          </li>
        </ul>
      </li>



       {{--Quản lí người dùng--}}
      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Quản lí người dùng
            <i class="fas fa-angle-left right"></i>
            {{--<span class="badge badge-info right">6</span>--}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/user/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Thêm mới người dùng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách người dùng</p>
            </a>
          </li>
        </ul>
      </li>

      {{--Quản lý quyền truy cập--}}
      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fas fa-user-lock"></i>
          <p>
            Quản lí quyền truy cập
            <i class="fas fa-angle-left right"></i>
            {{--<span class="badge badge-info right">6</span>--}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/permission/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Thêm mới</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/permission" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách</p>
            </a>
          </li>
        </ul>
      </li>

      {{--Quản lí sản phẩm--}}
      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fab fa-product-hunt"></i>
          <p>
            Quản lí sản phẩm
            <i class="fas fa-angle-left right"></i>
            {{--<span class="badge badge-info right">6</span>--}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/product/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Thêm mới sản phẩm</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/product" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách sản phẩm</p>
            </a>
          </li>
        </ul>
      </li>

        {{-- Quản lí danh mục sản phẩm --}}
      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Danh Mục Sản Phẩm
            <i class="fas fa-angle-left right"></i>
            {{--<span class="badge badge-info right">6</span>--}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/category/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Thêm mới danh mục</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/category" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách danh mục</p>
            </a>
          </li>
        </ul>
      </li>

      {{-- Quản lý đơn vị vận chuyển --}}

      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fas fa-truck"></i>
          <p>
            Đơn Vị Vận Chuyển
            <i class="fas fa-angle-left right"></i>
            {{--<span class="badge badge-info right">6</span>--}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/ship/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Thêm mới</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/ship" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách</p>
            </a>
          </li>
        </ul>
      </li>



      {{--Quản lí hình thức thanh toán--}}
      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fab fa-cc-amazon-pay"></i>
          <p>
            Thanh Toán
            <i class="fas fa-angle-left right"></i>
            {{--<span class="badge badge-info right">6</span>--}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/pay/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Thêm mới</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pay" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách</p>
            </a>
          </li>
        </ul>
      </li>




    </ul>
  </nav>
