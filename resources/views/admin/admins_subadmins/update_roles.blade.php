@extends('layouts.adminLayout.admin_layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Admins / SubAdmins</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form name="adminForm" id="adminForm" action="{{url('admin/update-admins-roles/'.$adminDetail['id'])}}" method="post" enctype="multipart/form-data">@csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          @if(Session::has('error_message')) 
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ Session::get('error_message')}}</strong>
              </div>
          @endif   

          @if(Session::has('success_message')) 
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ Session::get('success_message')}}</strong>
                </div>
          @endif
          @if(Session::has('flash_message_warning')) 
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{!! session('flash_message_warning') !!}</strong>
                </div>
          @endif

          @if($errors->any())
               <div class="alert alert-danger">
                 <ul>
                  @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                  @endforeach
                 </ul>
               </div>
           @endif
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <?php //echo "<pre>"; print_r($adminRoles); die; ?>
                @if(!empty($adminRoles))
                 @foreach($adminRoles as $role)
                  @if($role['module']=='categories')
                   @if($role['view_access']==1)
                    @php $viewCategories="checked"; @endphp
                   @else
                    @php $viewCategories=''; @endphp
                   @endif
                   @if($role['edit_access']==1)
                    @php $editCategories="checked"; @endphp
                   @else
                    @php $editCategories=''; @endphp
                   @endif
                   @if($role['full_access']==1)
                    @php $fullCategories="checked"; @endphp
                   @else
                    @php $fullCategories=''; @endphp
                   @endif
                  @endif
                 @endforeach
                @endif
                <div class="form-group">
                    <label for="categories">Categories</label>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="categories[view]" value="1" @if(isset($viewCategories)){{$viewCategories}} @endif>&nbsp;View Access &nbsp;&nbsp;
                    <input type="checkbox" name="categories[edit]" value="1" @if(isset($editCategories)){{$editCategories}} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;
                    <input type="checkbox" name="categories[full]" value="1" @if(isset($fullCategories)){{$fullCategories}} @endif>&nbsp;Full Access &nbsp;&nbsp;
                </div>
                @if(!empty($adminRoles))
                 @foreach($adminRoles as $role)
                  @if($role['module']=='products')
                   @if($role['view_access']==1)
                    @php $viewProducts="checked"; @endphp
                   @else
                    @php $viewProducts=''; @endphp
                   @endif
                   @if($role['edit_access']==1)
                    @php $editProducts="checked"; @endphp
                   @else
                    @php $editProducts=''; @endphp
                   @endif
                   @if($role['full_access']==1)
                    @php $fullProducts="checked"; @endphp
                   @else
                    @php $fullProducts=''; @endphp
                   @endif
                  @endif
                 @endforeach
                @endif
                <div class="form-group">
                    <label for="products">Products</label>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="products[view]" value="1" @if(isset($viewProducts)){{$viewProducts}} @endif>&nbsp;View Access &nbsp;&nbsp;
                    <input type="checkbox" name="products[edit]" value="1" @if(isset($editProducts)){{$editProducts}} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;
                    <input type="checkbox" name="products[full]" value="1" @if(isset($fullProducts)){{$fullProducts}} @endif>&nbsp;Full Access &nbsp;&nbsp;
                </div>
                @if(!empty($adminRoles))
                 @foreach($adminRoles as $role)
                  @if($role['module']=='coupons')
                   @if($role['view_access']==1)
                    @php $viewCoupons="checked"; @endphp
                   @else
                    @php $viewCoupons=''; @endphp
                   @endif
                   @if($role['edit_access']==1)
                    @php $editCoupons="checked"; @endphp
                   @else
                    @php $editCoupons=''; @endphp
                   @endif
                   @if($role['full_access']==1)
                    @php $fullCoupons="checked"; @endphp
                   @else
                    @php $fullCoupons=''; @endphp
                   @endif
                  @endif
                 @endforeach
                @endif
                <div class="form-group">
                    <label for="coupons">Coupons</label>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="coupons[view]" value="1" @if(isset($viewCoupons)){{$viewCoupons}} @endif>&nbsp;View Access &nbsp;&nbsp;
                    <input type="checkbox" name="coupons[edit]" value="1" @if(isset($editCoupons)){{$editCoupons}} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;
                    <input type="checkbox" name="coupons[full]" value="1" @if(isset($fullCoupons)){{$fullCoupons}} @endif>&nbsp;Full Access &nbsp;&nbsp;
                </div>
                @if(!empty($adminRoles))
                 @foreach($adminRoles as $role)
                  @if($role['module']=='orders')
                   @if($role['view_access']==1)
                    @php $viewOrders="checked"; @endphp
                   @else
                    @php $viewOrders=''; @endphp
                   @endif
                   @if($role['edit_access']==1)
                    @php $editOrders="checked"; @endphp
                   @else
                    @php $editOrders=''; @endphp
                   @endif
                   @if($role['full_access']==1)
                    @php $fullOrders="checked"; @endphp
                   @else
                    @php $fullOrders=''; @endphp
                   @endif
                  @endif
                 @endforeach
                @endif
                <div class="form-group">
                    <label for="orders">Orders</label>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="orders[view]" value="1" @if(isset($viewOrders)){{$viewOrders}} @endif>&nbsp;View Access &nbsp;&nbsp;
                    <input type="checkbox" name="orders[edit]" value="1" @if(isset($editOrders)){{$editOrders}} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;
                    <input type="checkbox" name="orders[full]" value="1" @if(isset($fullOrders)){{$fullOrders}} @endif>&nbsp;Full Access &nbsp;&nbsp;
                </div>
               
                <!-- <div class="form-group">[]
                    <label for="exampleInputEmail1">Admin Name</label>
                    <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Enter Admin Name" @if(!empty($admin_u)) value="{{$admin_u->name}}" @else value="{{old('name')}}" @endif>
                </div> -->
                <!--<div class="form-group">
                  <label>Select Category Level</label>
                  <select name="parent_id" id="parent_id" class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option value="0">Main Category</option>                   
                  </select>
                </div>-->
              
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                 
               

                
                <!-- /.form-group -->
               
                <!--
                <div class="form-group">
                  <label for="exampleInputFile">Category Image</label>
                  <input type="file" name="category_image" class="form-control" id="category_image" accept="image/*">
                </div>
               -->
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        </form>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection