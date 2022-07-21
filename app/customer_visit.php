<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer_visit extends Model
{
    protected $table="customer_visit";
    protected $primaryKey ="id";

    public $incrementing = false;


    protected $fillable = ['id','id_customer','name','user','alamat','meeting_point','date', 'service_offer',  'progress', 'flaq', 'created_at','update_at' 
];
}
