<?php

use Database\Seeders\MenuTableSeeder;
use Database\Seeders\RolAccesosSeeder;
use Database\Seeders\RolTableSeeder;
use Database\Seeders\StyleMenuTableSeeder;
use Database\Seeders\StyleTableSeeder;
use Database\Seeders\SubMenuTableSeeder;
use Database\Seeders\UserTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StyleTableSeeder::class,
            StyleMenuTableSeeder::class,
            RolTableSeeder::class,
        	UserTableSeeder::class,
            MenuTableSeeder::class,
            SubMenuTableSeeder::class,
            RolAccesosSeeder::class,
        ]);
    }
}
