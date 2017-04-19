<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Table Structure
    protected $table = 'employees';
    protected $primaryKey = 'id';

    public function job()
    {
        return $this->hasOne('App\Job', 'id', 'job_id');
    }

    public function contract()
    {
        return $this->hasOne('App\EmployeeContract', 'id', 'contract_id');
    }
}
