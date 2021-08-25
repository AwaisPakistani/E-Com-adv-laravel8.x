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
              <li class="breadcrumb-item active">Shipping Charges</li>
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
              <h3 class="card-title">Shipping Charges</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Country</th>
                  <th>0-500g</th>
                  <th>501-1000g</th>
                  <th>1001-2000g</th>
                  <th>2001-5000g</th>
                  <th>Above 5000g</th>
                  <th>Status</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shipping_charges as $sc)
                <tr>
                  <td>{{ $sc['id'] }}</td>
                  <td>{{ $sc['country'] }}</td>
                  <td>PKR : {{ $sc['0_500g'] }}</td>
                  <td>PKR : {{ $sc['501_1000g'] }}</td>
                  <td>PKR : {{ $sc['1001_2000g'] }}</td>
                  <td>PKR : {{ $sc['2001_5000g'] }}</td>
                  <td>PKR : {{ $sc['above_5000g'] }}</td>
                  <td>
                  @if($sc['status']==1)
                  <a class="updateShippingStatus" id="shipping-{{$sc['id']}}" shipping_id="{{ $sc['id'] }}" href="javascript:void(0);"><i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                  @else
                  <a class="updateShippingStatus" id="shipping-{{$sc['id']}}" shipping_id="{{ $sc['id'] }}" href="javascript:void(0);"><i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                  @endif
                  </td>
                  <td>{{date('d-m-Y',strtotime($sc['updated_at']))}}</td>
                  <td>
                   <a title="Update Shippig Charges" href="{{url('admin/edit-shipping-charges/'.$sc['id'])}}" class="btn btn-success" btn-sm><i class="fas fa-edit"></i></a></td>
                  
                </tr>
               @endforeach
                </tbody>
                <tfoot> 
                <tr>
                  <th>ID</th>
                  <th>Country</th>
                  <th>0-500g</th>
                  <th>501-1000g</th>
                  <th>1001-2000g</th>
                  <th>2001-5000g</th>
                  <th>Above 5000g</th>
                  <th>Status</th>
                  <th>Updated at</th>
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