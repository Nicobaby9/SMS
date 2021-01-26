<?php

use Illuminate\Database\Seeder;

class FrontEndSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('frontends')->insert([ 
        	0 => [
    			'id' => 1,
    			'school_name' 	 	 => 'SMAN 1 MONTREAL',
    			'slogan'		 	 => 'Generasi yang Hebat adalah Generasi yang Berpendidikan',
    			'students' 			 => 950,
    			'educator' 		 	 =>  64,
    			'teacher' 	 		 => 20,
    			'course'		 	 => 15,
    			'content1_title' 	 => 'Pendidikan',
    			'content1_body' 	 =>  'Pendidikan adalah senjata paling ampuh untuk mengubah dunia. Hanya pendidikan yang bisa menyelamatkan masa depan, tanpa pendidikan Indonesia tak mungkin bertahan',
    			'content1_photo' 	 =>  'content1.jpg.jpg',
    			'content2_title' 	 => 'Visi Sekolah',
    			'content2_body' 	 =>  'Unggul dalam disiplin untuk Berprestasi, Berkreasi, mencegah kerusakan dan Pencemaran alam serta melestarikan Lingkungan Hidup berlandaskan Iman Dan Taqwa',
    			'content2_photo' 	 =>  'content2.jpg.jpg',
    			'content3_title' 	 => 'Misi Sekolah',
    			'content3_body' 	 =>  'Meningkatkan Iman dan Taqwa Terhadap Tuhan Yang Maha Esa serta hubungan yang harmonis antar personal sekolah. Meningkatkan motivasi siswa berwirausaha dan terampil mengembangkan wirausaha yang berbasis lingkungan hidup dan teknologi',
    			'content3_photo' 	 =>  'EmLDcWNXYAEFreE.jpg.jpg',
    			'profile1_photo'	 => '52895a6c-07fb-44fa-adf9-b0f61e45de77-60000287317949172447f372.jpeg.jpeg',
    			'profile1_title'	 => 'SMAN 1 MONTREAL',
    			'profile1_body'		 => 'Generasi yang Hebat adalah Generasi yang Berpendidikan',
    			'profile2_photo'	 => 'profile2.jpg.jpg',
    			'profile2_title'	 => 'Ayron Senna, S.Pd., S.Sos.',
    			'profile2_body'		 => 'Seiring dengan perkembangan IPTEK saat ini, teknologi informasi sangat dibutuhkan dengan cara yang cepat dan tepat, untuk itu diperlukan adanya sarana yang mampu mendukung kelancaran',
    			'profile3_photo'	 => 'Best-School-in-Meerut-1.png.png',
    			'profile3_title'	 => 'SMAN 1 MONTREAL',
    			'profile3_body'		 => 'Mewujudkan warga sekolah mampu mencegah pencemaran dan kerusakan lingkungan',
    			'facebook' 			 => 'http://facebook.com',
    			'twitter'			 => 'http://twitter.com',
    			'instagram' 		 => 'http://instagram.com',
    			'logo' 				 => 'Best-School-in-Meerut-1.png.png',
                'created_at'     => '2016-07-29 15:13:02',
                'updated_at'     => '2016-08-18 14:33:50',
                'background_image' 	 => 'A'
    		],
        ]);
    }
}
