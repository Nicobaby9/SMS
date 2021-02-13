<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(FrontEndSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(ThreadSeeder::class);
        $this->call(UserSeeder::class);
    }
}
