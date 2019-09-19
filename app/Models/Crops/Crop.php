<?php

namespace App\Models\Crops;

use App\Models\Setups\Unit;
use App\Models\Setups\Year;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($data)
 */
class Crop extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $guarded = ['crop_id','quantity']; //Use this

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function farmer(){
        return $this->belongsTo(User::class,'farmer_id');
    }

    public function year(){
        return $this->belongsTo(Year::class,'year_id');
    }
}
