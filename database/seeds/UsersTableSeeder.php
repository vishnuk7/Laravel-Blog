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
      $user =   App\User::create([
                'name' => 'viu',
                'email' => 'viu@me.com',
                'password' => bcrypt('vishnu'),
                'admin' => 1
            ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/head_deep_blue.png',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde fuga blanditiis atque odio soluta, architecto ullam incidunt alias consequatur quia maiores explicabo illo obcaecati, officiis suscipit voluptatibus quis exercitationem sed!',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
