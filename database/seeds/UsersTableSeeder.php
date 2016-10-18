<?php

use App\User;
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
        User::create([
            'name' => 'Kaan Karaca',
            'email' => 'h4yfans@gmail.com',
            'password' => bcrypt('123123')
        ]);


        User::create([
            'name' => 'Sevde Dayıdinç',
            'email' => 'sevde@gmail.com',
            'password' => bcrypt('123123')
        ]);


    }
}