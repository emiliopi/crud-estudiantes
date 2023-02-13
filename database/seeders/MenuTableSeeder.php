<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'title' 		=> 'Configuraciones',
            'description' 	=> 'Seccion para configurar el menu y submenu',
            'url' 			=> "---",
            'icon'  		=> "bx bx-cog",
        ]);

        DB::table('menu')->insert([
            'title' 		=> 'Estudiantes',
            'description' 	=> 'Seccion para estudiantes',
            'url' 			=> "students",
            'icon'  		=> "bx bx-cog",
        ]);

        DB::table('menu')->insert([
            'title' 		=> 'Materias',
            'description' 	=> 'Seccion para materias',
            'url' 			=> "assigments",
            'icon'  		=> "bx bx-cog",
        ]);
    }
}
