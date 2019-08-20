<?php

namespace App\Models\Setups;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ward extends Model
{
    use SoftDeletes;
    public $guarded = ['ward_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
