<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// $factory->define(App\tb_m_siswa::class, function (Faker $faker) {
//     return [
//         'nama_lengkap' => $faker->name,
//         'nama_panggilan' => $faker->sentence(),
//         'jenis_kelamin' => $faker->sentence(),
//         'ttl' => $faker->sentence(),
//         'nik' => $faker->sentence(),
//         'nama_jalan' => $faker->sentence(),
//         'nama_desa' => $faker->sentence(),
//         'kecamatan' => $faker->sentence(),
//         'kabupaten' => $faker->sentence(),
//         'provinsi' => $faker->sentence(),
//         'agama' => $faker->sentence(),
//         'kewarganegaraan' => $faker->sentence(),
//         'anak_ke' => $faker->sentence(),
//         'jumlah_saudara_kandung' => $faker->sentence(),
//         'jumlah_saudara_tiri' => $faker->sentence(),
//         'jumlah_saudara_angkat' => $faker->sentence(),
//         'status_yatim' => $faker->sentence(),
//         'bahasa' => $faker->sentence(),
//         'golongan_darah' => $faker->sentence(),
//         'penyakit' => $faker->sentence(),
//         'imunisasi' => $faker->sentence(),
//         'bahasa' => $faker->sentence(),
//         'ciri_ciri' => $faker->sentence(),
//        	'tinggi_berat_badan' => $faker->sentence(),
//         'jarak_rumah' => $faker->sentence(),
//         'foto' =>'http://loremflickr.com/400/300?random='.rand(1, 100),
//         'id_ortu' => $faker->sentence(),
       
       
//         'nik' => $faker->unique()->safeEmail,
//        ];
// });
factory(App\tb_m_siswa::class, 50)->create()->each(function ($u) {
        $u->posts()->save(factory(App\tb_m_ortu::class)->make());
    });
