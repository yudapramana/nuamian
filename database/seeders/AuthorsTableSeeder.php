<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('authors')->delete();
        
        \DB::table('authors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sutan Sati',
                'email' => 'sutansati@gmail.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-03 14:51:05',
                'updated_at' => '2024-09-03 14:51:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Syekh Ali Jaber',
                'email' => 'alijaber@gmail.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-04 01:24:31',
                'updated_at' => '2024-09-04 01:24:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Alfialghazi ',
                'email' => 'alfialghazi72@gmail.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-04 03:10:36',
                'updated_at' => '2024-09-04 03:10:36',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Husein Ja`far Al Hadar',
                'email' => 'habib.husein@gmail.com',
                'photo' => NULL,
                'bio' => NULL,
                'created_at' => '2024-09-04 03:13:41',
                'updated_at' => '2024-09-04 03:13:41',
            ),
        ));
        
        
    }
}