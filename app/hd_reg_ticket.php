<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class hd_reg_ticket extends Model implements AuthenticatableContract
{
     use Authenticatable;
    public $table="hd_reg_tickets";
     protected $fillable = ['id','cTitulo','cCategoria','cSistema','cPrioridad','cDesProblema','hd_reg_ticket.cEstado','nFolio_users','created_at'];
     
}
