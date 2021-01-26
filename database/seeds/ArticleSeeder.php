<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//CATEGORY

    	\DB::table('categories')->insert([
    		0 => [
    			'id' => 1,
    			'name' => 'Berita',
    			'slug' => Str::slug('Berita') . '-' . 'News',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		1 => [
    			'id' => 2,
    			'name' => 'Prestasi',
    			'slug' => Str::slug('Prestasi') . '-' . 'Congratulation',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		2 => [
    			'id' => 3,
    			'name' => 'Lomba',
    			'slug' => Str::slug('Lomba') . '-' . 'Championship',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		3 => [
    			'id' => 4,
    			'name' => 'Buku',
    			'slug' => Str::slug('Buku') . '-' . 'Books',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		4 => [
    			'id' => 5,
    			'name' => 'Pendidikan',
    			'slug' => Str::slug('Pendidikan') . '-' . 'Study',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],
    	]);

    	// ARTICLE
        \DB::table('articles')->insert([
            0 => [
                'id'             => 1,
                'user_id'        => '1',
                'title'          => 'Pentingnya Menanamkan Karakter Positif Sejak Dini',
                'content'        => 'Kedudukan karakter dalam perjalanan setiap manusia sangat penting sekali. Bahkan pembentukan karakter sejak dini akan sangat menentukan bagaimana seseorang dalam menjalani hidupnya. Siapapun dia, apapun profesinya, ketika memiliki karakter positif, tentu akan lebih baik dari pada yang tidak memiliki karakter. Maka dari itu, penanaman karakter positif ini sangat diperlukan sejak dini agar bisa menjadi modal mereka dalam mengarungi perjalanan hidup yang sangat berat.

Karakter yang kuat, berani dan tidak mudah menyerah akan sangat membantu siapapun dalam menjalani hidup. Karakter positif selalu bisa diterapkan dalam berbagai profesi, baik seorang pebisnis, pendidik, atau profesi lainnya. Seperti kita ketahui bersama bahwa yang sering menjadi masalah bangsa Indonesia ini adalah banyaknya manusia Indonesia yang tidak memiliki karakter positif sehingga dimanapun mereka berada akan selalu menimbulkan masalah dan bukan menjadi solusi dari sebuah masalah.
',
                'image'          => '1610516451.jpg',
                'slug'       	 => 'class-meeting-sekolah',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
            ],

            1 => [
                'id'             => 2,
                'user_id'        => '1',
                'title'          => 'Jangan Mudah Menyerah
',
                'content'        => 'Siapapun Anda, apapun profesi Anda, Anda harus memperhatikan sifat jangan mudah menyerah. Karena harus Anda sadari bahwa dalam setiap perjalanan hidup, pasti kita akan dihadapakan dengan berbagai masalah, yang kadang-kadang memang sangat berat. Namun, yakinlah bahwa di dalam sebuah masalah yang berat tersebut pasti ada hikmah yang kadang kita tidak akan mengerti sebelum kita menghadapi masalah tersebut. Maka dari itu, hadapi masalah tersebut dengan lapang dan penuh semangat, jangan menjadi orang yang mudah menyerah.

Jangan menjadi orang yang manja seperti anak kecil. Contoh sederhana adalah ketika Anda menjadi seorang pedagang dan mendapati barang dagangan Anda tidak laku dijual dalam beberpaa hari lalu kemudian Anda memutuskan berhenti menjadi pedagang begitu saja. Itu adalah contoh sikap mudah menyerah, akan lebih baik jika Anda mengevaluasi terlebih dahulu, apa yang kurang dari dagangan Anda, atau ada cara yang mungkin salah dalam strategi, dan lain-lain.
',
                'image'          => '1610510772.jpeg',
                'slug'       	 => 'manfaat-try-out-akm',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
            ],

            2 => [
                'id'             => 3,
                'user_id'        => '1',
                'title'          => 'Sabdo Cinta Angon Kasih',
                'content'        => 'Buku ini menunjukkan bahwa Sujiwo Tejo amat berbakat sebagai pencatat peristiwa yang detil. Hampir semua peristiwa penting yang terjadi dalam setahun di Indonesia dan hangat diperbincangkan masyarakat, ia rekam di sini.

Kisah Sabdo Cinta Angon Kasih merupakan perwujudan dari keinginan setiap manusia dalam mencari sosok pemimpin yang kelak mampu menaunginya. Sangat cocok dengan situasi saat ini.

Gaya Sujiwo Tejo bercerita dalam buku ini ringan, penuh humor menggelitik, romatis, namun selalu membuat pembacanya berefleksi panjang atas hidup.
Tidak hanya berisi kisah yang akan membuat penasaran sampai akhir, buku ini dipenuhi berbagai kutipan berharga yang menghangatkan hati.',
                'image'          => '1610516766.jpg',
                'slug'       	 => 'sabdo-cinta-angon-kasih',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
            ],

            3 => [
                'id'             => 4,
                'user_id'        => '1',
                'title'          => 'Indonesia Terdiri Dari Berbagai Suku',
                'content'        => 'Negara kita Indonesia adalah sebuah negara besar yang terdiri dari ribuan pulau yang tersebar di seantero negeri. Dengan kondisi gegrafis ang begitu luas, maka tak heran jika Indonesia memliki beragam suku dan budaya. Kekayaan Indonesia tidak hanya dari sumber daya alam yang melimpah ruah, namun kekayaan budaya yang begitu majemuk menjadi salah satu pemersatu bangsa di bawah naungan Negara Kesatuan Republik Indonesia. Ada suku Jawa, Madura, Betawi, Batak dan masih banyak lagi suku lainnya yang tersebar di berbagai daerah.

Untuk itulah, kita sebagai warga negara Indonesia, harus menghormasti setiap suku yang ada di nusantara. Karena bisa jadi setiap suku memiliki kebudayaan yang berebda dengan budaya suku kita, atau bahkan bertentangan dengan adat budaya kita. Namun kita harus menyadari bahwa itulah kekayaan sesungguhnya dari bangsa kita Indonesia. Kita tidak boleh mencela adat suku lain hanya karena berebeda dengan budaya kita.
',
                'image'          => '1610676640.jpeg',
                'slug'       	 => 'mendidik-anak-menjadi-taat',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
            ],

        ]);

        //ARTICLE CATEGORY

    	\DB::table('article_category')->insert([
    		0 => [
    			'id' => 1,
    			'article_id' 	 => '1',
    			'category_id' 	 => '1',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		1 => [
    			'id' => 2,
    			'article_id' 	 => '1',
    			'category_id' 	 => '3',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		2 => [
    			'id' => 3,
    			'article_id'  	 => '2',
    			'category_id' 	 => '1',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		3 => [
    			'id' => 4,
    			'article_id' 	 => '2',
    			'category_id' 	 => '5',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		4 => [
    			'id' => 5,
    			'article_id' 	 => '3',
    			'category_id' 	 => '4',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		5 => [
    			'id' => 6,
    			'article_id' 	 => '4',
    			'category_id' 	 => '1',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		6 => [
    			'id' => 7,
    			'article_id' 	 => '4',
    			'category_id' 	 => '5',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],
    	]);
    }
}
