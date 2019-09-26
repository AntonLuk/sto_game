@extends('layouts.master')
@section('content')
    <style>
        body {background: #d6eaf8}
        .game {
            text-decoration: none;
            outline: none;
            display: inline-block;
            color: white;
            padding: 20px 30px;
            margin: 30% 30%;
            border-radius: 10px;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
            background-image: linear-gradient(to right, #9EEFE1 0%, #4830F0 51%, #9EEFE1 100%);
            background-size: 200% auto;
            box-shadow: 0 0 20px rgba(0,0,0,.1);
            transition: .5s;
        }
        a:hover {background-position: right center;}
        .card {
            position: relative;
            background: #d6eaf8;
        }
        img {
            width: 100%;
            height: 300px;
            object-fit: contain;
            padding: 35px 0;
        }


        span {
            font-size: 12px;
            color: #232323;
            margin-left: 10px;
        }


        a.btn1 {
            font-size: 18px;
            font-weight: 700;
            color: #007bff;
            border: 4px solid #007bff;
            border-radius: 26px;
        }

    </style>
    <h5>Вы выиграли</h5>
    @if (!isset($prize))
        <a href={{route('game.start')}} class="game">Играть</a>
    @else
        @if ($prize['type'] == 'subject')
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="card">
                        <img class="card-img-top" src="{{Storage::url("prizes/" . $prize['prize']->image_path)}}">
                        <div class="card-body">
                            <h5>{{$prize['prize']->type->name}}</h5>
                            <h7>{{$prize['prize']->name}}</h7>
                            <div class="card-attrs">
                                <div class="attr justify-content-between align-items-end">
                                    <div class="attr-buy">
                                        <a href="{{route('post.postForm',['prize' => $prize['prize']])}}" class="btn btn-outline-light btn1">
                                            <i class="" aria-hidden="true"></i>
                                            Получить
                                        </a>
                                        <a href="{{route('game.soldItem', ['price' => $prize['prize']->game_price])}}" class="btn btn-outline-light btn1">
                                            <i class="" aria-hidden="true"></i>
                                            Отказаться (Конвертировать в игровую валюту {{$prize['prize']->game_price}})
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @else
        <div class="container">
            <h7>{{$prize['prize'] . " "}} @if ($prize['type'] == 'money')
                    рублей </h7>
                @else
                    игровой валюты </h7>
                    <a href={{route('game.start')}} class="game">Играть</a>
                @endif

            <br>
        </div> @if ($prize['type'] == 'money')
            <a href="{{route('game.getMoney',['money' => $prize['prize']])}}" class="btn btn-info">Зачислить ({{$prize['prize']}})</a>
            <a href="{{route('game.convert',['money' => $prize['prize']])}}" class="btn btn-success">Конвертировать в игровую валюту ({{$prize['prize'] * 2}})</a>
        @endif

            @endif
    @endif
    @endsection