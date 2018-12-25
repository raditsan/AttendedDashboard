<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'employee';

    public function IsAdmin()    {
        return $this->rule === self::ADMIN_TYPE;
    }

    public function IsEmployee()    {
        return $this->rule === self::DEFAULT_TYPE;
    }

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
}
