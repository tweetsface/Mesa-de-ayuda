<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('d-m-Y');


use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class hd_reg_ticket extends Model implements AuthenticatableContract
{
    
     use Authenticatable;
    public $table="hd_reg_tickets";
     protected $fillable = ['id','cTitulo','cCategoria','cSistema','cPrioridad','cDesProblema','cEstado','nFolio_users','created_at'];
   public function comentarios()
    {
        return $this->hasMany('App\hd_comentarios','nFolio_ticket');
    }
}
