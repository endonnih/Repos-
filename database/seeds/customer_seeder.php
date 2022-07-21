<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use app\customer;

class customer_seeder extends Seeder
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
            DB::table('customer')->insert([

                'user' => 'ahmad1',
                'name' => $faker->name,
                'alamat' => $faker->address,
                'phone' => $faker->numerify('###-#########'),
                'pic' => $faker->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'flaq'=> "1",
            ]);
        }
    }
}