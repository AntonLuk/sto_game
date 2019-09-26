@extends('layouts.master')
@section('content')
    <h3>Ваш приз</h3>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="card">
                    <img class="card-img-top" src="{{Storage::url("prizes/" . $prize->image_path)}}">
                    <div class="card-body">
                        <h5>{{$prize->type->name}}</h5>
                        <h7>{{$prize->name}}</h7>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="post" action="{{route('post.send')}}">
        @csrf
        <input type="hidden" name="prize_id" value="{{$prize->id}}">
        <div class="form-group">
            <label for="">Адрес</label>
            <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Введите адрес"  value= {{Auth::user()->address}} >
        </div>

        <div class="form-group">
            <label>Индекс</label>
            <input type="number" name="index" class="form-control"  placeholder="Почтовый индекс" value= {{Auth::user()->index}}>
        </div>

        <div class="form-group">
            <label for="">ФИО</label>
            <input type="text" name="fio" class="form-control" placeholder="Введите ФИО" value= {{Auth::user()->fio}}>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    @endsection