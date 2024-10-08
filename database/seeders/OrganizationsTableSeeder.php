<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('organizations')->delete();
        
        \DB::table('organizations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Man IC Sumatera Barat',
                'email' => 'admin@manic.com',
                'is_active' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'MAN 1 Kota Padang',
                'email' => 'admin@man1kotapadang.com',
                'is_active' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'MAN 2 Kota Padang',
                'email' => 'admin@man2kotapadang.com',
                'is_active' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'MAN 3 Kota Padang',
                'email' => 'admin@man3kotapadang.com',
                'is_active' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'MAN 4 Kota Padang',
                'email' => 'admin@man4kotapadang.com',
                'is_active' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}