<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Table Structure
    protected $table = 'categories';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id', 'id');
    }

}
