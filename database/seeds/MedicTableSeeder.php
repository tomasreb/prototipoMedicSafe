<?php

use Illuminate\Database\Seeder;

class MedicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Medic::class,10)->create();

    }
}
