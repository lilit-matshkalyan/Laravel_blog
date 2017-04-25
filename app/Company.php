<?php

namespace App;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Company extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';


    public function category()
    {
        return $this->hasMany('App\Category', 'company_id');
    }

    public function location()
    {
        return $this->hasMany('App\Location', 'company_id');
    }

    public function users_companies()
    {
        return $this->hasMany('App\UserCompany', 'company_id');
    }

}
