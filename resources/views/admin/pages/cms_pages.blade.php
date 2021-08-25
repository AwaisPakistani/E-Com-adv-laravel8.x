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
              <li class="breadcrumb-item active">CMS Pages</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
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
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
       <div class="card">
            <div class="card-header">
              <h3 class="card-title">CMS Pages</h3>
              <a href="{{url('admin/add-edit-cms-page')}}" style="max-width: 200px; display: inline-block; float: right;" class="btn btn-block btn-outline-secondary btn-flat"><i class="fas fa-save"></i> Add Cms Page</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>URL</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cms_pages as $cp)
                <tr>
                  <td>{{ $cp->id }}</td>
                  <td>{{ $cp->title }}</td>
                  <td>{{ $cp->url }}</td> 
                  <td>
                  @if($cp->status==1)
                  <a class="updateCmsPagetatus" id="cmsPage-{{$cp->id}}" cmsPage_id="{{ $cp->id }}" href="javascript:void(0);"><i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                  @else
                  <a class="updateCmsPagetatus" id="cmsPage-{{$cp->id}}" cmsPage_id="{{ $cp->id }}" href="javascript:void(0);"><i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                  @endif
                  </td>
                  <td><a href="{{url('admin/delete-cms-page/'.$cp->id)}}" onclick="return confirm('Are you sure you want to delete this coupon?')" class="btn btn-danger" btn-sm><i class="fas fa-trash"></i></a>
                   <a href="{{url('admin/add-edit-cms-page/'.$cp->id)}}" class="btn btn-success" btn-sm><i class="fas fa-edit"></i></a></td>
                  
                </tr>
               @endforeach
                </tbody>
                <tfoot> 
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>URL</th>
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