 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Lara-Shop Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/admin/admin_profiles/small/'.Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Session::get('page')=='dashboard')
          <?php $active='active'; ?>
          @else
          <?php $active=''; ?>
          @endif
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Session::get('page')=='settings' || Session::get('page')=='update-admin-details' || Session::get('page')=='frontSettings')
          <?php $active='active'; ?>
          @else
          <?php $active=''; ?>
          @endif
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               @if(Session::get('page')=='frontSettings')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/front-settings')}}" class="nav-link  {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Front Settings</p>
                </a>
              </li>
               @if(Session::get('page')=='settings')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/settings')}}" class="nav-link  {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Password</p>
                </a>
              </li>
               @if(Session::get('page')=='update-admin-details')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/update-admin-details')}}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Details</p>
                </a>
              </li>
              </li>
            </ul>
          </li>

           @if(Session::get('page')=='sections' || Session::get('page')=='categories' || Session::get('page')=='products' || Session::get('page')=='brands' || Session::get('page')=='banners' || Session::get('page')=='coupons' || Session::get('page')=='shipping_charges' || Session::get('page')=='users' || Session::get('page')=='cms_pages' || Session::get('page')=='admins_subadmins')
          <?php $active='active'; ?>
          @else
          <?php $active=''; ?>
          @endif
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Catalogues
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
               @if(Session::get('page')=='brands')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/brands')}}" class="nav-link  {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
               @if(Session::get('page')=='sections')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/sections')}}" class="nav-link  {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sections</p>
                </a>
              </li>
               @if(Session::get('page')=='categories')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/categories')}}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
               @if(Session::get('page')=='products')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/products')}}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
               @if(Session::get('page')=='banners')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/banners')}}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banners</p>
                </a>
              </li>
               @if(Session::get('page')=='coupons')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/coupons')}}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coupons</p>
                </a>
              </li>
               @if(Session::get('page')=='shipping_charges')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/view-shipping-charges')}}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shipping Charges</p>
                </a>
              </li>
              @if(Session::get('page')=='users')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/users')}}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              </li>
               @if(Session::get('page')=='cms_pages')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/cms-pages')}}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CMS Pages</p>
                </a>
              </li>
              @if(Auth::guard('admin')->user()->type=='superadmin' || Auth::guard('admin')->user()->type=='admin')
              @if(Session::get('page')=='admins_subadmins')
               <?php $active='active'; ?>
               @else
               <?php $active=''; ?>
               @endif
              <li class="nav-item">
                <a href="{{url('admin/admins-subadmins')}}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admins / SubAdmins</p>
                </a>
              </li>
              @endif
              </li>
            </ul>
          </li>
          @if(Session::get('page')=='orders')
          <?php $active='active'; ?>
          @else
          <?php $active=''; ?>
          @endif
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('admin/orders')}}" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Orders
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
         
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e_commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
                
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>