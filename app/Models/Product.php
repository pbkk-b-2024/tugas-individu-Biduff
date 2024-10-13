<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id', 'picture'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->withPivot('purchase_price', 'supply_date');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }
}
