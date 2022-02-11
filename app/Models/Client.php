<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'nombre',
        'rfc',
        'direccion',
        'telefono',
        'email',

    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
