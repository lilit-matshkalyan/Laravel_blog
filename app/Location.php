<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // Table Structure
    protected $table = 'locations';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id', 'id');
    }

    public function order()
    {
        return $this->hasMany('App\Order', 'location_id', 'id');
    }
}
