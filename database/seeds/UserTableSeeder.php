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
            'password' => '$2y$12$.6C8ZnHehVTeRXRpRcdgxuqVHbxf0DqfQ.nrViFH3iMvI908Pjbwm'
        ]);
    }
}
