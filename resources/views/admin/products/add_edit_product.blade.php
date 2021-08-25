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
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form name="productForm" id="productForm" @if(!empty($product_u)) action="{{url('admin/add-edit-product/'.$product_u->id)}}" @else action="{{url('admin/add-edit-product')}}" @endif method="post" enctype="multipart/form-data">@csrf
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
                  <label>Select Category</label>
                  <select name="category_id" id="category_id" class="form-control select2bs4" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($categories as $sec)
                    <optgroup label="{{$sec->name}}"></optgroup>
                    @foreach($sec->categories as $cat)
                      <option value="{{ $cat->id }}" @if(!empty(@old('category_id')) && $cat->id==@old('category_id')) selected @elseif(!empty($product_u->category_id) && $product_u->category_id==$cat->id) selected @endif>--{{ $cat->category_name }}</option>
                      @foreach($cat->sub_categories as $sub)
                           <option value="{{ $sub->id }}" @if(!empty(@old('category_id')) && $sub->id==@old('category_id')) selected @elseif(!empty($product_u->category_id) && $product_u->category_id==$sub->id) selected @endif>&nbsp;&nbsp;&nbsp;--{{ $sub->category_name }}</option>
                      @endforeach   
                    @endforeach
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Select Brand</label>
                  <select name="brand_id" id="brand_id" class="form-control select2bs4" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($brands as $brand)
                      <option value="{{ $brand->id }}" @if(!empty($product_u->brand_id) && $product_u->brand_id==$brand->id) selected @endif> {{ $brand->name }} </option>
                    @endforeach
                  </select>
                </div>
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" @if(!empty($product_u)) value="{{$product_u->product_name}}" @else value="{{old('category_name')}}" @endif>
                </div> 
                 <div class="form-group">
                    <label for="exampleInputEmail1">Product Code</label>
                    <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Enter Product Cdde" @if(!empty($product_u)) value="{{$product_u->product_code}}" @else value="{{old('product_code')}}" @endif>
                </div> 
                 <div class="form-group">
                    <label for="exampleInputEmail1">Product Color</label>
                    <input type="text" class="form-control" name="product_color" id="product_color" placeholder="Enter Product Color" @if(!empty($product_u)) value="{{$product_u->product_color}}" @else value="{{old('product_color')}}" @endif>
                </div>  
                 <div class="form-group">
                  <label>Select Fabricm(Filter)</label>
                  <select name="fabric" id="fabric_id" class="form-control select2bs4" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($fabricArray as $fabric)
                      <option value="{{ $fabric }}" @if(!empty($product_u->fabric) && $product_u->fabric==$fabric) selected @endif> {{ $fabric }} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Select Sleeve(Filter)</label>
                  <select name="sleeve" id="sleeve_id" class="form-control select2bs4" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($sleeveArray as $sleeve)
                      <option value="{{ $sleeve }}" @if(!empty($product_u->sleeve) && $product_u->sleeve==$sleeve) selected @endif> {{ $sleeve }} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Select Pattern(Filter)</label>
                  <select name="pattern" id="pattern_id" class="form-control select2bs4" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($patternArray as $pattern)
                      <option value="{{ $pattern }}" @if(!empty($product_u->pattern) && $product_u->pattern==$pattern) selected @endif> {{ $pattern }} </option>
                    @endforeach
                  </select>
                </div>
                   
               <div class="form-group">
                    <label for="exampleInputFile">Product Video</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="product_video" class="custom-file-input"  id="product_video" accept="video/*">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                      @if(!empty($product_u->product_video))
                      <input type="hidden" name="product_video" class="custom-file-input" value="{{$product_u->product_video}}">
                       <a href="{{ url('videos/admin/products/'.$product_u->product_video.'/'.$product_u->product_video) }}"download class="btn btn-success">Download</a>  <a href="{{url('admin/delete-product-video/'.$product_u->id)}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this product?')">Delete Video</a> 
                      @endif
                </div>
                <!-- /.form-group -->
                <!-- textarea -->
               <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="product_description" id="product_description" rows="3" placeholder="Enter ...">@if(!empty($product_u)) {{$product_u->description}} @else {{old('description')}} @endif</textarea>
               </div>
               <div class="form-group">
                        <label>Meta Description</label>
                        <textarea class="form-control" name="meta_description" id="meta_description" rows="3" placeholder="Enter ...">@if(!empty($product_u)) {{$product_u->meta_description}} @else {{old('meta_description')}} @endif</textarea>
               </div>
              
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- /.form-group -->
                
                <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="product_image" class="custom-file-input"  id="product_image" accept="image/*">
                        <input type="hidden" name="product_image" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div> Recommended Image size : width 1024, height 1280<br>
                      @if(!empty($product_u->main_image))
                      <input type="hidden" name="product_image" class="custom-file-input" value="{{$product_u->main_image}}">
                      <img src="{{asset('images/admin/products/small/'.$product_u->main_image)}}" width="100px" height="100px">
                      &nbsp; <a href="{{url('admin/delete-product-image/'.$product_u->id)}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this product?')">Delete Image</a>  
                      @endif
                </div>
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Price</label>
                    <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Product Price" @if(!empty($product_u)) value="{{$product_u->product_price}}" @else value="{{old('product_price')}}" @endif>
                </div>   
                 <div class="form-group">
                    <label for="exampleInputEmail1">Product Diecount</label>
                    <input type="text" class="form-control" name="product_discount" id="product_discount" placeholder="Enter Product Diecount" @if(!empty($product_u)) value="{{$product_u->product_discount}}" @else value="{{old('product_discount')}}" @endif>
                </div>    
                 <div class="form-group">
                    <label for="exampleInputEmail1">Product Weight</label>
                    <input type="text" class="form-control" name="product_weight" id="product_weight" placeholder="Enter Product Weight" @if(!empty($product_u)) value="{{$product_u->product_weight}}" @else value="{{old('product_weight')}}" @endif>
               </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Wash Care</label>
                    <input type="text" class="form-control" name="wash_care" id="wash_care" placeholder="Enter Wash Care" @if(!empty($product_u)) value="{{$product_u->wash_care}}" @else value="{{old('wash_care')}}" @endif>
                </div>              
                <div class="form-group">
                  <label>Select Fit(Filter)</label>
                  <select name="fit" id="fit_id" class="form-control select2bs4" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($fitArray as $fit)
                      <option value="{{ $fit }}" @if(!empty($product_u->fit) && $product_u->fit==$fit) selected @endif> {{ $fit }} </option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Select Occassion(Filter)</label>
                  <select name="occasion" id="occassion_id" class="form-control select2bs4" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($occassionArray as $occassion)
                      <option value="{{ $occassion }}" @if(!empty($product_u->occassion) && $product_u->occassion==$occassion) selected @endif> {{ $occassion }} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                        <label>Meta Title</label>
                        <textarea class="form-control" name="meta_title" id="meta_title" rows="3" placeholder="Enter ...">@if(!empty($product_u)) {{$product_u->meta_title}} @else {{old('meta_title')}} @endif</textarea>
               </div>
                <div class="form-group">
                        <label>Meta Keywords</label>
                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="3" placeholder="Enter ...">@if(!empty($product_u)) {{$product_u->meta_keywords}} @else {{old('meta_keywords')}} @endif</textarea>
               </div>
               <div class="form-group">
                    <label for="GroupCode">Group Code</label>
                    <input type="text" class="form-control" name="group_code" id="group_code" placeholder="Enter Group Code" @if(!empty($product_u)) value="{{$product_u->group_code}}" @else value="{{old('group_code')}}" @endif>
                </div> 
               <div class="form-group">
                        <label>Featured Product</label>&nbsp;
                        <input type="checkbox" name="featured" id="featured" @if(!empty($product_u->is_featured) && $product_u->is_featured=="Yes") checked @endif value="1">
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