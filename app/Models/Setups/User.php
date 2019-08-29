<?php

namespace App\Models\Setups;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = ['first_name', 'middle_name', 'surname', 'email', 'phone_no', 'password', 'ward_id', 'password', 'remember_token'];

    public function ward(){
        return $this->belongsTo(Ward::class,'ward_id');
    }

}
