<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'arco',
            'email' => 'arco@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://arcodev.github.io/arcodev',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H'),
        ]);
        DB::table('users')->insert([
            'name' => 'Christian',
            'email' => 'christian@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://arcodev.github.io/arcodev',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H'),
        ]);
    }
}
