<?php

namespace App\Models\Crops;

use App\Models\Setups\Unit;
use App\Models\Setups\Year;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($data)
 */
class Crop extends Model
{
    use Notifiable;
    use SoftDeletes;
    public $timestamps = true;
//    protected $fillable = ['crop_name','farmer_id','unit_id','year_id']; hapa nakuonyesha namna ya kufanya mambo kwa urahisi
    protected $guarded = ['crop_id']; //Use this

    public function unit(){
//        return $this->belongsTo('App\Models\Setups\Unit'); Not Supported By Laravel 5.7
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function farmer(){
//        return $this->belongsTo('App\Models\Setups\User');
        return $this->belongsTo(User::class,'farmer_id');
    }

    public function year(){
        return $this->belongsTo(Year::class,'year_id');
    }
}
