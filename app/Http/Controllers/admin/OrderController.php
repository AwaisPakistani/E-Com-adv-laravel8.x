<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderStatus;
use App\Models\OrdersLog;
use Session;
use Dompdf\Dompdf;

class OrderController extends Controller
{
    public function orders(){
    	Session::put('page','orders');
        $orders=Order::with('orders_products')->orderBy('id','desc')->get()->toArray();
    	return view('admin.orders.orders')->with(compact('orders'));

    }//
    public function orders_detail($id){
    	$orderDetail=Order::with('orders_products')->where('id',$id)->first()->toArray();
    	$userDetail=User::where('id',$orderDetail['user_id'])->first()->toArray();
        $orderStatuses=OrderStatus::where('status',1)->get()->toArray();
        $ordersLog=OrdersLog::where('order_id',$id)->get()->toArray();
    	//dd($orderDetail); die;
    	return view('admin.orders.orders_detail')->with(compact('orderDetail','userDetail','orderStatuses','ordersLog'));
    }//
    public function update_order_status(Request $request){
        if ($request->isMethod('post')) {
            $data=$request->all();
            //dd($data); die;
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            Session::flash('success_message','Order Status has been updated successfully');
            // update courier name and tracking number
            if (!empty($data['courier_name'] && !empty('tracking_number'))) {
                Order::where('id',$data['order_id'])->update(['courier_name'=>$data['courier_name'],'tracking_number'=>$data['tracking_number']]);
            }
            // Email update
            $deliveryDetail=Order::select('name','email')->where('id',$data['order_id'])->first()->toArray();
            $orderDetail=Order::with('orders_products')->where('id',$data['order_id'])->first()->toArray();
            $email=$deliveryDetail['email'];
            $name=$deliveryDetail['name'];
                $messageData=[
                   'email'=>$email,
                   'name'=>$name,
                   'order_id'=>$data['order_id'],
                   'courier_name'=>$data['courier_name'],
                   'tracking_number'=>$data['tracking_number'],
                   'order_status'=>$data['order_status'],
                   'orderDetail'=>$orderDetail
                ];
                Mail::send('admin.emails.orderStatus',$messageData,function($message) use($email){
                   $message->to($email)->subject('Order Status updated-E-com Website');
                });
                $log=new OrdersLog;
                $log->order_id=$data['order_id'];
                $log->order_status=$data['order_status'];
                $log->save();
            
            return redirect()->back();
        }
    }//
    public function view_order_invoice($id){
        $orderDetail=Order::with('orders_products')->where('id',$id)->first()->toArray();
        $userDetail=User::where('id',$orderDetail['user_id'])->first()->toArray();

        return view('admin.orders.order_invoice')->with(compact('orderDetail','userDetail'));
    }//
    public function print_pdf_invoice($id){
        $orderDetail=Order::with('orders_products')->where('id',$id)->first()->toArray();
        $userDetail=User::where('id',$orderDetail['user_id'])->first()->toArray();
        // reference the Dompdf namespace
        
        $output='
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
<style>
      @font-face {
        font-family: SourceSansPro;
        src: url(SourceSansPro-Regular.ttf);
      }

      .clearfix:after {
        content: "";
        display: table;
        clear: both;
      }

      a {
        color: #0087C3;
        text-decoration: none;
      }

      body {
        position: relative;
        width: 21cm;  
        height: 29.7cm; 
        margin: 0 auto; 
        color: #555555;
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 14px; 
        font-family: SourceSansPro;
      }

      header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #AAAAAA;
      }

      #logo {
        float: left;
        margin-top: 8px;
      }

      #logo img {
        height: 70px;
      }

      #company {
        float: right;
        text-align: right;
      }


      #details {
        margin-bottom: 50px;
      }

            #client {
        padding-left: 6px;
        border-left: 6px solid #0087C3;
        float: left;
      }

      #client .to {
        color: #777777;
      }

      h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
      }

      #invoice {
      float: right;
      text-align: right;
      }

     #invoice h1 {
       color: #0087C3;
       font-size: 2.4em;
       line-height: 1em;
       font-weight: normal;
       margin: 0  0 10px 0;
     }

     #invoice .date {
       font-size: 1.1em;
       color: #777777;
     }     

     table {
       width: 100%;
       border-collapse: collapse;
       border-spacing: 0;
       margin-bottom: 20px;
     }

     table th,
     table td {
       padding: 20px;
       background: #EEEEEE;
       text-align: center;
       border-bottom: 1px solid #FFFFFF;
     }

     table th {
       white-space: nowrap;        
       font-weight: normal;
     }

          table td {
            text-align: right;
          }

     table td h3{
       color: #57B223;
       font-size: 1.2em;
       font-weight: normal;
       margin: 0 0 0.2em 0;
     }

     table .no {
       color: #FFFFFF;
       font-size: 1.6em;
       background: #57B223;
     }     

     table .desc {
       text-align: left;
     }

     table .unit {
       background: #DDDDDD;
     }     

     table .qty {
     }

     table .total {
       background: #57B223;
       color: #FFFFFF;
     }

      table td.unit,
      table td.qty,
      table td.total {
        font-size: 1.2em;
      }

      table tbody tr:last-child td {
        border: none;
      }

     table tfoot td {
       padding: 10px 20px;
       background: #FFFFFF;
       border-bottom: none;
       font-size: 1.2em;
       white-space: nowrap; 
       border-top: 1px solid #AAAAAA; 
     }

     table tfoot tr:first-child td {
       border-top: none; 
     }

     table tfoot tr:last-child td {
       color: #57B223;
       font-size: 1.4em;
       border-top: 1px solid #57B223; 

     }

     table tfoot tr td:first-child {
       border: none;
     }

     #thanks{
       font-size: 2em;
       margin-bottom: 50px;
     }

     #notices{
       padding-left: 6px;
       border-left: 6px solid #0087C3;  
     }

     #notices .notice {
       font-size: 1.2em;
     }

     footer {
       color: #777777;
       width: 100%;
       height: 30px;
       position: absolute;
       bottom: 0;
       border-top: 1px solid #AAAAAA;
       padding: 8px 0;
       text-align: center;
     }
</style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <h1>Order Invoice</h1>
      </div>
      
      </div>
    </header>
    <main>
      <div id="details" class="clearfix" >
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">'.$orderDetail["name"].'</h2>
          <div class="address">'.$orderDetail["address"].'</div>
          <div class="address">'.$orderDetail["city"].'</div>
          <div class="address">'.$orderDetail["state"].'</div>
          <div class="address">'.$orderDetail["country"].'</div>
          <div class="address">'.$orderDetail["pincode"].'</div>
          <div class="address">'.$orderDetail["mobile"].'</div>
          <div class="email"><a href="mailto:john@example.com">'.$orderDetail["email"].'</a></div>
        </div>
        <div id="invoice" style="text-align:left;">
          <h1>Order ID # '.$orderDetail["id"].'</h1>
          <div class="date">Order Date: '.date("F j, Y, g:i a",strtotime($orderDetail["created_at"])).'</div>
          <div class="date">Order Amount : PKR='.$orderDetail["grand_total"].'</div>
          <div class="date">Order Status : '.$orderDetail["order_status"].'</div>
          <div class="date">Payment Method : '.$orderDetail["payment_method"].'</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">Product Code</th>
            <th class="unit">Size</th>
            <th class="qty">Color</th>
            <th class="unit">Price</th>
            <th class="qty">Quantity</th>
            <th class="total">Totals</th>
          </tr>
        </thead>
        <tbody>';
         foreach($orderDetail["orders_products"] as $pro){
            $output.='
          <tr>
            <td class="no" style="text-align:center;">'.$pro["product_code"].'</td>
            <td class="unit" style="text-align:center;"><h3>'.$pro["product_size"].'</td>
            <td class="qty" style="text-align:center;">'.$pro["product_color"].'</td>
            <td class="unit" style="text-align:center;">'.$pro["product_price"].'</td>
            <td class="qty" style="text-align:center;">'.$pro["product_qty"].'</td>
            <td class="total" style="text-align:center;">'.$pro["product_price"]*$pro["product_qty"].'</td>
          </tr>
          ';}
          $output.='
        </tbody>

        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>PKR : '.$orderDetail["grand_total"].'</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SHIPPING CHARGES</td>
            <td>PKR : '.$orderDetail["shipping_charges"].'</td>
          </tr>';
          if ($orderDetail['coupon_amount']>0) {
             
          $output.='<tr>
            <td colspan="2"></td>
            <td colspan="2">COUPON DISCOUNT</td>
            <td>PKR : '.$orderDetail["coupon_amount"].'</td>
          </tr>
          ';
          }else{
            $output.='
            <tr>
            <td colspan="2"></td>
            <td colspan="2">COUPON DISCOUNT</td>
            <td>PKR : 0.00</td>
          </tr>';
          }
            $output.='
          <tr><td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>PKR : '.$orderDetail["grand_total"].'</td>
          </tr>
        </tfoot>
      </table>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
        ';
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($output);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

        return view('admin.orders.printPdf_invoice')->with(compact('orderDetail','userDetail'));
    }//
}
