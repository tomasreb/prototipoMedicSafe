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
        $this->call(UserTableSeeder::class);
        $this->call(MedicTableSeeder::class);

         $this->call(PartTableSeeder::class);
         $this->call(StudyTableSeeder::class);







    }
}
