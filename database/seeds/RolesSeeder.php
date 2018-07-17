<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'admin' => 'Admin',
            'ae' => 'Account Executive', 
            'lsm' => 'Local Sales Manager',
            'gsm' => 'General Sales Manager',
            'csm' => 'Creative Service Manager',
            'csp' => 'Creative Service Personnel'
        ])->each(function($value, $key){
            Role::create([
                'name' => $key,
                'display_name' => $value
            ]);
        });
    }
}