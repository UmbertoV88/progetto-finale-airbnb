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
        // $this->call(FlatsTableSeeder::class);
        // $this->call(MessagesTableSeeder::class);
        // $this->call(ServicesTableSeeder::class);
        // $this->call(SponsorsTableSeeder::class);
        // $this->call(FlatsServicesTableSeeder::class);
        $this->call(FlatsSponsorsTableSeeder::class);
    }
}
