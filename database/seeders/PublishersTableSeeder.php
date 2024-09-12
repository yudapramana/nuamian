<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('publishers')->delete();
        
        \DB::table('publishers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gramedia Pustaka Utama',
                'email' => 'pub@gramedia.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-03 14:35:05',
                'updated_at' => '2024-09-09 13:07:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Periplus',
                'email' => 'pub@periplus.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-03 14:36:33',
                'updated_at' => '2024-09-03 14:36:33',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Balai Pustaka',
                'email' => 'pub@balaipustaka.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-03 14:38:05',
                'updated_at' => '2024-09-03 14:38:05',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Elex Computindo',
                'email' => 'elex@computindo',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-09 13:06:48',
                'updated_at' => '2024-09-09 13:06:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Mizan Publishing',
                'email' => 'pub@mizan.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-09 13:07:51',
                'updated_at' => '2024-09-09 13:07:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Grafindo Media Pratama',
                'email' => 'pub@gmp.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-09 13:08:15',
                'updated_at' => '2024-09-09 13:08:15',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Indiva Media Kreasi',
                'email' => 'pub@imk.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-09 13:08:31',
                'updated_at' => '2024-09-09 13:08:31',
            ),
        ));
        
        
    }
}