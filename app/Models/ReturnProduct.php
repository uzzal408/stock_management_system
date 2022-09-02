<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;
    protected $table = 'return_products';
    protected $fillable = ['customer_id','product_id','so_number','quantity','comments'];
}
