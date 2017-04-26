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
        return $this->belongsTo('App\Location', 'location_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function orderitem()
    {
        return $this->hasMany('App\OrderItems', 'order_id');
    }
}
