<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'nombre' => 'Nombre de la empresa',
            'descripcion' => 'Descripcion corta de la empresa',
            'logo' => 'logo.png',
            'correo' => 'ejemplo@gmail.com',
            'direccion' => 'Enrique segoviano',
            'rfc' => 'CAT00KMDKJD',
        ]);
    }
}
