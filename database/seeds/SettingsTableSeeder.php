<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            "site_name"=>"Laravel\'s Blog",
            "address"=>"Mysore, India",
            "contact_number"=>"961088057",
            "contact_email"=>"viu88@gmail.com"
        ]);

    }
}
