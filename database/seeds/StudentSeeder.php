<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('students')->insert([
        	0 => [
                'id' 			=> 1,
                'nisn'			=> '123456789',
                'fullname' 		=> 'Ajisaka',
                'religion' 		=> 'Islam',
                'gender' 		=> 'Perempuan',
                'birth' 		=> '2012-04-19',
                'phone' 		=> '08123456789',
                'photo' 		=> 'profile.png',
                'speciality' 	=> 'Informatika',
                'address' 		=> 'Surabaya',
                'start_year' 	=> '2021-05-11',
                'end_year' 		=> '1971-07-02',
                'created_at' 	=> '2021-01-07 08:27:30',
            ],

            1 => [
                'id' 			=> 2,
                'nisn'			=> '123456788',
                'fullname' 		=> 'Danny',
                'religion' 		=> 'Islam',
                'gender' 		=> 'Laki-Laki',
                'birth' 		=> '2012-04-19',
                'phone' 		=> '08123456781',
                'photo' 		=> 'profile.png',
                'speciality' 	=> 'Informatika',
                'address' 		=> 'Surabaya',
                'start_year' 	=> '2021-05-11',
                'end_year' 		=> '1971-07-02',
                'created_at' 	=> '2021-01-07 08:27:30',
            ],

            2 => [
                'id' 			=> 3,
                'nisn'			=> '123456787',
                'fullname' 		=> 'Jon Bovi',
                'religion' 		=> 'Islam',
                'gender' 		=> 'Laki-Laki',
                'birth' 		=> '2012-04-19',
                'phone' 		=> '08123456782',
                'photo' 		=> 'profile.png',
                'speciality' 	=> 'Informatika',
                'address' 		=> 'Surabaya',
                'start_year' 	=> '2021-05-11',
                'end_year' 		=> '1971-07-02',
                'created_at' 	=> '2021-01-07 08:27:30',
            ],

            3 => [
                'id' 			=> 4,
                'nisn'			=> '123456786',
                'fullname' 		=> 'Anya Geraldine',
                'religion' 		=> 'Islam',
                'gender' 		=> 'Perempuan',
                'birth' 		=> '2012-04-19',
                'phone' 		=> '08123456783',
                'photo' 		=> 'profile.png',
                'speciality' 	=> 'Informatika',
                'address' 		=> 'Surabaya',
                'start_year' 	=> '2021-05-11',
                'end_year' 		=> '1971-07-02',
                'created_at' 	=> '2021-01-07 08:27:30',
            ],
        ]);
    }
}
