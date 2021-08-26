@extends('layouts.adminLayout.admin_layout')
@section('content')
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admins / SubAdmis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
       <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admins / SubAdmins</h3>
              <a href="{{url('admin/add-edit-admins-subadmins')}}" style="max-width: 200px; display: inline-block; float: right;" class="btn btn-block btn-outline-secondary btn-flat"><i class="fas fa-save"></i> Add Admin / SubAdmins</a>
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
            </div>
         
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins_subadmins as $admins)
                <tr>
                  <td>{{ $admins['id'] }}</td>
                  <td>{{ $admins['name'] }}</td>
                  <td>{{ $admins['type'] }}</td>
                  <td>{{ $admins['mobile'] }}</td>
                  <td>{{$admins['email']}}</td>
                  
                  <td><img src="{{asset('images/admin/admin_profiles/small/'.$admins['image'])}}" height="75px" width="75px"></td>
                  <td>
                  @if($admins['type']!='superadmin')
                  @if($admins['status']==1)
                  <a class="updateAdminsStatus" id="admins-{{$admins['id']}}" admins_id="{{ $admins['id'] }}" href="javascript:void(0);"><i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                  @else
                  <a class="updateAdminsStatus" id="admins-{{$admins['id']}}" admins_id="{{ $admins['id'] }}" href="javascript:void(0);"><i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                  @endif
                  @endif
                  </td>
                  <td>
                  @if($admins['type']!='superadmin')
                  <a title="Update Admins / SubAdmins Roles" href="{{url('admin/update-admins-roles/'.$admins['id'])}}" class="btn btn-warning" btn-sm><i class="fas fa-pen"></i></a>
                  <a title="Delete Admins / Subadmins" href="{{url('admin/delete-admins-subadmins/'.$admins['id'])}}" onclick="return confirm('Are you sure you want to delete this brand?')" class="btn btn-danger" btn-sm><i class="fas fa-trash"></i></a>
                  <a title="Update Admins / SubAdmins" href="{{url('admin/add-edit-admins-subadmins/'.$admins['id'])}}" class="btn btn-success" btn-sm><i class="fas fa-edit"></i></a>
                  @endif
                </td>
                  
                </tr>
               @endforeach
                </tbody>
                <tfoot> 
                <tr>
                <th>ID</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
       </div>
    </div>
        <!-- /.col -->
  </div>
      <!-- /.row -->
</section>
    <!-- /.content -->
          <!-- /.card -->
</div>
@endsection