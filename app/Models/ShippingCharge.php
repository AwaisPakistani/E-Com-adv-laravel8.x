<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    use HasFactory;
    public static function getShippingCharges($total_weight,$country){
    	$shippingDetail=ShippingCharge::where('country',$country)->first()->toArray();
    	//$shippingCharges=$shippingDetail['shipping_charges'];
    	if ($total_weight>0) {
    		if ($total_weight>0 && $total_weight<=500) {
    			$shipping_charges=$shippingDetail['0_500g'];
    		}
    		elseif($total_weight>500 && $total_weight<=1000) {
    			$shipping_charges=$shippingDetail['501_1000g'];
    		}
    		elseif ($total_weight>1000 && $total_weight<=2000) {
    			$shipping_charges=$shippingDetail['1001_2000g'];
    		}
    		elseif ($total_weight>2000 && $total_weight<=5000) {
    			$shipping_charges=$shippingDetail['2001_5000g'];
    		}
    		elseif ($total_weight>5000) {
    			$shipping_charges=$shippingDetail['above_5000g'];
    		}else{
    			$shipping_charges=0;
    		}
    	}else{
    		$shipping_charges=0;
    	}
    	return $shipping_charges;
    }
}
