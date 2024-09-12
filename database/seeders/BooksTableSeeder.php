<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('books')->delete();
        
        \DB::table('books')->insert(array (
            0 => 
            array (
                'id' => 1,
                'book_code' => 'ISL-00082111',
                'title' => 'Sengsara Membawa Nikmat',
                'slug' => 'sengsara-membawa-nikmat',
                'description' => 'Novel “Sengsara Membawa Nikmat” ini mengambil tema yaitu mengenai perjuangan seorang tokoh bernama Midun, yang ia selalu mendapatkan kesengsaraan dan kemalangan karena pihak yang tidak suka dengannya, hingga akhirnya ia menjadi seorang yang berhasil dan mendapatkan nikmat tiada tara.',
                'thumbnail' => NULL,
                'author_id' => 1,
                'book_category_id' => 1,
                'publisher_id' => 3,
                'publication_year' => '2001',
                'isbn' => '979-407-360-1',
                'cover_image_url' => NULL,
                'status' => 'draft',
                'is_visible' => 0,
                'created_at' => '2024-09-03 14:52:29',
                'updated_at' => '2024-09-04 03:12:21',
            ),
            1 => 
            array (
                'id' => 2,
                'book_code' => 'ISL-008433',
            'title' => 'Cahaya dari Madinah (Edisi Eksklusif)',
                'slug' => 'cahaya-dari-madinah-edisi-eksklusif',
                'description' => 'Deskripsi Buku
Sesuai dengan judulnya Cahaya dari Madinah, buku ini memang benar-benar memberikan secercah cahaya baru bagi pengetahuan keislaman masyarakat muslim Indonesia. Dan mengungkap segala keluasan dan keluwesan Islam sebagai agama yang rahmatan lil alamin.

SINOPSIS
Buku ini adalah edisi tambahan dari buku “Cahaya dari Madinah: Mutiara Hikmah Penyejuk Jiwa” yang ditulis oleh Syekh Ali Jaber dan pernah diterbitkan pada tahun 2014. Isinya tentang bagaimana pandangan Syekh Ali Jaber tentang Islam yang mendamaikan, Islam yang memberikan kemajuan dan kemakmuran bagi segenap umat muslim, khususnya umat muslim di Indonesia. Semua materi di dalam buku ini diambil dari ceramah-ceramah Syekh Ali Jaber di berbagai tempat, yang dikemas dan dikumpulkan menjadi sebuah buku. Harapannya, buku ini dapat memberikan cahaya bagi hati, dan mutiara bagi setiap jiwa yang haus akan hikmah. Selamat membaca.

"Buku ini atas izin Allah memiliki kekuatan mengubah pembacanya, sebab berasal dari materi dakwah penuh cinta dan keikhlasan." (Yusuf Mansur)

"Subhanallah… Syekh Ali benar-benar Syekh Ali. Syekh Ali dikesankan orang tua guru yang alim, dan Ali adalah sahabat Nabi dan juga menantu Nabi yang sangat cerdas. Begitulah Syekh Ali diseniorkan di antara para dai muda, karena kealiman dan ilmunya. Uhibukum fillah ya Syekh Ali." (Sahabatmu, Muhammad Arifin Ilham).

DETAIL
Jumlah Halaman : 232
Penerbit : Elex Media Komputindo
Tanggal Terbit : 12 Apr 2021
Berat : 0.3 kg
ISBN : 9786230024283
Lebar : 14.0 cm
Bahasa : Indonesia
Panjang : 21.0 cm',
                'thumbnail' => NULL,
                'author_id' => 2,
                'book_category_id' => 5,
                'publisher_id' => 4,
                'publication_year' => '2021',
                'isbn' => '9786230024283',
                'cover_image_url' => NULL,
                'status' => 'draft',
                'is_visible' => 1,
                'created_at' => '2024-09-04 03:08:17',
                'updated_at' => '2024-09-04 03:08:17',
            ),
            2 => 
            array (
                'id' => 3,
                'book_code' => 'ISL-093211',
                'title' => 'Maaf Tuhan, Aku Hampir Menyerah',
                'slug' => 'maaf-tuhan-aku-hampir-menyerah',
                'description' => 'Deskripsi Buku
Maaf Tuhan, Aku Hampir Menyerah
Tidak semua hal akan berjalan sesuai keinginanmu. Pada satu waktu, impianmu akan dipukul mundur, harapanmu terpatahkan, dan langkahmu dihentikan paksa.

Dunia yang luas terasa begitu menyesakkan. Ramai, tapi sepi.

Ingin terus melangkah, takut terjatuh. Ingin putar balik, sudah tak mungkin tertempuh. Ingin menyerah, tetap saja tidak akan pernah menyelesaikan masalah. Setiap pilihan nyaris tak mampu kamu tanggung konsekuensinya.

"Maaf Tuhan, Aku Hampir Menyerah" akan menemanimu, untuk terus melangkah maju, menerabas segala keterbatasan, menikmati segala kekecewaan, melewati dunia yang penuh dengan kefanaan, menuju satu tempat bernama keabadian.

Untukmu, jiwa-jiwa kecil yang sedang mendamba bahagia, kebahagiaan yang sesungguhnya. Selamat menikmati!

Tidak masalah lelah. Itu menandakan kita adalah manusia, rehat sejenak dari riuhnya peperangan antara hati dan pikiran. Kadang kita juga perlu menumpahkan air mata, bukan untuk menunjukkan kelemahan diri. Namun, untuk membersihkan hati agar bisa memandang segalanya dengan lebih jernih.

Andai semua orang menampakkan kesedihannya barangkali tak tersisa lagi kebahagiaan di dunia ini, karena setiap hati pasti menyimpan perih. Namun, nyatanya tidak begitu, ada yang memilih untuk menjadi kuat, tak berucap kecuali kesyukuran atas rasa sakit sekalipun. Bukan mereka tak pernah menangis, sering malah, tapi tangis itu jatuh hanya di hadapan pemilik semesta, selebihnya senyum yang lebih sering terlihat di wajah mereka. Tangguh, berusaha tangguh.

Buku Maaf Tuhan, Aku Hampir Menyerah ini termasuk ke dalam kategori buku non fiksi yang memuat motivasi Islami, yang dibagi ke dalam 75 bagian. Setiap bagian akan dibahas secara singkat ke dalam 1 sampai 2 halaman. Buku ini akan membahas bahwa tak semua hal akan bisa berjalan sesuai dengan keinginanmu. Pada suatu saat, kan tiba saatnya harapanmu terpatahkan, impianmu akan dipukul mundur, atau langkahmu dihentikan secara paksa. Buku Maaf Tuhan, Aku Hampir Menyerah akan menemani pembaca untuk terus melangkah maju dan menikmati segala bentuk kekecewaan yang diterima. Berusaha melewati segala hal yang melampaui keterbatasan dan melewati dunia yang penuh fana dan menuju tempat yang bernama keabadian. Buku ini cocok dibaca oleh pembaca yang merasa kehilangan arah hidup, seolah hidup tidak memiliki makna, sedang berduka, ragu akan impian sendiri, dan sedang berusaha kembali ke jalan yang benar.',
                'thumbnail' => NULL,
                'author_id' => 3,
                'book_category_id' => 6,
                'publisher_id' => 5,
                'publication_year' => '2020',
                'isbn' => '9786026744470',
                'cover_image_url' => NULL,
                'status' => 'draft',
                'is_visible' => 1,
                'created_at' => '2024-09-04 03:11:27',
                'updated_at' => '2024-09-04 03:11:27',
            ),
            3 => 
            array (
                'id' => 4,
                'book_code' => 'ISL-0082211',
                'title' => 'Tuhan Ada di Hatimu',
                'slug' => 'tuhan-ada-di-hatimu',
                'description' => 'Deskripsi Buku
Tuhan Ada di Hatimu karya Husein Ja’far Al-Hadar memberikan pandangan berbagai hal dari sudut pandang Islam yang indah. Termasuk dengan kondisi kekinian, yang semuanya dapat dijawab dengan ajaran dalam Islam sebagai agama yang tak pernah lekang oleh waktu.

Sinopsis buku

Di masa kini kata hijrah seakan menjadi hal yang ‘latah’ dalam kehidupan sehari-hari. Akhir-akhir ini kita dapati hijrah menjadi sesuatu yang sangat populer di masyarakat Muslim Indonesia. Namun kadang hijrah yang dimaksud dan dijalankan oleh sebagian orang hanya bersifat hukum saja, hanya meliputi aspek-aspek ritual saja. Misalnya, mereka melakukan hijrah dari sebelumnya tidak berkerudung menjadi berkerudung, dari yang tak rajin shalat menjadi rajin shalat.

Dalam Islam, hijrah itu doktrin yang sangat penting dan maknanya begitu luas dan mendalam. Mencakup seluruh aspek kehidupan kita. Minimal ada empat aspek yang harus dilakukan oleh umat Islam berkomitmen untuk hijrah. Pertama aspek spiritual atau sufistik-tasawuf, kedua aspek kultural, ketiga aspek filosofis, dan keempat aspek sosial.

Rumi berkata, “Dulu aku mencari Tuhan di masjid namun tidak kutemukan Tuhan di sana. Aku beralih ke gereja, aku juga tidak menemukan Tuhan di sana. Aku beralih dari tempat ibadah yang satu ke tempat ibadah yang lain namun aku tidak menemukan Tuhan di sana. Justru aku menemukan Tuhanku ketika aku menengok ke dalam diriku sendiri, ketika merenungkan tentang samudera diri ini.”

Daftar isi
Bonus dalam paket
Informasi lain
Lebar : 14 cm
Tinggi : 21 cm
Berat : 0,19
ISBN : 9786230000000
Sampul: soft cover',
                'thumbnail' => NULL,
                'author_id' => 4,
                'book_category_id' => 5,
                'publisher_id' => 4,
                'publication_year' => '2020',
                'isbn' => '9786232421479',
                'cover_image_url' => NULL,
                'status' => 'draft',
                'is_visible' => 1,
                'created_at' => '2024-09-04 03:13:49',
                'updated_at' => '2024-09-04 03:13:49',
            ),
        ));
        
        
    }
}