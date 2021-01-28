<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chating extends Model
{
    public $table = "chating";
    protected $fillable = ['nama', 'email', 'message'];
}
