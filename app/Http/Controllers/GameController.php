<?php

namespace App\Http\Controllers;

use App\Money;
use App\Prize;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function start(){
        $money = Money::where('name', 'main')->first();
        $random = rand ($money->value > 0 ? 1 : 2, 3);
        switch ($random) {
            case 1:
                $prize['type'] = 'money';
                $prize['prize'] = rand(1000, 3000);
                if ($prize['prize'] > $money->value) {
                    $prize['prize'] = $money->value;
                    $money->value = 0;
                    $money->save();
                } else {
                    $money->value = $money->value - $prize['prize'];
                    $money->save();
                }
                break;
            case 2:
                $prize['type'] = 'game_money';
                $prize['prize'] = rand(1000, 10000);
                $user = User::find(Auth::user()->id);
                $user->game_money = $user->game_money + $prize['prize'];
                $user->save();
                break;
            case 3:
                $prize['type'] = 'subject';
                $prize['prize'] = Prize::where('active', true)->get();
                if (count($prize['prize']) != 0) {
                    $prize['prize'] = $prize['prize'][rand(0, count($prize['prize']) - 1)];
                } else {
                    $this->start();
                }
                break;
        }
        return view('game', compact('prize'));
    }

    public function soldItem($price) {
        $user = User::find(Auth::user()->id);
        $user->game_money = $user->game_money + $price;
        $user->save();
        return redirect(route('game'));
    }

    public function convert($money) {
        $user = User::find(Auth::user()->id);
        $user->game_money = $user->game_money + $money * 2;
        $user->save();
        return redirect(route('game'));
    }

    public function get($money) {
        $user = User::find(Auth::user()->id);
        $user->money = $user->money + $money;
        $user->save();
        return redirect(route('game'));
    }
}
