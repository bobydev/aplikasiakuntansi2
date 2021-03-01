<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name' => 'Boby_11190071',
            'email' => '11190071@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => '11190071_Boby',
            'email' => 'aprespa@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
