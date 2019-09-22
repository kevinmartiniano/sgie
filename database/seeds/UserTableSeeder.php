<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'name' => 'Carla Freitas',
            'email' => 'carla.freitas@example.com',
            'password' => bcrypt('123456'),
            'user_type_id' => 1,
        ]);

        \App\User::insert([
            'name' => 'Pedro Silva',
            'email' => 'pedro.silva@example.com',
            'password' => md5('123456'),
            'user_type_id' => 1,
        ]);

        \App\User::insert([
            'name' => 'Fulano da Silva',
            'email' => 'fulano.silva@example.com',
            'password' => md5('123456'),
            'user_type_id' => 2,
        ]);
    }
}
