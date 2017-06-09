<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{

    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';


    public function users_companies()
    {
        return $this->hasMany('App\UserCompany', 'user_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order', 'user_id');
    }

}
