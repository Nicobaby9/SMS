<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// TAGS
    	\DB::table('tags')->insert([
        	0 => [
                'id' 	=> 1,
                'name' 	=> 'PHP',
            ],

            1 => [
                'id' 	=> 2,
                'name' 	=> 'Laravel',
            ],

            2 => [
                'id' 	=> 3,
                'name' 	=> 'Javascript',
            ],

            3 => [
                'id' 	=> 4,
                'name' 	=> 'Java',
            ],

            4 => [
                'id' 	=> 5,
                'name' 	=> 'Python',
            ],

            5 => [
                'id' 	=> 6,
                'name' 	=> 'Swift',
            ],

            6 => [
                'id' 	=> 7,
                'name' 	=> 'C++',
            ],

            7 => [
                'id' 	=> 8,
                'name' 	=> 'Dart',
            ],

        ]);

    	//THREADS
        \DB::table('threads')->insert([
            0 => [
                'id' => 1,
                'subject' => 'Laravel',
                'slug' => Str::random(3).Carbon::now()->Format('s').'-'.\Str::slug('Laravel', '-'),
                'thread' => 'Apakah Laravel merupakan framework PHP yang paling populer?',
                'user_id' => '1',
                'created_at'    => '2021-01-07 08:27:30',
                'updated_at'    => '2021-01-07 08:27:30',
            ],

            1 => [
                'id' => 2,
                'subject' => 'Tanya Pemrograman?',
                'slug' => Str::random(3).Carbon::now()->Format('s').'-'.\Str::slug('Tanya Pemrograman?', '-'),
                'thread' => 'Bagaimana cara agar dapat menguasai suatu bahasa dengan waktu yang singkat?',
                'user_id' => '2',
                'created_at'    => '2021-01-07 08:27:30',
                'updated_at'    => '2021-01-07 08:27:30',
            ],
        ]);

        // COMMENTS TO THREAD
        \DB::table('comments')->insert([
            0 => [
                'id' => 1,
                'user_id' => '2',
                'body' => 'Ya, Laravel merupakan framework yang paling populer diantara yang lain.',
                'commentable_id' => '1',
                'commentable_type' => 'App\Model\Thread',
                'created_at' => '2021-01-07 08:27:30',
                'updated_at' => '2021-01-07 08:27:30',
            ],

            1 => [
                'id' => 2,
                'user_id' => '1',
                'body' => 'Belajar dan terus melakukan eksperimen',
                'commentable_id' => '2',
                'commentable_type' => 'App\Model\Thread',
                'created_at' => '2021-01-07 08:27:30',
                'updated_at' => '2021-01-07 08:27:30',
            ],

            //REPLY TO COMMENT
            2 => [
            	'id' => 3,
                'user_id' => '2',
                'body' => 'Saya setuju',
                'commentable_id' => '2',
                'commentable_type' => 'App\Model\Comment',
                'created_at' => '2021-01-07 08:27:30',
                'updated_at' => '2021-01-07 08:27:30',
            ],

            3 => [
            	'id' => 4,
                'user_id' => '1',
                'body' => ' Jangan lupa berdoa',
                'commentable_id' => '2',
                'commentable_type' => 'App\Model\Comment',
                'created_at' => '2021-01-07 08:27:30',
                'updated_at' => '2021-01-07 08:27:30',
            ],
        ]);


        \DB::table('tag_thread')->insert([
        	0 => [
                'id' 			=> 1,
                'thread_id' 	=> '1',
                'tag_id' 		=> '1',
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            1 => [
                'id' 			=> 2,
                'thread_id' 	=> '1',
                'tag_id' 		=> '2',
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            2 => [
                'id' 			=> 3,
                'thread_id' 	=> '1',
                'tag_id' 		=> '3',
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            3 => [
                'id' 			=> 4,
                'thread_id' 	=> '1',
                'tag_id' 		=> '4',
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            4 => [
                'id' 			=> 5,
                'thread_id' 	=> '2',
                'tag_id' 		=> '4',
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            5 => [
                'id' 			=> 6,
                'thread_id' 	=> '2',
                'tag_id' 		=> '2',
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            6 => [
                'id' 			=> 7,
                'thread_id' 	=> '2',
                'tag_id' 		=> '6',
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            7 => [
                'id' 			=> 8,
                'thread_id' 	=> '2',
                'tag_id' 		=> '8',
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],
        ]);
    }
}
