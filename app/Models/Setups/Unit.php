<?php

namespace App\Models\Setups;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use Notifiable;
    protected $fillable = ['name'];
}
