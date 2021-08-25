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
              <li class="breadcrumb-item active">Products Attributes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
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
                  <label>Product Name : {{ $productData->product_name }}</label>
                  
                </div>
                <div class="form-group">
                  <label>Product Code   : {{ $productData->product_code }}</label>
                  
                </div>
                <div class="form-group">
                  <label>Product Price   : {{ $productData->product_price }}</label>
                  
                </div>
                <div class="form-group">
                  <label>Product Color : {{ $productData->product_color }}</label>
                  <span style="background-color: {{ $productData->product_color }}; padding: 5px; padding-left: 20px; padding-right: 20px;">.</span>
                  
                </div>
              <!-- /.col -->
             </div>
              <div class="col-md-6">
                <div class="form-group">
                    <?php $image_path="images/admin/products/small/".$productData->main_image;  ?>
                    @if(!empty($productData->main_image && file_exists($image_path)))
                     <img src="{{asset('images/admin/products/small/'.$productData->main_image)}}" alt="Product Main Image" width="150px" height="130px">
                    @else
                    <img src="{{asset('images/admin/products/small/dummy.png')}}" width="150px" height="130px">
                    @endif  
                </div>


              <!-- /.col -->
             </div>
            <!-- /.row -->
            </div>
            <div>
            <form action="{{url('admin/add-product-attr/'.$productData->id)}} " method="post" enctype="multipart/form-data" id="quickForm">@csrf
              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Product's Attributes</h3>
              </div>
              <div class="card-body field_wrapper">
                <div class="row" id="append_attributes">
                  <div class="col-4">
                    <input type="text" name="sku[]" class="form-control" placeholder="SKU" required=>
                  </div>
                  <div class="col-2">
                    <input type="text" name="size[]" class="form-control" placeholder="Size" required>
                  </div>
                  <div class="col-2">
                    <input type="number" name="price[]" class="form-control" placeholder="Price" required>
                  </div>
                  <div class="col-2">
                    <input type="number" name="stock[]" class="form-control" placeholder="Stock" required>
                  </div>
                  <div class="col-2">
                    <a href="javascript:void(0);" class="btn btn-success add_button" id="add_more"><i class="fas fa-plus"></i></a>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              </div>
              <div class="form-group">
                       <input type="hidden" name="product_id" value="{{$productData->id}}">
                       <input type="submit" class="form-control btn-success" value="Add Product Attributes">
                  </div>
          </form>
            
            </div>
          <!-- /.card-body --
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
       <div class="card">
           
            <!-- /.card-header -->
            <form action="{{url('admin/edit-product-attr/'.$productData->id)}}" method="post" >@csrf
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>SKU</th>
                  <th>Stock</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productData->attributes as $pro)
                <tr>
                  <td>{{ $pro->id }}</td>
                  <input style="display: none;" type="text" name="attrId[]" value="{{ $pro->id }}">
                  <td><input style="width: 50%;" type="text" name="size[]" value="{{ $pro->size }}" required=""></td>
                  <td><input style="width: 50%;" type="number" name="price[]" value="{{ $pro->price }}" required=""></td>
                  <td><input style="width: 50%;" type="text" name="sku[]" value="{{ $pro->sku }}" required=""></td>
                  <td><input style="width: 50%;" type="number" name="stock[]" value="{{ $pro->stock }}" required=""></td>
                  <td>
                    @if($pro->status==1)
                  <a class="updateAttributeStatus" id="attribute-{{$pro->id}}" attribute_id="{{ $pro->id }}" href="javascript:void(0);"><span style="color: green;">Active</span></a>
                  @else
                  <a class="updateAttributeStatus" id="attribute-{{$pro->id}}" attribute_id="{{ $pro->id }}" href="javascript:void(0);"><span style="color: red;">Inactive</span></a>
                  @endif
                  </td>
                  <td> 
                    <button href="" class="btn btn-success"><i class="fas fa-edit"></i></button>>
                    <a title="Delete Attribute" href="{{url('admin/delete-attr/'.$pro->id)}}" onclick="return confirm('Are you sure you want to delete this Product?')" class="btn btn-danger" btn-sm><i class="fas fa-trash"></i></a>
                  </td>
                  
                </tr>
               @endforeach
                </tbody>
                <tfoot> 
                <tr>
                  <th>ID</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>SKU</th>
                  <th>Stock</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </form>
            <!-- /.card-body -->
       </div>
    </div>
        <!-- /.col -->
  </div>
      <!-- /.row -->
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection