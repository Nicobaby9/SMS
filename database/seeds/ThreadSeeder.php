<?php

use Illuminate\Database\Seeder;

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
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            1 => [
                'id' 	=> 2,
                'name' 	=> 'Laravel',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            2 => [
                'id' 	=> 3,
                'name' 	=> 'Javascript',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            3 => [
                'id' 	=> 4,
                'name' 	=> 'Java',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            4 => [
                'id' 	=> 5,
                'name' 	=> 'Python',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            5 => [
                'id' 	=> 6,
                'name' 	=> 'Swift',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            6 => [
                'id' 	=> 7,
                'name' 	=> 'C++',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            7 => [
                'id' 	=> 8,
                'name' 	=> 'Dart',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

        ]);

    	//THREADS
        \DB::table('threads')->insert([
            0 => [
                'id' => 1,
                'subject' => 'Generasi yang Hebat adalah Generasi yang Berpendidikan',
                'thread' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum delenititque 			corrupti quos dolores et quas molestias excepturi sin',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
                'user_id' => '1',
            ],

            1 => [
                'id' => 2,
                'subject' => 'test question 1',
                'thread' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum delenititque 			corrupti quos dolores et quas molestias excepturi sin',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
                'user_id' => '2',
            ],
        ]);

        // COMMENTS TO THREAD
        \DB::table('comments')->insert([
            0 => [
                'id' => 1,
                'user_id' => '2',
                'body' => 'ui blanditiis praesentium voluptatum delenititque corrupti quos dolores et quas molestias excepturi sin',
                'commentable_id' => '1',
                'commentable_type' => 'App\Model\Thread',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            1 => [
                'id' => 2,
                'user_id' => '1',
                'body' => 'Aui blanditiis praesentium voluptatum delenititqueorrupti quos dolores et quas molestias excepturi sin',
                'commentable_id' => '2',
                'commentable_type' => 'App\Model\Thread',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            //REPLY TO COMMENT
            2 => [
            	'id' => 3,
                'user_id' => '2',
                'body' => 'Aet quas molestias excepturi sin',
                'commentable_id' => '2',
                'commentable_type' => 'App\Model\Comment',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],

            3 => [
            	'id' => 4,
                'user_id' => '1',
                'body' => ' quos dolores et quas molestias excepturi sin',
                'commentable_id' => '2',
                'commentable_type' => 'App\Model\Comment',
                'created_at' => '2021-01-07 08:27:30',
                'update_at' => '22021-01-07 08:27:300',
            ],
        ]);


        \DB::table('tag_thread')->insert([
        	0 => [
                'id' 			=> 1,
                'thread_id' 	=> '1',
                'tag_id' 		=> '1',
                'created_at' 	=> '2021-01-07 08:27:30',
                'update_at' 	=> '22021-01-07 08:27:300',
            ],

            1 => [
                'id' 			=> 2,
                'thread_id' 	=> '1',
                'tag_id' 		=> '2',
                'created_at' 	=> '2021-01-07 08:27:30',
                'update_at' 	=> '22021-01-07 08:27:300',
            ],

            2 => [
                'id' 			=> 3,
                'thread_id' 	=> '1',
                'tag_id' 		=> '3',
                'created_at' 	=> '2021-01-07 08:27:30',
                'update_at' 	=> '22021-01-07 08:27:300',
            ],

            3 => [
                'id' 			=> 4,
                'thread_id' 	=> '1',
                'tag_id' 		=> '4',
                'created_at' 	=> '2021-01-07 08:27:30',
                'update_at' 	=> '22021-01-07 08:27:300',
            ],

            4 => [
                'id' 			=> 5,
                'thread_id' 	=> '2',
                'tag_id' 		=> '4',
                'created_at' 	=> '2021-01-07 08:27:30',
                'update_at' 	=> '22021-01-07 08:27:300',
            ],

            5 => [
                'id' 			=> 6,
                'thread_id' 	=> '2',
                'tag_id' 		=> '2',
                'created_at' 	=> '2021-01-07 08:27:30',
                'update_at' 	=> '22021-01-07 08:27:300',
            ],

            6 => [
                'id' 			=> 7,
                'thread_id' 	=> '2',
                'tag_id' 		=> '6',
                'created_at' 	=> '2021-01-07 08:27:30',
                'update_at' 	=> '22021-01-07 08:27:300',
            ],

            7 => [
                'id' 			=> 8,
                'thread_id' 	=> '2',
                'tag_id' 		=> '8',
                'created_at' 	=> '2021-01-07 08:27:30',
                'update_at' 	=> '22021-01-07 08:27:300',
            ],
        ]);
    }
}
