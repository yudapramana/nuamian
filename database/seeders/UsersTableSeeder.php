<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
                'email' => 'yuda@bacaro.id',
                'email_verified_at' => NULL,
                'role_id' => 2,
                'password' => '$2y$12$Yve8794ytb9KhmtmOtY3JeVHCKwygyUdd8xgT4eyeH6M8B2vH97JO',
                'remember_token' => NULL,
                'created_at' => '2024-09-03 14:25:01',
                'updated_at' => '2024-09-03 14:25:01',
            ),
        ));
        
        
    }
}