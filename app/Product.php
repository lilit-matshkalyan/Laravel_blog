<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Table Structure
    protected $table = 'products';
    protected $primaryKey = 'id';
}
