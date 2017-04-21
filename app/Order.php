<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Table Structure
    protected $table = 'orders';
    protected $primaryKey = 'id';
}
