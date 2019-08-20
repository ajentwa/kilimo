<?php

namespace App\Models\Setups;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
