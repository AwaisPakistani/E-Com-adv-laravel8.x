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
              <li class="breadcrumb-item active">Coupons</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form name="BannerForm" id="CouponForm" @if(!empty($coupon_u)) action="{{url('admin/add-edit-coupon/'.$coupon_u->id)}}" @else action="{{url('admin/add-edit-coupon')}}" @endif method="post" enctype="multipart/form-data">@csrf
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
                @if(empty($coupon['coupon_code']))
                <div class="form-group">
                    <label for="exampleInputEmail1">Coupon Option</label>
                    <div class="form-group">
                    <span><input type="radio" id="AutomaticCoupon" name="coupon_option" value="Automatic">&nbsp;&nbsp;Automatic</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><input type="radio" id="ManualCoupon" name="coupon_option" value="Manual">&nbsp;&nbsp;Manual</span>
                    </div>
                </div>
                <div class="form-group" style="display: none;" id="couponField">
                    <label for="exampleInputEmail1">Coupon Code</label>
                    <input type="text" class="form-control" name="coupon_code" id="Coupon_code" placeholder="Enter Coupon Code" @if(!empty($Coupon_u)) value="{{$Coupon_u->coupon_code}}" @else value="{{old('coupon_code')}}" @endif>
                </div>
                @else
                <input type="hidden" name="coupon_option" value="{{$coupon['coupon_option']}}">
                <input type="hidden" name="coupon_code" value="{{$coupon['coupon_code']}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Coupon Code : </label>
                    <span>{{$coupon['coupon_code']}}</span>
                </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Coupon Type</label>
                    <div class="form-group">
                    <span><input type="radio" name="coupon_type" value="Multiple Times" @if(!empty($coupon['coupon_type']&& $coupon['coupon_type']=='Multiple Times')) checked="" @endif>&nbsp;&nbsp;Multiple Times</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><input type="radio" name="coupon_type" value="Single Time" @if(!empty($coupon['coupon_type']&& $coupon['coupon_type']=='Single Time')) checked="" @endif>&nbsp;&nbsp;Single Time</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount Type</label>
                    <div class="form-group">
                    <span><input type="radio" name="amount_type" value="Percentage" @if(!empty($coupon['amount_type']&& $coupon['amount_type']=='Percentage')) checked="" @endif>&nbsp;&nbsp;Percentage &nbsp;(%)</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><input type="radio" name="amount_type" value="Fixed" @if(!empty($coupon['amount_type']&& $coupon['amount_type']=='Fixed')) checked="" @endif>&nbsp;&nbsp;Fixed &nbsp; (In PKR)</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <div class="form-group">
                    <input type="number" class="form-control" name="amount" id="amunt" placeholder="Enter Amount" @if(!empty($coupon['amount'])) value="{{$coupon['amount']}}" @endif>
                    </div>
                </div>
                
               

               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                 
               
              <div class="form-group">
                  <label>Select Category</label>
                  <select name="categories[]" class="form-control select2bs4" multiple="" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($categories as $sec)
                    <optgroup label="{{$sec->name}}"></optgroup>
                    @foreach($sec->categories as $cat)
                      <option value="{{ $cat->id }}" @if(in_array($cat->id,$selCats)) selected="" @endif>--{{ $cat->category_name }}</option>
                      @foreach($cat->sub_categories as $sub)
                           <option value="{{ $sub->id }}" @if(in_array($sub->id,$selCats)) selected="" @endif>&nbsp;&nbsp;&nbsp;--{{ $sub->category_name }}</option>
                      @endforeach   
                    @endforeach
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Select Users</label>
                  <select name="users[]" class="form-control select2bs4" multiple="" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($users as $user)
                     <option value="{{$user['email']}}" @if(in_array($user['email'],$selUsers)) selected="" @endif>{{$user['email']}}</option>           
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Expiry Date</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="expiry_date" id="expiry_date" placeholder="Enter Expiry Date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask @if(!empty($coupon['expiry_date'])) value="{{$coupon['expiry_date']}}" @endif>
                  </div>
                  <!-- /.input group -->
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