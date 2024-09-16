<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'yuda',
                'email' => 'yuda@vperpus.id',
                'email_verified_at' => NULL,
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'organization_id' => null
            ),
            array (
                'id' => 2,
                'name' => 'harry',
                'email' => 'harry@vperpus.id',
                'email_verified_at' => NULL,
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'organization_id' => null
            ),
            array (
                'id' => 3,
                'name' => 'najib',
                'email' => 'najib@vperpus.id',
                'email_verified_at' => NULL,
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'organization_id' => null
            ),
            array (
                'id' => 4,
                'name' => 'zahra',
                'email' => 'zahra@vperpus.id',
                'email_verified_at' => NULL,
                'role_id' => 2,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'organization_id' => null
            ),
            array (
                'id' => 5,
                'name' => 'adminmanic',
                'email' => 'adminmanic@vperpus.id',
                'email_verified_at' => NULL,
                'role_id' => 4,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'organization_id' => 1
            ),
            array (
                'id' => 6,
                'name' => 'adminman1kotapadang',
                'email' => 'adminman1kotapadang@vperpus.id',
                'email_verified_at' => NULL,
                'role_id' => 4,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'organization_id' => 2
            ),
            array (
                'id' => 7,
                'name' => 'adminman2kotapadang',
                'email' => 'adminman2kotapadang@vperpus.id',
                'email_verified_at' => NULL,
                'role_id' => 4,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'organization_id' => 3
            ),
        ));
        
        
    }
}