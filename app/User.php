<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //Còn đây là quan hệ Eloquent của model
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps=true;
    protected $fillable = [
    'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];
    public function vaiTroNgDung()
    {
        return $this->hasMany('App\VaiTroNgDung','IdUsers','id');
    }
    public function getRememberTokenName()
    {
        return null; // not supported
    }

    /**
    * Overrides the method to ignore the remember token.
    */
    public function setAttribute($key, $value)
    {
       $isRememberTokenAttribute = $key == $this->getRememberTokenName();
       if (!$isRememberTokenAttribute)
       {
          parent::setAttribute($key, $value);
      }
    }
}
