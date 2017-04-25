<?php

namespace App;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';


    public function users_companies()
    {
        return $this->hasMany('App\UserCompany', 'user_id', 'id');
    }

}
