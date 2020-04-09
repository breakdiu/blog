<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table = 'article_category';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;


    protected $fillable = [
      'name','sort','status','user_id'
    ];
}
