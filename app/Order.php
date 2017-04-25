<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Table Structure
    protected $table = 'orders';
    protected $primaryKey = 'id';

    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id', 'id');
    }

    public function orderitem()
    {
        return $this->hasMany('App\OrderItems', 'order_id', 'id');
    }
}
