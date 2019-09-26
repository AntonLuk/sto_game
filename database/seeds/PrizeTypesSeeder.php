<?php

use Illuminate\Database\Seeder;

class PrizeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new \App\PrizeType();
        $type->name = 'Гироскутер';
        $type->save();

        $type = new \App\PrizeType();
        $type->name = 'Экшн-камера';
        $type->save();

        $type = new \App\PrizeType();
        $type->name = 'Powerbank';
        $type->save();
    }
}
