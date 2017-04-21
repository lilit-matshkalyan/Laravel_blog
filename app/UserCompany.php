<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    // Table Structure
    protected $table = 'users_companies';
    protected $primaryKey = 'id';
}
