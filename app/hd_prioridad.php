<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hd_prioridad extends Model
{
   protected $table='hd_prioridad';
   protected $fillable=['id','cNPrioridad','created_at','updated_at'];
}
