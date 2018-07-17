<?php

use App\User;
use Illuminate\Database\Seeder;

class SampleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'email' => 'ak_moore@live.com',
            'password' => bcrypt('password')
        ]);
        $admin->roles()->attach(1);

        $ae = User::create([
            'email' => 'shirley@email.com',
            'password' => bcrypt('password')
        ]);
        $ae->roles()->attach(2);

        $lsm = User::create([
            'email' => 'dortie@email.com',
            'password' => bcrypt('password')
        ]);
        $lsm->roles()->attach(3);
    }
}
