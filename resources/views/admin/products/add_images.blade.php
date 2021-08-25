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
              <li class="breadcrumb-item active">Products Images</li>
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
           
            <form action="" method="post" enctype="multipart/form-data">@csrf
              <div class="form-group">
                <input type="file" name="image[]" class="form-control" id="image" multiple="multiple">
              </div>
              <button class="btn btn-success">Add Images</button>
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
          
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productData->images as $pro)
                <tr>
                  <td>{{ $pro->id }}</td>
                  <td>
                  <img src="{{asset('images/admin/products/small/'.$pro->image)}}" width="150px" height="150px">
                  </td>

                  <td>
                    @if($pro->status==1)
                  <a class="updateImagesStatus" id="image-{{$pro->id}}" image_id="{{ $pro->id }}" href="javascript:void(0);"><span style="color: green;">Active</span></a>
                  @else
                  <a class="updateImagesStatus" id="image-{{$pro->id}}" image_id="{{ $pro->id }}" href="javascript:void(0);"><span style="color: red;">Inactive</span></a>
                  @endif
                  </td>
                  <td> 
                     <a href="{{url('admin/delete-img/'.$pro->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                  
                </tr>
               @endforeach
                </tbody>
                <tfoot> 
                <tr>
                  <th>ID</th>
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
  </div>
  <!-- /.content-wrapper -->

@endsection