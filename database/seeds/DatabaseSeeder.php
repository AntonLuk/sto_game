<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(EntrustTableSeeder::class);
         $this->call(PrizeTypesSeeder::class);
         $this->call(PrizeSeeder::class);
         $this->call(MoneySeeder::class);
    }
}
