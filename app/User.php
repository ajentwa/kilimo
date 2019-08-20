<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

//    protected $table = '';

    protected $guarded = ['confirm_password', 'region_id', 'district_id'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
