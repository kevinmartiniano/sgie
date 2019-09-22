<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\UserType::insert([
            'name' => 'Admin'
        ]);

        \App\UserType::insert([
            'name' => 'Comum'
        ]);
    }
}
