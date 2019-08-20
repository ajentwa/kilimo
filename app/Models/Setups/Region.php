<?php

namespace App\Models\Setups;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;
    public $guarded = ['region_id'];
}
