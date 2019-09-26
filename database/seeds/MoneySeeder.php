<?php

use Illuminate\Database\Seeder;

class MoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $money = new \App\Money();
        $money->name = 'main';
        $money->value = 100000;
        $money->save();
    }
}
