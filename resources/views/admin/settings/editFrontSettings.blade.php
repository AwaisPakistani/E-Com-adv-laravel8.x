@extends('layouts.adminLayout.admin_layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
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
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form name="brandForm" id="brandForm" @if(!empty($settings_u)) action="{{url('admin/edit-front-setting/'.$settings_u->id)}}" @else action="{{url('admin/edit-front-setting')}}" @endif method="post" enctype="multipart/form-data">@csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Update Front Settings</h3>

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

          
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  @if(!empty($settings_u->image))
                  
                  <input type="hidden" name="image" class="custom-file-input" value="{{$settings_u->image}}">
                  <img src="{{asset('images/admin/logo/'.$settings_u->image)}}" width="350px" height="150px"><br><br>
                  <!-- <label class="btn btn-warning">Replace Image 
                  <input type="file" name="image" class="form-control" style="display: none;" value="{{$settings_u->image}}">
                  </label> -->
                  <a class="btn btn-warning" href="{{url('admin/delete-logo/'.$settings_u->id)}}" onclick="return confirm('Are you sure you want to delete this logo?'">Delete Image</a>
                  @else
                    <label for="exampleInputEmail1">Website Logo</label>
                    <input type="file" class="form-control" name="image" id="image">
                  @endif
                </div>
                <span>Logo size must be same as : width=400px; height=142;</span>
                <div class="form-group">
                    <label for="exampleInputEmail1">Social</label><br>
                  
                      <div id="socialFieldGroup">
                        @if(!empty($settings_u))
                        @foreach($settings_u->social as $social)
                         <input type="url" class="form-control socialCount" name="social[]" id="social" placeholder="Enter Social Link" @if(!empty($settings_u)) value="{{$social}}" @else value="{{old('social')}}" @endif><br>
                        @endforeach
                        @else
                        <input type="url" class="form-control socialCount" name="social[]" id="social" placeholder="Enter Social Link" @if(!empty($settings_u)) value="{{$social}}" @else value="{{old('social')}}" @endif>
                        <input type="hidden" name="image" class="custom-file-input"><br>
                        @endif
                      </div><br>
                    <span style="float: right;" class="btn btn-success" id="addsocialField"><i class="fa fa-plus"></i></span>
                    

                    <p class="text-muted">e.g. https://www.facebook.com/wnc</p>
                </div>
                <div class="form-group">
                  <div class="alert alert-danger alert-dismissible noshow" id="socialalert">
                    <a href="#" class="close" data-dismiss='alert'>&times;</a>
                    <strong>Sorry ! </strong> You've reached the social fields limit
                  </div>
                </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">About Us</label>
                    <textarea class="form-control" name="about" id="about" rows="5" placeholder="Enter Footer About">
                      @if(!empty($settings_u)) {{$settings_u->about}} @else {{old('about')}} @endif
                    </textarea>
                </div> 
              </div>
              <!-- /.col -->
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