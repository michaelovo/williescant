<?php

use Illuminate\Database\Seeder;

class ReadySaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Faker\Generator)->seed(123);
        factory(\App\ReadySale::class, 10)->create();
    }
}
