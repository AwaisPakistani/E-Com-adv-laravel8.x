 $(document).ready(function(){
  $("#current_password").keyup(function(){
    var curr_pwd = $("#current_password").val();
    //alert(curr_pwd); return false;
    $.ajax({
      type:'post',
      url:'/admin/check-current-password',
      data:{curr_pwd:curr_pwd},
      success:function(resp){
        //alert(resp);
        if (resp=='false') {
          $("#chkCurrPass").html('<strong style="color:red;">Current Password is incorrect </strong>');
        }else{
          $("#chkCurrPass").html('<strong style="color:green;">Password Matched</strong>');
        }
      },error:function(){
        alert("error");
      }
    });
  });

  // For Sections status

  $(".updateSectionStatus").click(function(){
    var status=$(this).children('i').attr('status');
    var section_id=$(this).attr('section_id'); 
    $.ajax({
      type:'post',
      url:'/admin/update-section-status',
      data:{status:status,section_id:section_id},
      success:function(resp){
        //alert(resp['status']);
        //alert(resp['section_id']);
        if (resp['status']==0) {
           $('#section-'+section_id).html('<i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>');
        }else if(resp['status']==1){
          $('#section-'+section_id).html('<i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });

  // For CAtegories status

  $(".updateCategoryStatus").click(function(){
    var status=$(this).children('i').attr('status');
    //alert(status); return false;
    var category_id=$(this).attr('category_id');
    $.ajax({
      type:'post',
      url:'/admin/update-category-status',
      data:{status:status,category_id:category_id},
      success:function(resp){
        //alert(resp); return false;
        if (resp['status']==0) {
          $('#category-'+category_id).html('<i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>');
        }else if(resp['status']==1){
          $('#category-'+category_id).html('<i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });

  //Appedn categories Level
  $('#section_id').change(function(){ 

     var section_id=$(this).val();
    // alert(section_id); return false;
     $.ajax({
      type:'post',
      url:'/admin/append-categories-level',
      data:{section_id:section_id},
      success:function(resp){
        //alert(resp); return false;
        $("#appendCategoriesLevel").html(resp);
      },error:function(){
        alert("Error");
      }
    });
  });

   // For Products status

  $(".updateProductStatus").click(function(){
    var status=$(this).children('i').attr('status');
   // alert(status); return false;
    var product_id=$(this).attr('product_id'); 
    $.ajax({
      type:'post',
      url:'/admin/update-product-status',
      data:{status:status,product_id:product_id},
      success:function(resp){
        //alert(resp['status']);
        //alert(resp['section_id']);
        if (resp['status']==0) {
           $('#product-'+product_id).html('<i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>');
        }else if(resp['status']==1){
          $('#product-'+product_id).html('<i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });
  

     // For Products Attribute status

  $(".updateAttributeStatus").click(function(){
    var status=$(this).text();
    var attribute_id=$(this).attr('attribute_id'); 
    //alert(status);
    //alert(attribute_id);
    $.ajax({
      type:'post',
      url:'/admin/update-attribute-status',
      data:{status:status,attribute_id:attribute_id},
      success:function(resp){
       // alert(resp); return false;
        //alert(resp['status']);
        //alert(resp['attribute_id']);
        if (resp['status']==0) {
           $('#attribute-'+attribute_id).html('<a class="updateAttributeStatus" href="javascript:void(0);"><span style="color: red;">Inactive</span></a>');
        }else if(resp['status']==1){
          $('#attribute-'+attribute_id).html('<a class="updateAttributeStatus" href="javascript:void(0);"><span style="color: green;">Active</span></a>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });
// Update Users status
   $(".updateUserStatus").click(function(){
    var status=$(this).children('i').attr('status');
    //alert(status); return false;
    var user_id=$(this).attr('user_id'); 
    
    //alert(user_id);
    $.ajax({
      type:'post',
      url:'/admin/update-user-status',
      data:{status:status,user_id:user_id},
      success:function(resp){
       // alert(resp); return false;
        //alert(resp['status']);
        //alert(resp['attribute_id']);
        if (resp['status']==0) {
           $('#user-'+user_id).html('<i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>');
        }else if(resp['status']==1){
          $('#user-'+user_id).html('<i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });
   

 // For Products Images status

  $(".updateImagesStatus").click(function(){
    var status=$(this).text();
    var image_id=$(this).attr('image_id'); 
    //alert(status);
    //alert(attribute_id);
    $.ajax({
      type:'post',
      url:'/admin/update-images-status',
      data:{status:status,image_id:image_id},
      success:function(resp){
       // alert(resp); return false;
        //alert(resp['status']);
        //alert(resp['attribute_id']);
        if (resp['status']==0) {
           $('#image-'+image_id).html('<a class="updateImagesStatus" href="javascript:void(0);"><span style="color: red;">Inactive</span></a>');
        }else if(resp['status']==1){
          $('#image-'+image_id).html('<a class="updateImagesStatus" href="javascript:void(0);"><span style="color: green;">Active</span></a>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });

// For Products Brands status

  $(".updateBrandStatus").click(function(){
    var status=$(this).children('i').attr('status');
    //alert(status); return false;
    var brand_id=$(this).attr('brand_id'); 
    
    //alert(brand_id);
    $.ajax({
      type:'post',
      url:'/admin/update-brands-status',
      data:{status:status,brand_id:brand_id},
      success:function(resp){
       // alert(resp); return false;
        //alert(resp['status']);
        //alert(resp['attribute_id']);
        if (resp['status']==0) {
           $('#brand-'+brand_id).html('<i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>');
        }else if(resp['status']==1){
          $('#brand-'+brand_id).html('<i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });

  // For Products Banners status

  $(".updateBannerStatus").click(function(){
    var status=$(this).children('i').attr('status');
    //alert(status); return false;
    var banner_id=$(this).attr('banner_id'); 
    
    //alert(banner_id);
    $.ajax({
      type:'post',
      url:'/admin/update-banners-status',
      data:{status:status,banner_id:banner_id},
      success:function(resp){
        //alert(resp); return false;
        //alert(resp['status']);
        //alert(resp['attribute_id']);
        if (resp['status']==0) {
           $('#banner-'+banner_id).html('<i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>');
        }else if(resp['status']==1){
          $('#banner-'+banner_id).html('<i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });


    // For Products Coupons status

  $(".updateCouponStatus").click(function(){
    var status=$(this).children('i').attr('status');
    //alert(status); return false;
    var coupon_id=$(this).attr('coupon_id'); 
    
    //alert(coupon_id);
    $.ajax({
      type:'post',
      url:'/admin/update-coupons-status',
      data:{status:status,coupon_id:coupon_id},
      success:function(resp){
        //alert(resp); return false;
        //alert(resp['status']);
        //alert(resp['attribute_id']);
        if (resp['status']==0) {
           $('#coupon-'+coupon_id).html('<i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>');
        }else if(resp['status']==1){
          $('#coupon-'+coupon_id).html('<i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });
  // updateShippingStatus
  $(".updateShippingStatus").click(function(){
    var status=$(this).children('i').attr('status');
    //alert(status); return false;
    var shipping_id=$(this).attr('shipping_id'); 
    
    //alert(coupon_id);
    $.ajax({
      type:'post',
      url:'/admin/update-shipping-status',
      data:{status:status,shipping_id:shipping_id},
      success:function(resp){
        //alert(resp); return false;
        //alert(resp['status']);
        //alert(resp['attribute_id']);
        if (resp['status']==0) {
           $('#shipping-'+shipping_id).html('<i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>');
        }else if(resp['status']==1){
          $('#shipping-'+shipping_id).html('<i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });
    // For CMS Pages status

  $(".updateCmsPagetatus").click(function(){
    var status=$(this).children('i').attr('status');
   // alert(status); return false;
    var cmsPage_id=$(this).attr('cmsPage_id'); 
    $.ajax({
      type:'post',
      url:'/admin/update-cms-page-status',
      data:{status:status,cmsPage_id:cmsPage_id},
      success:function(resp){
        //alert(resp['status']);
        //alert(resp['section_id']);
        if (resp['status']==0) {
           $('#cmsPage-'+cmsPage_id).html('<i style="font-size: 30px;" class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>');
        }else if(resp['status']==1){
          $('#cmsPage-'+cmsPage_id).html('<i style="font-size: 30px;" class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>');
        }
      },error:function(){
        alert("Error");
      }
    });
  });
  // coupon type show / hide 

  $("#ManualCoupon").click(function(){
    $("#couponField").show();
  });
  $("#AutomaticCoupon").click(function(){
    $("#couponField").hide();
  });

  $('#courier_name').hide()
  $('#tracking_number').hide();
  $('#order_status').change(function(){
     if (this.value=="Shipped") {
      $('#courier_name').show()
      $('#tracking_number').show();
     }else{
      $('#courier_name').hide()
      $('#tracking_number').hide();
     }
  });

});