<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolAccesosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Accesos para super administrador
        DB::table('rol_accesos')->insert(['id_rol' => 1, 'id_submenu' => 1]);
        DB::table('rol_accesos')->insert(['id_rol' => 1, 'id_submenu' => 2]);
        DB::table('rol_accesos')->insert(['id_rol' => 1, 'id_submenu' => 3]);
        DB::table('rol_accesos')->insert(['id_rol' => 1, 'id_submenu' => 4]);
        DB::table('rol_accesos')->insert(['id_rol' => 1, 'id_submenu' => 5]);

        // Accesos para administrador
        DB::table('rol_accesos')->insert(['id_rol' => 2, 'id_submenu' => 1]);
        DB::table('rol_accesos')->insert(['id_rol' => 2, 'id_submenu' => 2]);
        DB::table('rol_accesos')->insert(['id_rol' => 2, 'id_submenu' => 3]);
        DB::table('rol_accesos')->insert(['id_rol' => 2, 'id_submenu' => 4]);
        DB::table('rol_accesos')->insert(['id_rol' => 2, 'id_submenu' => 5]);
       
    }
}
