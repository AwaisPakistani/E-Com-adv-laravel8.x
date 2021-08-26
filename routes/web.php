<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\BannersController;
use App\Http\Controllers\admin\CouponsController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\CmsController;
use App\Http\Controllers\admin\frontSettingsController;

// Front 
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\front\ProductController;
use App\Http\Controllers\front\UsersController;
use App\Http\Controllers\front\OrdersController;
use App\Http\Controllers\front\PaypalController;
use App\Http\Controllers\front\CmsPageController;

// use model for route 
use App\Models\Category;
use App\Models\CmsPage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::match(['get', 'post'], '/admin/login', [AdminController::class, 'login']);

Route::group(['middleware'=>['AdminFront']],function(){
// Admin Routes
Route::prefix('admin')->namespace('admin')->group(function () {
     Route::get('/dashboard', [AdminController::class, 'dashboard']);
     Route::get('/settings', [AdminController::class, 'settings']);
     Route::get('/logout', [AdminController::class, 'logout']);
     Route::post('/check-current-password', [AdminController::class, 'check_current_passowrd']);
     Route::post('/update-current-password', [AdminController::class, 'update_current_passowrd']);
     Route::match(['get', 'post'], '/update-admin-details', [AdminController::class, 'update_admin_details']);
     //sections
     Route::get('/sections', [SectionController::class, 'sections']);
     Route::post('/update-section-status', [SectionController::class, 'update_section_status']);
     //categories
     Route::get('/categories', [CategoryController::class, 'categories']);
     Route::post('/update-category-status', [CategoryController::class, 'update_category_status']);
     Route::match(['get', 'post'], '/add-edit-category/{id?}', [CategoryController::class, 'add_edit_category']);
     Route::post('/append-categories-level', [CategoryController::class, 'append_categories_level']);
     
     Route::get('/delete-category/{id}', [CategoryController::class, 'delete_category']);
     Route::get('/delete-category-image/{id}', [CategoryController::class, 'delete_category_image']);
     // Routes For Products
     Route::get('/products', [ProductsController::class, 'products']);
     Route::post('/update-product-status', [ProductsController::class, 'update_product_status']);
     Route::get('/delete-product/{id}', [ProductsController::class, 'delete_product']);
     Route::match(['get', 'post'], '/add-edit-product/{id?}', [ProductsController::class, 'add_edit_product']);
     Route::get('/delete-product-image/{id}', [ProductsController::class, 'delete_product_image']);
     Route::get('/delete-product-video/{id}', [ProductsController::class, 'delete_product_video']);

     // Routes for Brands
     Route::get('/brands', [BrandController::class, 'brands']);
     Route::post('/update-brands-status', [BrandController::class, 'update_brands_status']);
     Route::match(['get', 'post'], '/add-edit-brand/{id?}', [BrandController::class, 'add_edit_brand']);
     Route::get('/delete-brand/{id}', [BrandController::class, 'delete_brand']);
     

     // Routes For Products Attributes
     Route::match(['get', 'post'], '/add-product-attr/{id}', [ProductsController::class, 'add_product_attr']);
     Route::post('/edit-product-attr/{id}', [ProductsController::class, 'edit_product_attr']);
     Route::post('/update-attribute-status', [ProductsController::class, 'update_attribute_status']);
     Route::get('/delete-attr/{id}', [ProductsController::class, 'delete_attribute']);
     // Routes for Products Images
     Route::match(['get', 'post'], '/add-product-imgs/{id}', [ProductsController::class, 'add_product_images']);  
     Route::post('/update-images-status', [ProductsController::class, 'update_image_status']);
     Route::get('/delete-img/{id}', [ProductsController::class, 'delete_image']);
     // Routes for Banners
     Route::get('/banners', [BannersController::class, 'banners']);
     Route::post('/update-banners-status', [BannersController::class, 'update_baneer_status']);
     Route::match(['get', 'post'], '/add-edit-banner/{id?}', [BannersController::class, 'add_edit_banner']);
     Route::get('/delete-banner/{id}', [BannersController::class, 'delete_banner']);
     // Routes for coupons 
     Route::get('/coupons', [CouponsController::class, 'coupons']);
     Route::post('/update-coupons-status', [CouponsController::class, 'update_coupon_status']);
     Route::match(['get', 'post'], '/add-edit-coupon/{id?}', [CouponsController::class, 'add_edit_coupon']);
     Route::get('/delete-coupon/{id}', [CouponsController::class, 'delete_coupon']);
     // Orders Routes
     Route::get('/orders', [OrderController::class, 'orders']);
     Route::get('/orders/{id}', [OrderController::class, 'orders_detail']);
     Route::post('/update-order-status', [OrderController::class, 'update_order_status']);
     Route::get('/view-order-invoice/{id}', [OrderController::class, 'view_order_invoice']);
     Route::get('/print-pdf-invoice/{id}', [OrderController::class, 'print_pdf_invoice']);

     // Shipping Charges routes
     Route::get('/view-shipping-charges', [ShippingController::class, 'view_shipping_charges']);
     
     Route::match(['get', 'post'], '/edit-shipping-charges/{id}', [ShippingController::class, 'edit_shipping_charges']);
     // update shipping status
     Route::post('/update-shipping-status', [ShippingController::class, 'update_shipping_status']);

     // users
     Route::get('/users',[userController::class,'users']); 
     // uddate user status
     Route::post('/update-user-status', [userController::class, 'update_user_status']);

     // CMS Pages
     Route::get('/cms-pages',[CmsController::class,'CmsPages']); 
     
     Route::post('/update-cms-page-status', [CmsController::class, 'update_cms_page_status']);

     Route::match(['get', 'post'], '/add-edit-cms-page/{id?}', [CmsController::class, 'add_edit_cmsPage']);
     
     Route::get('/delete-cms-page/{id}', [CmsController::class, 'delete_cms_page']);

     // Front Settings Routes
     Route::get('/front-settings',[frontSettingsController::class,'frontSettings']);
     // Edit Front Setting
     Route::match(['get', 'post'], '/edit-front-setting/{id?}', [frontSettingsController::class, 'edit_front_settings']);   
     Route::get('/delete-logo/{id}', [frontSettingsController::class, 'delete_logo']);

     // Admins-Subadmins  
     Route::get('/admins-subadmins', [AdminController::class, 'admins_subadmins']);
     Route::post('/update-adminsSubadmins-status', [AdminController::class, 'update_adminsSubadmins_status']);
     Route::get('/delete-admins-subadmins/{id}', [AdminController::class, 'delete_adminsSubadmins']);
 });
});



Route::namespace('front')->group(function(){
   // Home page Routes
   Route::get('/', [IndexController::class, 'index']);
   // Listing Page 
   // pluck us used for same purpose as flatten_array or Arr::flatten(variable) in laravel
   $catURLS=Category::select('category_url')->where('status',1)->get()->pluck('category_url')->toArray();
   foreach ($catURLS as $url) {
   Route::get('/'.$url, [ProductController::class, 'listing']);
   }
   //Routes for CMS Pages
   $cmsURLS=CmsPage::select('url')->where('status',1)->get()->pluck('url')->toArray();
   foreach ($cmsURLS as $url) {
   Route::get('/'.$url, [CmsPageController::class, 'cmsPage']);
   }
   // Route for product detail
   Route::get('/product/{id}', [ProductController::class, 'product_detail']);
   // get prices of diffeerent sizes products
   Route::post('/get_product_price', [ProductController::class, 'get_product_price']);

   Route::post('/add-to-cart', [ProductController::class, 'add_to_cart']);

   Route::get('/cart', [ProductController::class, 'cart']);
   // Update cart quantity
   Route::post('/update-cart-item-qty', [ProductController::class, 'update_cart_qty']);
   Route::post('/delete_cart_item', [ProductController::class, 'delete_cart_item']);


   // Routes for User Authemtiacation 
   //Routes for login/register
   Route::get('/login-register', [UsersController::class, 'login_register'])->name('login');
   
  // Route::get('/login-register',['as'=>'login','uses'=>'UsersController@login_register']);
   // Route for Login
   Route::post('/login', [UsersController::class, 'login_user']);
    // Route for Register
   Route::post('/register', [UsersController::class, 'register_user']);
   // Route for logout
   Route::get('/logout', [UsersController::class, 'logout']);
   // forgot password route
        Route::match(['get', 'post'], '/forgot-password', [UsersController::class, 'forgot_password']);
   // search products
   Route::get('/search-products', [ProductController::class, 'listing']);

   // contact us page
    Route::match(['get', 'post'], '/contact', [CmsPageController::class, 'contact_page']);

   Route::group(['middleware'=>['auth']],function(){
        // check emaill existance
        Route::match(['get', 'post'], '/check-email', [UsersController::class, 'check_email']);
        // confirm user account route
        Route::match(['get', 'post'], '/confirm/{code}', [UsersController::class, 'confirm_account']);
        
        // User account routes
        Route::match(['get', 'post'], '/account', [UsersController::class, 'account']);
        // orders
        Route::get('/orders', [OrdersController::class, 'orders']);
        // order details
        Route::get('/orders/{id}', [OrdersController::class, 'orderDetail']);
        // check user password
        Route::post('/check-userCurrent-password', [UsersController::class, 'check_userCurrent_password']);
        // update user password
        Route::post('/update-user-password', [UsersController::class, 'update_user_password']);
        // Apply Coupon
        Route::post('/apply/coupon', [ProductController::class, 'apply_coupon']);
        // checkout page
        Route::match(['get', 'post'], '/checkout', [ProductController::class, 'checkout']);

        Route::match(['get', 'post'], '/add-edit-delivery-address/{id?}', [ProductController::class, 'add_edit_delivery_address']);
        Route::get('/delete-delivery-address/{id}', [ProductController::class, 'delete_delivery_address']);
        // thanks page
        Route::get('/thanks', [ProductController::class, 'thanks']);
        // Paypa thanks page
        Route::get('/paypal', [PaypalController::class, 'paypal']);
        Route::get('/paypal/success', [PaypalController::class, 'PaypalSuccess']);
        Route::get('/paypal/cancel', [PaypalController::class, 'PaypalCancel']);
        Route::post('/paypal/ipn', [PaypalController::class, 'PaypalIpn']);

        // check pincode
        Route::post('/check-pincode', [ProductController::class, 'checkPincode']);
        

   });

});