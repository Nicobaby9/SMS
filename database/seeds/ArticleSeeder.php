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
                'title'          => 'Class meeting sekolah',
                'content'        => Str::random(789),
                'image'          => '1610516451.jpg',
                'slug'       	 => 'class-meeting-sekolah',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
            ],

            1 => [
                'id'             => 2,
                'user_id'        => '1',
                'title'          => 'Manfaat Try Out AKM',
                'content'        => Str::random(889),
                'image'          => '1610510772.jpeg',
                'slug'       	 => 'manfaat-try-out-akm',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
            ],

            2 => [
                'id'             => 3,
                'user_id'        => '1',
                'title'          => 'Sabdo Cinta Angon Kasih',
                'content'        => Str::random(1021),
                'image'          => '1610516766.jpg',
                'slug'       	 => 'sabdo-cinta-angon-kasih',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
            ],

            3 => [
                'id'             => 4,
                'user_id'        => '1',
                'title'          => 'Mendidik Anak Menjadi Taat',
                'content'        => Str::random(768),
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
