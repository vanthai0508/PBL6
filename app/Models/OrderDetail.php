<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'fruit_id',
        'order_id',
        'quantity',
        'created_at',
        'updated_at'
    ];
    
    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    
    public function Fruit()
    {
        return $this->belongsTo(Fruit::class, 'fruit_id', 'id');
    }

}