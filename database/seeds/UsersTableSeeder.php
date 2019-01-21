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
        DB::table('users')->insert([
            'name' => 'Rais',
            'email' => 'raisazka@gmail.com',
            'password' => bcrypt('1234567'),
            'address' => 'Narogong',
            'dob' => '1999-06-20',
            'gender' => 'Male'
        ]);
    }
}
