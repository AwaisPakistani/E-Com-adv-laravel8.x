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
              <li class="breadcrumb-item active">Currencies</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form name="currencyForm" id="currencyForm" @if(!empty($currency_u)) action="{{url('admin/add-edit-currency/'.$currency_u->id)}}" @else action="{{url('admin/add-edit-currency')}}" @endif method="post" enctype="multipart/form-data">@csrf
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

          @if(Session::has('succees_message')) 
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ Session::get('succees_message')}}</strong>
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
                    <label for="exampleInputEmail1">Currency Code</label>
                    <input type="text" class="form-control" name="currency_code" id="currency_code" placeholder="Enter Currency Code" @if(!empty($currency_u)) value="{{$currency_u->currency_code}}" @else value="{{old('currency_code')}}" @endif>
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Currency Rate</label>
                    <input type="text" class="form-control" name="currency_rate" id="currency_rate" placeholder="Enter Currency Rate" @if(!empty($currency_u)) value="{{$currency_u->currency_rate}}" @else value="{{old('currency_rate')}}" @endif>
                </div>
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