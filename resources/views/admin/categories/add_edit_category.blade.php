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
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form name="categoryForm" id="categoryForm" @if(!empty($category_u)) action="{{url('admin/add-edit-category/'.$category_u->id)}}" @else action="{{url('admin/add-edit-category')}}" @endif method="post" enctype="multipart/form-data">@csrf
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
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name" @if(!empty($category_u)) value="{{$category_u->category_name}}" @else value="{{old('category_name')}}" @endif>
                </div>
                <!--<div class="form-group">
                  <label>Select Category Level</label>
                  <select name="parent_id" id="parent_id" class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option value="0">Main Category</option>                   
                  </select>
                </div>-->
              <div id="appendCategoriesLevel">
                 @include('admin.categories.append_categories_level')
              </div>
                <!-- /.form-group -->
               <div class="form-group">
                    <label for="exampleInputEmail1">Category Discount</label>
                    <input type="text" class="form-control" name="category_discount" id="category_discount" placeholder="Enter Category Discount" @if(!empty($category_u)) value="{{$category_u->category_discount}}" @else value="{{old('category_discount')}}" @endif>
               </div>
                <!-- /.form-group -->
                <!-- textarea -->
               <div class="form-group">
                        <label>Category Description</label>
                        <textarea class="form-control" name="category_description" id="category_description" rows="3" placeholder="Enter ...">@if(!empty($category_u)) {{$category_u->category_description}} @else {{old('category_description')}} @endif</textarea>
               </div>
               <div class="form-group">
                        <label>Meta Description</label>
                        <textarea class="form-control" name="meta_description" id="meta_description" rows="3" placeholder="Enter ...">@if(!empty($category_u)) {{$category_u->category_description}} @else {{old('category_description')}} @endif</textarea>
               </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                 <div class="form-group">
                  <label>Select Sections</label>
                  <select name="section_id" id="section_id" class="form-control select2bs4" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($section as $sec) 
                    <option value="{{$sec->id}}"  @if(isset($category_u->section_id) && $category_u->section_id==$sec->id) selected @endif>{{ $sec->name }}</option>
                    @endforeach
                  </select>
                </div>
                
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="exampleInputFile">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="category_image" class="custom-file-input"  id="category_image" accept="image/*">
                        <input type="hidden" name="category_image" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div><br>
                      @if(!empty($category_u->category_image))
                      <input type="hidden" name="category_image" class="custom-file-input" value="{{$category_u->category_image}}">
                      <img src="{{asset('images/admin/categories/small/'.$category_u->category_image)}}" width="100px" height="100px">
                      &nbsp; <a href="{{url('admin/delete-category-image/'.$category_u->id)}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this Category?')">Delete Image</a>  
                      @endif
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Category URL</label>
                    <input type="text" class="form-control" name="category_url" id="category_url" placeholder="Enter Category URL" @if(!empty($category_u)) value="{{$category_u->category_url}}" @else value="{{old('category_url')}}" @endif>
               </div>
                <!--
                <div class="form-group">
                  <label for="exampleInputFile">Category Image</label>
                  <input type="file" name="category_image" class="form-control" id="category_image" accept="image/*">
                </div>
               -->
                <div class="form-group">
                        <label>Meta Title</label>
                        <textarea class="form-control" name="meta_title" id="meta_title" rows="3" placeholder="Enter ...">@if(!empty($category_u)) {{$category_u->meta_title}} @else {{old('meta_title')}} @endif</textarea>
               </div>
                <div class="form-group">
                        <label>Meta Keywords</label>
                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="3" placeholder="Enter ...">@if(!empty($category_u)) {{$category_u->meta_keywords}} @else {{old('meta_keywords')}} @endif</textarea>
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