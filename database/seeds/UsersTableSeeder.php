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
        \App\User::create([
        'family_name' => '佐藤',
        'name' => '太郎',
        'email' => 'norimaking777@gmail.com',
        'password' => bcrypt('11qqaazz')
      ]);
    }
}
