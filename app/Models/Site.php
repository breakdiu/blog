<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    //
    protected $table = 'site';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;


    protected $fillable = [
        'title',  'keywords','desc','is_open','is_reg'
    ];
}
