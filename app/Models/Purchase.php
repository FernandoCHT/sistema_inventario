<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'provider_id',
        'user_id',
        'fecha_compra',
        'total',
        'tax',
        'status',
        'imagen',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::class);
    }
}
