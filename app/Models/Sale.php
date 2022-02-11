<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'id_cliente',
        'user_id',
        'fecha_venta',
        'tax',
        'total',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cliente');
    }
    public function saleDetails()
    {
        return $this->hasMany(saleDetail::class);
    }
}
