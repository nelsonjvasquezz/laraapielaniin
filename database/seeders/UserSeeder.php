<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre_real' => 'Nelson Vásquez',
            'telefono' => '78787878',
            'name' => 'nelsonv',
            'fecha_nac' => '1999-11-01',
            'email' => 'nelsonv@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
