<?php

namespace App\Models\Crops;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use Notifiable;
    public $timestamps = true;
    protected $fillable = ['crop_name','farmer_id','unit_id','year_id'];

    public function unit(){
        return $this->belongsTo('App\Models\Setups\Unit');
    }

    public function farmer(){
        return $this->belongsTo('App\Models\Setups\User');
    }

    public function year(){
        return $this->belongsTo('App\Models\Setups\Year');
    }

}
