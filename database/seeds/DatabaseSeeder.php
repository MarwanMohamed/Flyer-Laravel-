<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::insert(['name'=>'Marwan Mohamed', 'email'=> 'maro@m.com', 'password'=> bcrypt('123456')]);

    }
}
