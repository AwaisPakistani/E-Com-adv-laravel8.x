$(document).ready(function(){
  /*$("#sort").change(function(){
     this.form.submit();
  });*/
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // sorting using ajax
  $("#sort").change(function(){
     //alert('check');
     var brand=get_filter('brand');
     var occassion=get_filter('occassion');
     var fit=get_filter('fit');
     var pattern=get_filter('pattern'); 
     var fabric=get_filter('fabric');
     var sleeve=get_filter('sleeve');
     var sort=$(this).val();
     var url=$('#url').val();
     $.ajax({
       url:url,
       type:"get",
       data:{brand:brand,occassion:occassion,fit:fit,pattern:pattern,fabric:fabric,sleeve:sleeve,sort:sort,url:url},
       success:function(data){
       $('.filter_products').html(data);
       },error:function(){
       	alert('error');
       }
     });
  });
  
  // For filters
  $('.fabric').click(function(){
     var brand=get_filter('brand');
     var occassion=get_filter('occassion');
     var fit=get_filter('fit');
     var pattern=get_filter('pattern'); 
     var fabric=get_filter('fabric');
     var sleeve=get_filter('sleeve');
     var sort=$('#sort option:selected').val();
     var url=$('#url').val();
     //alert(sort);
     $.ajax({
       url:url,
       type:"get",
       data:{brand:brand,occassion:occassion,fit:fit,pattern:pattern,fabric:fabric,sleeve:sleeve,sort:sort,url:url},
       success:function(data){
       $('.filter_products').html(data);
       },error:function(){
        alert('error');
       }
     });
  });
   // For filters
  $('.brand').click(function(){
     var brand=get_filter('brand');
     var occassion=get_filter('occassion');
     var fit=get_filter('fit');
     var pattern=get_filter('pattern'); 
     var fabric=get_filter('fabric');
     var sleeve=get_filter('sleeve');
     var sort=$('#sort option:selected').val();
     var url=$('#url').val();
     //alert(sort);
     $.ajax({
       url:url,
       type:"get",
       data:{brand:brand,occassion:occassion,fit:fit,pattern:pattern,fabric:fabric,sleeve:sleeve,sort:sort,url:url},
       success:function(data){
       $('.filter_products').html(data);
       },error:function(){
        alert('error');
       }
     });
  });
  
  $('.sleeve').click(function(){
     var brand=get_filter('brand');
     var occassion=get_filter('occassion');
     var fit=get_filter('fit');
     var pattern=get_filter('pattern'); 
     var fabric=get_filter('fabric');
     var sleeve=get_filter('sleeve');
     var sort=$('#sort option:selected').val();
     var url=$('#url').val();
     $.ajax({
       url:url,
       type:"get",
       data:{brand:brand,occassion:occassion,fit:fit,pattern:pattern,fabric:fabric,sleeve:sleeve,sort:sort,url:url},
       success:function(data){
       $('.filter_products').html(data);
       },error:function(){
        alert('error');
       }
     });
  });
 
  $('.pattern').click(function(){
     var brand=get_filter('brand');
     var occassion=get_filter('occassion');
     var fit=get_filter('fit');
     var pattern=get_filter('pattern'); 
     var fabric=get_filter('fabric');
     var sleeve=get_filter('sleeve');
     var sort=$('#sort option:selected').val();
     var url=$('#url').val();
     $.ajax({
       url:url,
       type:"get",
       data:{brand:brand,occassion:occassion,fit:fit,pattern:pattern,fabric:fabric,sleeve:sleeve,sort:sort,url:url},
       success:function(data){
       $('.filter_products').html(data);
       },error:function(){
        alert('error');
       }
     });
  });

  $('.fit').click(function(){
     var brand=get_filter('brand');
     var occassion=get_filter('occassion');
     var fit=get_filter('fit');
     var pattern=get_filter('pattern'); 
     var fabric=get_filter('fabric');
     var sleeve=get_filter('sleeve');
     var sort=$('#sort option:selected').val();
     var url=$('#url').val();
     $.ajax({
       url:url,
       type:"get",
       data:{brand:brand,occassion:occassion,fit:fit,pattern:pattern,fabric:fabric,sleeve:sleeve,sort:sort,url:url},
       success:function(data){
       $('.filter_products').html(data);
       },error:function(){
        alert('error');
       }
     });
  });

  $('.occassion').click(function(){
     var brand=get_filter('brand');
     var occassion=get_filter('occassion');
     var fit=get_filter('fit');
     var pattern=get_filter('pattern'); 
     var fabric=get_filter('fabric');
     var sleeve=get_filter('sleeve');
     var sort=$('#sort option:selected').val();
     var url=$('#url').val();
     $.ajax({
       url:url,
       type:"get",
       data:{brand:brand,occassion:occassion,fit:fit,pattern:pattern,fabric:fabric,sleeve:sleeve,sort:sort,url:url},
       success:function(data){
       $('.filter_products').html(data);
       },error:function(){
        alert('error');
       }
     }); 
  });

  function get_filter(class_name){
    var filter=[];
    $('.'+class_name+':checked').each(function(){
      filter.push($(this).val());
    });
      return filter;
  }

  // proudct prices by using sizes
  $("#getPrice").change(function(){
    var size=$(this).val();
    if (size=='') {
      alert('Please Select size');
      return false;
    }
    var product_id=$(this).attr('product_id');
    //alert(product_id);
    $.ajax({
      url:'/get_product_price',
      data:{size:size,product_id:product_id},
      type:'post',
      success:function(resp){
        $('.currency_exchanges').hide();
        //alert(resp['product_discount']);
        //alert(resp['product_price']);
        //return false;
        if (resp['product_discount']>0) {
        $('.getAttrPrice').html(resp['product_discount']+'<del style="color:red; font-size:15px;">&nbsp; PKR : '+resp['product_price']+'</del>'+resp['currency']);
        }else{  
        $('.getAttrPrice').html('<span style="font-weight:normal;">'+resp['product_price']+'<br>'+resp['currency']+'</span><br>');
        }
      },error:function(){
        alert('error');
      }
    });
  });
  // cart item update
  $('.btnItemUpdate').click(function(){
    if ($(this).hasClass('qtyMinus')) {
      // if minus button clicked by user
      var quantity=$(this).prev().val();
      //alert(quantity); return false;
      if (quantity<=1) {
        alert('Quantity must be 1 or greater');
        return false;
      }else{
        new_qty=parseInt(quantity)-1;
  
      }
    }
    if ($(this).hasClass('qtyPlus')) {
      // if plus button clicked by user
      var quantity=$(this).prev().prev().val();
      new_qty=parseInt(quantity)+1;
      //alert(new_qty); return false;
    }
    var cartId=$(this).attr('data_cartId');
    $.ajax({
      url:'/update-cart-item-qty',
      data:{qty:new_qty,cartId:cartId},
      type:'post',
      success:function(resp){
        if (resp.status==false) {
          alert(resp.message);
        }
        $('#AppendCartItems').html(resp.view);
      },error:function(){
        alert('error');
      }
    });
  });

  $('.btnItemDelete').click(function(){
      var removeCartId=$(this).attr('remove_cartId');
      var confirmDel=confirm("You really want to delete this cart item?");
      //alert(removeCartId); return false;
      if (confirmDel) {
          $.ajax({
            url:'/delete_cart_item',
            data:{'cartId':removeCartId},
            type:'post',
            success:function(resp){
              //alert(resp); return false;
              $('#AppendCartItems').html(resp.view);
            },error:function(){
              alert('error');
            }
          });
      }
  });

  $("#current_password").keyup(function(){
      var current_password=$(this).val();
      //alert(current_password);
      $.ajax({
        type:'post',
        url: '/check-userCurrent-password',
        data:{current_password:current_password},
        success:function(resp){
          // alert(resp); 
           if (resp=='false') {
            $('#chkUserPwd').html('<strong style="color:red;">Password is  incorrect</strong>')
           }else if(resp=='true'){
            $('#chkUserPwd').html('<strong style="color:green;">Password is correct</strong>');
           }
        },error(){
            alert('error');
        }
      });
  });
  
  $('#ApplyCoupon').submit(function(){
    var user=$(this).attr('user');
    if (user==1) {
       
    }else{
      alert('Please login first to apply for coupon');
      return false;
    }
    var code=$('#code').val();
    $.ajax({
      type:'post',
      data:{code:code},
      url:'/apply/coupon',
      success:function(resp){
         if (resp.message!="") {
          alert(resp.message);
         }
         //$('#AppendCartItems').html(resp.view);
         $('.cpnAmnt').text(resp.couponAmount);

      },error:function(){
        alert('Error');
      }
    })
  });
  // calculating shipping charges and updated grand total
  $("input[name=address_id]").bind('change',function(){
    //alert('show'); return false;
    var shipping_charges=$(this).attr('shipping_charges');
    var total_price=$(this).attr('total_price');
    var coupon_amount=$(this).attr('coupon_amount');
    $('.shipping_charges').html("PKR : "+shipping_charges);

    var grand_total=parseInt(total_price)+parseInt(shipping_charges)-parseInt(coupon_amount);
    //alert(grand_total); return false;
    $('.grand_total').html('PKR : '+grand_total);
    var codPincodeCount=$(this).attr("codPincodeCount");
    var prepaidPincodeCount=$(this).attr("prepaidPincodeCount");
    if (codPincodeCount>0) {
      $(".codMethod").show();
    } else {
      $(".codMethod").hide();
    }
    if (prepaidPincodeCount>0) {
      $(".prepaidMethod").show();
    } else {
      $(".prepaidMethod").hide();
    }
  });


  /*$('.btnClick').click(function(){
    {{Session::forget('couponAmount')}}
    {{Session::forget('couponCode')}} 
  });*/
  $('#checkPincode').click(function(){
    var pincode=$('#pincodeInputCheck').val();
     if (pincode=="") {
      alert('Please enter delivery pincode'); return false;
     }
     $.ajax({
      type:'post',
      data:{pincode:pincode},
      url:'/check-pincode',
      success:function(resp){
        $('#pinMsg').html(resp);
      },error:function(){
        alert('Error');
      }
     });
  });

});
