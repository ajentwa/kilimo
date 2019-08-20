<?php

namespace App\Models\Setups;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;
    public $guarded = ['district_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

}
