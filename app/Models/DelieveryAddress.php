<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class DelieveryAddress extends Model
{
    use HasFactory;
    public static function deliveryAddresses(){
    $user_id=Auth::user()->id;
    $deliveryAddress=DelieveryAddress::where('user_id',$user_id)->get()->toArray();
    return $deliveryAddress;
    }
}
