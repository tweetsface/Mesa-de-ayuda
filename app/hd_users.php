<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
class hd_users extends Authenticatable implements MustVerifyEmail
{   

    use Notifiable;


    public $table="hd_users";
    protected $casts = [
        'badmin' => 'boolean',
    ];
    protected $fillable = ['cNombre','cApellidos','nEmpleado', 'email', 'password','badmin','sFoto','created_at'];
    protected $rememberTokenName = 'remember_token';
    public static $rules = array(
    'email' => 'email|required|unique:hd_users,email,id'
);

    public function getbadmin()
    {
    	return $this->badmin;
    }
    public function getid()
    {
        return $this->id;
    }
    
	
	protected $hidden = ['password', 'remember_token'];

 
}
