<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Provider extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'id_numero',
        'direccion',
        'telefono',

    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
