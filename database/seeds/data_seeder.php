<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class data_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
        for($i = 1; $i <= 50; $i++){
 
              // insert data ke table pegawai menggunakan Faker
            DB::table('posts')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

                // 'pegawai_umur' => $faker->numberBetween(25,40),
                // 'pegawai_alamat' => $faker->address
            ]);
 
        }
 
    }    
}
