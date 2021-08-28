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
        <form name="adminForm" id="adminForm" @if(!empty($adminData_u)) action="{{url('admin/add-edit-admins-subadmins/'.$adminData_u->id)}}" @else action="{{url('admin/add-edit-admins-subadmins')}}" @endif method="post" enctype="multipart/form-data">@csrf
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
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Name</label>
                    <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Enter Admin Name" @if(!empty($adminData_u)) value="{{$adminData_u->name}}" @else value="{{old('name')}}" @endif>
                </div>
                <div class="form-group">
                  <label for="admin_type">Admin Type</label>
                  <select name="admin_type" id="admin_type" class="select2bs4" data-placeholder="Select a State" style="width: 100%;">
                    <option @if(!empty($adminData_u && $adminData_u->type=='admin')) selected="" @endif  value="admin">Admin</option> 
                    <option @if(!empty($adminData_u && $adminData_u->type=='subadmin')) selected="" @endif value="subadmin">Sub Admin</option>                  
                  </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Mobile</label>
                    <input type="text" class="form-control" name="admin_mobile" id="admin_mobile" placeholder="Enter Admin Mobile" @if(!empty($adminData_u)) value="{{$adminData_u->mobile}}" @else value="{{old('mobile')}}" @endif>
                </div>
                <!-- <div class="form-group">
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
                 
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                    <input type="email" class="form-control" name="admin_email" id="admin_email" @if(!empty($adminData_u->email)) disabled="" @else required="" @endif placeholder="Enter Admin Email" @if(!empty($adminData_u)) value="{{$adminData_u->email}}" @else value="{{old('email')}}" @endif>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Password</label>
                    <input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Enter Admin Password" >
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Admin Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="admin_image" class="custom-file-input"  id="admin_image" accept="image/*">
                        <input type="hidden" name="admin_image" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div><br>
                      @if(!empty($adminData_u->image))
                      <input type="hidden" name="admin_image" class="custom-file-input" value="{{$adminData_u->image}}">
                      <img src="{{asset('images/admin/admin_profiles/small/'.$adminData_u->image)}}" width="100px" height="100px">
                      &nbsp; <a href="{{url('admin/delete-adminsSubadmins-image/'.$adminData_u->id)}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this product?')">Delete Image</a>  
                      @endif
                </div>
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