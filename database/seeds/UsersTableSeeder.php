<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'viu',
            'email' => 'viu@me.com',
            'password' => bcrypt('vishnu')
        ]);
    }
}
