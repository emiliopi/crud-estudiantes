<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'              => 'admin',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('admin'),
            'id_rol'            => 1,
            'remember_token'    => Str::random(10),
        ]);

        setRoles([1],1);

        DB::table('users')->insert([
            'name'              => 'Profesor1',
            'email'             => 'profesor1@gmail.com',
            'password'          => bcrypt('admin'),
            'id_rol'            => 2,
            'remember_token'    => Str::random(10),
        ]);

        setRoles([2],2);
    }
}
