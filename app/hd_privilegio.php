<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hd_privilegio extends Model
{
   protected $table='hd_privilegios';
   protected $fillable=['id','cPrivilegios','created_at','updated_at'];
}
