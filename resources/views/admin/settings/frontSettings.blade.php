@extends('layouts.adminLayout.admin_layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
              <h3 class="card-title">Front Settings</h3>
              <a href="{{url('admin/edit-front-setting')}}" style="max-width: 200px; display: inline-block; float: right;" class="btn btn-block btn-outline-secondary btn-flat"><i class="fas fa-save"></i> Add Front Setting</a>
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
                  <th>Image</th>
                  <th>Social</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($frontSettings as $setting)
                <tr>
                  <td>{{ $setting->id }}</td>
                 
                  <td>
                    <img src="{{asset('images/admin/logo/'.$setting->image)}}" width="150px" height="150px"></td>
                  
                  <td>{{ $setting->about }}</td>
                  <td>

                   <a href="{{url('admin/edit-front-setting/'.$setting->id)}}" class="btn btn-success" btn-sm><i class="fas fa-edit"></i></a>
                  </td>
                  
                </tr><br>
               @endforeach
                </tbody>
                <tfoot> 
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Social</th>
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