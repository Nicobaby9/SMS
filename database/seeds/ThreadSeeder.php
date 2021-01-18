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

    }
}
