<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'city', 'postal_code', 'country', 'order_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
