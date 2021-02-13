<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('users')->find(1)) {
            \DB::table('users')->insert([
                0 => [
                    'id'             => 1,
                    'fullname'       => 'Lando Norris',
                    'email'          => 'admin@gmail.com',
                    'phone'          => '081518890652',
                    'password'       =>  Hash::make('admin'),
                    'photo'          => '20210131083524.jpg',
                    'username'       => 'landonorri_s',
                    'role'           => 'admin',
                    'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
                    'created_at'     => '2016-07-29 15:13:02',
                    'updated_at'     => '2016-08-18 14:33:50',
                ],

                1 => [
                    'id'             => 2,
                    'fullname'       => 'Sebastian Vettel',
                    'email'          => 'user@gmail.com',
                    'phone'          => '081518890651',
                    'password'       =>  Hash::make('user'),
                    'photo'          => '20210116091624.jpg',
                    'username'       => 'seb5',
                    'role'           => 'user',
                    'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
                    'created_at'     => '2016-07-29 15:13:02',
                    'updated_at'     => '2016-08-18 14:33:50',
                ],
            ]);
        }
    }
}
