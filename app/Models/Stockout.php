<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockout extends Model
{
    use HasFactory;
    protected $table = 'stockouts';
    protected $fillable = ['customer_id','product_id','so_number','quantity'];
}
