<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Table Structure
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function cateory()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function orders_items()
    {
        return $this->hasMany('App\OrderItems', 'product_id');
    }

}
