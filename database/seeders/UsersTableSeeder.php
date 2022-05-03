<?php

namespace Database\Seeders;

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
        $user = [
            'name' => 'Минаев Андрей',
            'email' => '650517@355000.ru',
            'password' => bcrypt('txt472')
        ];
        \DB::table('users')->insert($user);

    }
}
