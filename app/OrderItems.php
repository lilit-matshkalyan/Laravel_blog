<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    // Table Structure
    protected $table = 'orders_items';
    protected $primaryKey = 'id';
}
