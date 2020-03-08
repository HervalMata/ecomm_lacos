<?php

use Illuminate\Database\Seeder;
use LacosFofos\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@user.com',
            'admin' => '1',
            'password' => '123456'
        ]);
    }
}
