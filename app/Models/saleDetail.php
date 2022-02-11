<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saleDetail extends Model
{
    protected $fillable = [
        'sale_id',
        'id_producto',
        'cantidad',
        'precio',
        'descuento',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_producto');
    }
}
