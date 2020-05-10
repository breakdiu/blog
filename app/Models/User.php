<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    //
//    use SoftDeletes;

    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;
//    protected $dates = ['delete_at'];

    protected $fillable = [
        'name',  'password','email','mobile',
    ];
}
