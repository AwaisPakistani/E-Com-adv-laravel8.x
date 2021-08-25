<?php 
use App\Models\Product;
?>
@extends('layouts.adminLayout.admin_layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order #{{$orderDetail['id']}} Detail</li>
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
      <div class="container-fluid">
        <div class="row">

           <!-- /.col -->
          <div class="col-md-6">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Delievery Address</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <!-- <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                <td>Name</td>
                <td>{{$orderDetail['name']}}</td>
              </tr>
              <tr>
                <td>Address</td>
                <td>{{$orderDetail['address']}}</td>
              </tr>
              <tr>
                <td>City</td>
                <td>{{$orderDetail['city']}}</td>
              </tr>
              <tr>
                <td>State</td>
                <td>{{$orderDetail['state']}}</td>
              </tr>
              <tr>
                <td>Country</td>
                <td>{{$orderDetail['country']}}</td>
              </tr>
              <tr>
                <td>Pincode</td>
                <td>{{$orderDetail['pincode']}}</td>
              </tr>
              <tr>
                <td>Mobile</td>
                <td>{{$orderDetail['mobile']}}</td>
              </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Billing Address</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <!-- <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                <td>Name</td>
                <td>{{$userDetail['name']}}</td>
              </tr>
              <tr>
                <td>Address</td>
                <td>{{$userDetail['address']}}</td>
              </tr>
              <tr>
                <td>City</td>
                <td>{{$userDetail['city']}}</td>
              </tr>
              <tr>
                <td>State</td>
                <td>{{$userDetail['state']}}</td>
              </tr>
              <tr>
                <td>Country</td>
                <td>{{$userDetail['country']}}</td>
              </tr>
              <tr>
                <td>Pincode</td>
                <td>{{$userDetail['pincode']}}</td>
              </tr>
              <tr>
                <td>Mobile</td>
                <td>{{$userDetail['mobile']}}</td>
              </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customer Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <!-- <tr>
                      <td colspan="2">Order Detail</td>
                    </tr> -->
                  </thead>
                  <tbody>
                    
                       <tr>
                         <td>Name</td>
                         <td>{{$userDetail['name']}}</td>
                       </tr>
                       <tr>
                         <td>Email</td>
                         <td>{{$userDetail['email']}}</td>
                       </tr>
             
             
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <!-- <tr>
                      <td colspan="2">Order Detail</td>
                    </tr> -->
                  </thead>
                  <tbody>
                    
              <tr>
                <td>Order Date</td>
                <td>{{date('d-m-Y',strtotime($orderDetail['created_at']))}}</td>
              </tr>
              <tr>
                <td>Order Status</td>
                <td>{{$orderDetail['order_status']}}</td>
              </tr>
              @if(!empty($orderDetail['courier_name']))
              <tr>
                <td>Courier Nme</td>
                <td>{{$orderDetail['courier_name']}}</td>
              </tr>
              @endif
              @if(!empty($orderDetail['tracking_number']))
              <tr>
                <td>Tracking Number</td>
                <td>{{$orderDetail['tracking_number']}}</td>
              </tr>
              @endif
              <tr>
                <td>Order Total Amount</td>
                <td>{{$orderDetail['grand_total']}}</td>
              </tr>
              <tr>
                <td>Shipping Charges</td>
                <td>{{$orderDetail['shipping_charges']}}</td>
              </tr>
              <tr>
                <td>Coupon Code</td>
                <td>{{$orderDetail['coupon_code']}}</td>
              </tr>
              <tr>
                <td>Coupon Amount</td>
                <td>{{$orderDetail['coupon_amount']}}</td>
              </tr>
              <tr>
                <td>Payment Method</td>
                <td>{{$orderDetail['payment_method']}}</td>
              </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Order Status</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <!-- <tr>
                      <td colspan="2">Order Detail</td>
                    </tr> -->
                  </thead>
                  <tbody>
                       <tr>
                         <td colspan="2">
                          <form action="{{url('admin/update-order-status')}}" method="post">@csrf
                          <input type="hidden" name="order_id" value="{{$orderDetail['id']}}">
                          <span>
                           <select name="order_status" required="" id="order_status">
                             <option value="">Select Status</option>
                             @foreach($orderStatuses as $ordSt)
                             <option @if(isset($orderDetail['order_status']) && $orderDetail['order_status']==$ordSt['name']) selected="" @endif value="{{$ordSt['name']}}">{{$ordSt['name']}}</option>
                             @endforeach
                           </select>&nbsp;&nbsp;
                           <input style="width: 120px;" type="text" name="courier_name" @if(empty($orderDetail['courier_name'])) id="courier_name" @endif placeholder="Courier Name" value="{{$orderDetail['courier_name']}}">
                            <input style="width: 120px;" type="text" name="tracking_number" @if(empty($orderDetail['tracking_number'])) id="tracking_number" @endif placeholder="Tracking No." value="{{$orderDetail['tracking_number']}}">
                           <button type="submit" class="btn btn-default btn-sm">Update</button>
                          </span>
                          </form>
                         </td>
                         
                       </tr>
                  <tr>
                    <td colspan="2">
                      @foreach($ordersLog as $log)
                           <strong>{{$log['order_status']}}</strong><br>
                           {{date('F j, Y, g:i a',strtotime($log['created_at']))}}<hr>
                      @endforeach
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>

          </div>
         
        </div>
        <!-- /.row -->
       
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ordered Products</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                    <th>Product Image</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Size</th>
                    <th>Product Color</th>
                    <th>Product quantity</th>
                    <th></th>
                 </tr>
                  </thead>
                  <tbody>
                    @foreach($orderDetail['orders_products'] as $detail)
                  <tr>
                    <td>
                      <?php $getProMainImage=Product::getProductMainImage($detail['product_id']) ?>
                      <a target="_blank" href="{{url('product/'.$detail['product_id'])}}"><img src="{{asset('images/admin/products/small/'.$getProMainImage)}}" alt="Main Image" width="100px"></a>
                    </td>
                    <td>{{$detail['product_code']}}</td>
                    <td>{{$detail['product_name']}}</td>
                    <td>{{$detail['product_size']}}</td>
                    <td>{{$detail['product_color']}}</td>
                    <td>{{$detail['product_qty']}}</td>
                  </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<!-- /.content -->
          <!-- /.card -->
</div>
@endsection