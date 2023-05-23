<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'code_color',
        'code_size',
        'unit_in_stock',
        'thumb'
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'product_detail_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
