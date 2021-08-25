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
              <li class="breadcrumb-item active">CMS Pages</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form name="cmsPageForm" id="cmsPageForm" @if(!empty($cmsPage_u)) action="{{url('admin/add-edit-cms-page/'.$cmsPage_u->id)}}" @else action="{{url('admin/add-edit-cms-page')}}" @endif method="post" enctype="multipart/form-data">@csrf
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
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" @if(!empty($cmsPage_u)) value="{{$cmsPage_u->title}}" @else value="{{old('title')}}" @endif>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">URL</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Enter URL" @if(!empty($cmsPage_u)) value="{{$cmsPage_u->url}}" @else value="{{old('url')}}" @endif>
                </div>
                <div class="card-body pad">
                     <div class="mb-3">
                       <label>Description</label>
                       <textarea class="textarea" name="description" placeholder="Enter Page Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Enter ...">@if(!empty($cmsPage_u)) {{$cmsPage_u->description}} @else {{old('description')}} @endif</textarea>
                     </div>
                  </div>
               
               
              
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                 
                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title" @if(!empty($cmsPage_u)) value="{{$cmsPage_u->meta_title}}" @else value="{{old('meta_title')}}" @endif>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords" @if(!empty($cmsPage_u)) value="{{$cmsPage_u->meta_keywords}}" @else value="{{old('meta_keywords')}}" @endif>
                </div>
                
                <div class="card-body pad">
                     <div class="mb-3">
                       <label>Meta Description</label>
                       <textarea class="textarea" name="meta_description" placeholder="Enter Page Page Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Enter ...">@if(!empty($cmsPage_u)) {{$cmsPage_u->meta_description}} @else {{old('meta_description')}} @endif</textarea>
                     </div>
                  </div>
                
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