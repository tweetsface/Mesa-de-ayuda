<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hd_comentario extends Model
{
	public $fillable=['id','cComentarios','nFolio_ticket','nUser_id'];
    public function hd_reg_ticket()
    {
    	return $this->belongsTo('App\hd_reg_ticket');
    }
}
