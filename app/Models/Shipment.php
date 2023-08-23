<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fee'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'shipment_id', 'id');
    }
}
