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
        $users = [
            [
                'name' => 'bloomy1',
                'email' => 'bloomy1@gmail.com',
            ],
            [
                'name' => 'bloomy2',
                'email' => 'bloomy2@gmail.com',
            ]
        ];

        foreach ($users as $value) {
            DB::table('users')->insert([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => bcrypt('password'),
            ]);    
        }
    }
}
