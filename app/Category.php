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

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id','id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id','id');
    }

}
