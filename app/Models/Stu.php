<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stu extends Model
{
    //
    protected $table = 'stu';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;


    protected $fillable = [
        'name',  'password',
    ];

}
