<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Setups\Ward;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

//    protected $table = '';

    protected $guarded = ['confirm_password','region_id','district_id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}
