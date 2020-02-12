<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class hd_users extends Model implements AuthenticatableContract
{   
	use Authenticatable;

    public $table="hd_users";
    protected $casts = [
        'badmin' => 'boolean',
    ];
    protected $fillable = ['cNombre','cApellidos','nEmpleado', 'email', 'password','badmin'];
    protected $rememberTokenName = 'remember_token';

	/**
	 * The attributes excluded from the model's JSON form.
	   */
   

    public function getbadmin()
    {
    	return $this->badmin;
    }
	
	protected $hidden = ['password', 'remember_token'];

 
}
