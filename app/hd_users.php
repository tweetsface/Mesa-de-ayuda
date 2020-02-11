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
    protected $fillable = ['cNombre','cApellidos','nEmpleado', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPasswordNotification($token));
}
 public function roles()
    {
 return $this->belongsToMany(hd_users::class)->withTimestamps();
    }
 
}
