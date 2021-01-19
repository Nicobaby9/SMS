<?php

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('article_category')->insert([
    		0 => [
    			'id' => 1,
    			'user_id' 	 => '1',
    			'title'		 => 'School event 1',
    			'photo' 	 => '1610354055.jpg',
    			'size' 		 => '91258',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		1 => [
    			'id' => 2,
    			'user_id' 	 => '1',
    			'title'		 => 'School event 2',
    			'photo' 	 => '1610353738.jpeg',
    			'size' 		 => '155481',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		2 => [
    			'id' => 3,
    			'user_id' 	 => '1',
    			'title'		 => 'School event 3',
    			'photo' 	 => '1610353755.jpg',
    			'size' 		 => '153993',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    		3 => [
    			'id' => 4,
    			'user_id' 	 => '1',
    			'title'		 => 'School event 4',
    			'photo' 	 => '1610354141.jpg',
    			'size' 		 => '70964',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
    		],

    	]);
    }
}
