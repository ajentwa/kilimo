<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['order_id']; 

    public function crop(){
        return $this->belongsTo('App\Models\Crops\Crop');
    }
}
