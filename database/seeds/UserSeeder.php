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
            'name' => 'Admin_Boby_11190071',
            'email' => '11190071@bsi.ac.id',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User_11190071',
            'email' => 'boby@bsi.ac.id',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('user');
    }
}
