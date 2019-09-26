<?php

use Illuminate\Database\Seeder;

class PrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prize = new \App\Prize();
        $prize->name = 'skyboard 105';
        $prize->image_path = 'hiro.jpg';
        $prize->type_id = 1;
        $prize->game_price = 10000;
        $prize->save();

        $prize = new \App\Prize();
        $prize->name = 'GO PRO 4';
        $prize->image_path = 'gopro.jpg';
        $prize->type_id = 2;
        $prize->game_price = 13000;
        $prize->save();

        $prize = new \App\Prize();
        $prize->name = 'Xiaomi Mi Power Bank 2, 20000 mAh';
        $prize->image_path = 'power.jpg';
        $prize->type_id = 3;
        $prize->game_price = 3000;
        $prize->save();


    }
}
