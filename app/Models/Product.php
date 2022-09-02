<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','category_id','sku','price','minimum_qty','unit','status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
}
