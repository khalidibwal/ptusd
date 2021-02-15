<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $table = 'testimonials';
    protected $fillable = ['nama','email','message'];

    protected $hidden = ['created_at','updated_at'];
}
