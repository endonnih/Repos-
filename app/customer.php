<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
     protected $table="customer";
    protected $primaryKey ="id";

    public $incrementing = false;


    protected $fillable = ['id','user','name','business','alamat','telp','pic','created_by','created_at','update_at','flaq'
];
}
