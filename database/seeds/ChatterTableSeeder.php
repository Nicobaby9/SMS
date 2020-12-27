<?php

use Illuminate\Database\Seeder;

class ChatterTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // FRONT END SET

        \DB::table('frontends')->insert([
            0 => [
                'id' => 1,
                'slogan' => 'Generasi yang Hebat adalah Generasi yang Berpendidikan',
                'students' => '950',
                'educator' => '64',
                'teacher' => '20',
                'course' => '15',

                'content1_title' => 'Pendidikan',
                'content1_body' => 'Pendidikan adalah senjata paling ampuh untuk mengubah dunia. Hanya pendidikan yang bisa menyelamatkan masa depan, tanpa pendidikan Indonesia tak mungkin bertahan',
                'content1_photo' => 'a',

                'content2_title' => 'Visi Sekolah',
                'content2_body' => 'Unggul dalam disiplin untuk Berprestasi, Berkreasi, mencegah kerusakan dan Pencemaran alam serta melestarikan Lingkungan Hidup berlandaskan Iman Dan Taqwa',
                'content2_photo' => 'a',

                'content3_title' => 'Misi Sekolah',
                'content3_body' => 'Meningkatkan Iman dan Taqwa Terhadap Tuhan Yang Maha Esa serta hubungan yang harmonis antar personal sekolah. Meningkatkan motivasi siswa berwirausaha dan terampil mengembangkan wirausaha yang berbasis lingkungan hidup dan teknologi',
                'content3_photo' => 'a',

                'profile1_photo' => 'a',
                'profile1_title' => 'SMAN 1 PATIANROWO',
                'profile1_body' => 'Generasi yang Hebat adalah Generasi yang Berpendidikan',

                'profile2_photo' => 'a',
                'profile2_title' => 'PUJIANTO, S.Pd., S.Sos.',
                'profile2_body' => 'Seiring dengan perkembangan IPTEK saat ini, teknologi informasi sangat dibutuhkan dengan cara yang cepat dan tepat, untuk itu diperlukan adanya sarana yang mampu mendukung kelancaran',

                'profile3_photo' => 'a',
                'profile3_title' => 'UPTD SMAN 1 PATIANROWO',
                'profile3_body' => 'Mewujudkan warga sekolah mampu mencegah pencemaran dan kerusakan lingkungan',
                'facebook' => 'http://facebook.com',
                'twitter' => 'http://twitter.com',
                'instagram' => 'http://instagram.com'

            ],
        ]);

        // CREATE THE USER

        if (!\DB::table('users')->find(1)) {
            \DB::table('users')->insert([
                0 => [
                    'id'             => 1,
                    'fullname'       => 'Yudho Aerials',
                    'email'          => 'nosvengeance@gmail.com',
                    'phone'          => '081515790912',
                    'password'       => '$2y$10$9ED4Exe2raEeaeOzk.EW6uMBKn3Ib5Q.7kABWaf4QHagOgYHU8ca.',
                    'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
                    'created_at'     => '2016-07-29 15:13:02',
                    'updated_at'     => '2016-08-18 14:33:50',
                ],
            ]);
        }

    }
}
