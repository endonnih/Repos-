<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
     protected $table="posts";
    protected $primaryKey ="id";

    public $incrementing = false;


    protected $fillable = ['id','nama','alamat'];
}
