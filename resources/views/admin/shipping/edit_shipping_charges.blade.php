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
              <li class="breadcrumb-item active">Shipping Charges</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form name="ShippingForm" id="ShippingForm" action="{{url('admin/edit-shipping-charges/'.$shippingDetail['id'])}}" method="post" enctype="multipart/form-data">@csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Update Shipping Charges</h3>

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
                    <label for="exampleInputEmail1">Country</label><br>
                    <input type="text" id="country" name="country" class="form-control" @if(!empty($shippingDetail['country'])) value="{{$shippingDetail['country']}}" @endif disabled="">
                   
                </div>

                 <div class="form-group">
                    <label for="exampleInputEmail1">Shipping Charges (0-500g)</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="0_500g" id="0_500g" placeholder="Enter 0-500g weight Shipping Charges" @if(!empty($shippingDetail['0_500g'])) value="{{$shippingDetail['0_500g']}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Shipping Charges (501-1000g)</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="501_1000g" id="501_1000g" placeholder="Enter 501-1000g weight Shipping Charges" @if(!empty($shippingDetail['501_1000g'])) value="{{$shippingDetail['501_1000g']}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Shipping Charges (1001-2000g)</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="1001_2000g" id="1001_2000g" placeholder="Enter 0-500g weight Shipping Charges" @if(!empty($shippingDetail['1001_2000g'])) value="{{$shippingDetail['1001_2000g']}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Shipping Charges (2001-5000g)</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="2001_5000g" id="2001_5000g" placeholder="Enter 2001-5000g weight Shipping Charges" @if(!empty($shippingDetail['2001_5000g'])) value="{{$shippingDetail['2001_5000g']}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Shipping Charges (Above 5000g)</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="above_5000g" id="above_5000g" placeholder="Enter Above 5000g weight Shipping Charges" @if(!empty($shippingDetail['above_5000g'])) value="{{$shippingDetail['above_5000g']}}" @endif>
                    </div>
                </div>
                
               

               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                 
              
               
               
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