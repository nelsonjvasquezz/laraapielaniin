<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'sku' => 'lmn-895-78',
            'nombre' => 'impresora',
            'cantidad' => 4,
            'precio' => 120.50,
            'descripcion' => 'Impresora 3D de la marca HP',
            'image_url' => 'images/xUth2eRISdTUbcy6sSZLNrBucuCS2MZcnOKUpq6E.png'
        ]);
    }
}
