<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model{

    protected  $primaryKey = 'id';
    protected $table = 'classes';

    protected $fillable = ['id','name','status','created_at','updated_at'];
    
}