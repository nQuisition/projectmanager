<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'id' => '11111111-1111-1111-1111-111111111111',
            'name' => 'John Doe',
            'email' => 'john@john.com',
            'password' => bcrypt('asda'),
            'remember_token' => str_random(10)
        ]);

        User::insert([
            'id' => '11111112-1111-1111-1111-111111111111',
            'name' => 'Ron Boe',
            'email' => 'ron@ron.com',
            'password' => bcrypt('asda'),
            'remember_token' => str_random(10)
        ]);

        User::insert([
            'id' => '11111113-1111-1111-1111-111111111111',
            'name' => 'Jurgen Klamp',
            'email' => 'jk@amazon.com',
            'password' => bcrypt('asda'),
            'remember_token' => str_random(10)
        ]);

        $users = factory(App\User::class, 100)->create();
    }
}
