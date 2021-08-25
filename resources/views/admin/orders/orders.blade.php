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
              <li class="breadcrumb-item active">Orders</li>
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
              <h3 class="card-title">Orders</h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Ordered Products</th>
                  <th>Order Amount</th>
                  <th>Order Status</th>
                  <TH>Payment Method</TH>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$order['id']}}</td>
                    <td>{{date('d-m-Y',strtotime($order['created_at']))}}</td>
                    <td>{{$order['name']}}</td>
                    <td>{{$order['email']}}</td>
                    <td>
                      @foreach($order['orders_products'] as $pro)
                                          {{$pro['product_code']}} : {{$pro['product_qty']}}<br>
                      @endforeach
                    </td>
                    <td>{{$order['grand_total']}}</td>
                    <td>{{$order['order_status']}}</td>
                    <td>{{$order['payment_method']}}</td>
                    <td>
                      <a title="View Order Detail" href="{{url('/admin/orders/'.$order['id'])}}" class="btn btn-success btn-sm"><i class="fa fa-file"></i></a>
                      @if($order['order_status']=="Shipped" || $order['order_status']=="Delievered")
                      <a title="View Order Invoice" href="{{url('/admin/view-order-invoice/'.$order['id'])}}" class="btn btn-success btn-sm"><i class="fa fa-print"></i></a>

                      <a title="Print PDF Invoice" href="{{url('/admin/print-pdf-invoice/'.$order['id'])}}" class="btn btn-success btn-sm"><i class="far fa-file-pdf"></i></a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot> 
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Ordered Products</th>
                  <th>Order Amount</th>
                  <th>Order Status</th>
                  <TH>Payment Method</TH>
                  <th>Actions</th>
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