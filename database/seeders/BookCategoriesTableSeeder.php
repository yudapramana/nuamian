<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('book_categories')->delete();
        
        \DB::table('book_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pendidikan Madrasah',
                'created_at' => '2024-09-03 14:11:48',
                'updated_at' => '2024-09-03 14:11:48',
                'slug' => 'pendidikan-madrasah',
                'description' => 'Kategori Pendidikan Madrasah',
                'is_visible' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bimas Islam',
                'created_at' => '2024-09-03 14:12:08',
                'updated_at' => '2024-09-03 14:12:08',
                'slug' => 'bimas-islam',
                'description' => 'Kategori Bimas Islam',
                'is_visible' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Haji dan Umrah',
                'created_at' => '2024-09-03 14:12:26',
                'updated_at' => '2024-09-03 14:12:26',
                'slug' => 'haji-dan-umrah',
                'description' => '	Kategori Haji dan Umrah',
                'is_visible' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Zakat dan Wakaf',
                'created_at' => '2024-09-03 14:12:42',
                'updated_at' => '2024-09-03 14:12:42',
                'slug' => 'zakat-dan-wakaf',
                'description' => 'Kategori Zakat dan Wakaf',
                'is_visible' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Filsafat dan Psikologi',
                'created_at' => '2024-09-09 13:11:12',
                'updated_at' => '2024-09-09 13:11:12',
                'slug' => 'filsafat-dan-psikologi',
                'description' => NULL,
                'is_visible' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Geografi dan Sejarah',
                'created_at' => '2024-09-09 13:11:24',
                'updated_at' => '2024-09-09 13:11:24',
                'slug' => 'geografi-dan-sejarah',
                'description' => NULL,
                'is_visible' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Novel',
                'created_at' => '2024-09-09 13:11:28',
                'updated_at' => '2024-09-09 13:11:28',
                'slug' => 'novel',
                'description' => NULL,
                'is_visible' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ilmu-ilmu Sosial',
                'created_at' => '2024-09-09 13:11:46',
                'updated_at' => '2024-09-09 13:11:46',
                'slug' => 'ilmu-ilmu-sosial',
                'description' => NULL,
                'is_visible' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Bahasa',
                'created_at' => '2024-09-09 13:11:50',
                'updated_at' => '2024-09-09 13:11:50',
                'slug' => 'bahasa',
                'description' => NULL,
                'is_visible' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Teknologi dan Ilmu-ilmu Terapan',
                'created_at' => '2024-09-09 13:11:57',
                'updated_at' => '2024-09-09 13:11:57',
                'slug' => 'teknologi-dan-ilmu-ilmu-terapan',
                'description' => NULL,
                'is_visible' => 1,
            ),
        ));
        
        
    }
}