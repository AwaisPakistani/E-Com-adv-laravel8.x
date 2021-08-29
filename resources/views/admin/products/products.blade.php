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
              <li class="breadcrumb-item active">Products</li>
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
              <h3 class="card-title">Products</h3>
               <a href="{{url('admin/add-edit-product')}}" style="max-width: 200px; display: inline-block; float: right;" class="btn btn-block btn-outline-secondary btn-flat"><i class="fas fa-save"></i> Add Product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Color</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Section</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $pro)
                <tr>
                  <td>{{ $pro->id }}</td>
                  <td>{{ $pro->product_name }}</td>
                  <td>{{$pro->product_code}}</td>
                  <td>{{ $pro->product_color }}</td>
                  <td>
                    <?php $image_path="images/admin/products/small/".$pro->main_image;  ?>
                    @if(!empty($pro->main_image && file_exists($image_path)))
                    <img src="{{asset('images/admin/products/small/'.$pro->main_image)}}" style="width: 50px; height: 50px;">
                    @else
                    <img src="{{asset('images/admin/products/small/dummy.png')}}" style="width: 50px; height: 50px;">
                    @endif
                  </td>
                  <td>{{ $pro->category->category_name }}</td>
                  <td>{{ $pro->section->name }}</td>
                  <td>
                  @if($productModuleRole['edit_access']==1 || $productModuleRole['full_access']==1)
                  @if($pro->status==1)
                  <a class="updateProductStatus" id="product-{{$pro->id}}" product_id="{{ $pro->id }}" href="javascript:void(0);"><i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                  @else
                  <a class="updateProductStatus" id="product-{{$pro->id}}" product_id="{{ $pro->id }}" href="javascript:void(0);"><i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                  @endif
                  @endif
                  </td>
                  <td>
                  @if($productModuleRole['full_access']==1)
                  <a title="Delete Product" href="{{url('admin/delete-product/'.$pro->id)}}" onclick="return confirm('Are you sure you want to delete this Product?')" class="btn btn-danger" btn-sm><i class="fas fa-trash"></i></a>
                  @endif
                   @if($productModuleRole['edit_access']==1 || $productModuleRole['full_access']==1)
                   <a title="Edit Product" href="{{url('admin/add-edit-product/'.$pro->id)}}" class="btn btn-success" btn-sm><i class="fas fa-edit"></i></a>
                    <a title="Add/Edit Attributes" href="{{url('admin/add-product-attr/'.$pro->id)}}" class="btn btn-info" btn-sm><i class="fas fa-plus"></i></a>
                    <a title="Add/Edit Images" href="{{url('admin/add-product-imgs/'.$pro->id)}}" class="btn btn-info" btn-sm><i class="fas fa-plus-circle"></i></a>
                    @endif
                  </td>
                  
                </tr>
               @endforeach
                </tbody>
                <tfoot> 
                <tr>
                 <th>ID</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Color</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Section</th>
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