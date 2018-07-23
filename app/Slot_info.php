<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot_info extends Model
{
    //
    protected $fillable = [
        'email','name','prize','playdate'
    ];
}
