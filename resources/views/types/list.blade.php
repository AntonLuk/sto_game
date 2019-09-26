@extends('layouts.master')
@section('content')
    <h2>Типы призов</h2>
    @if(count($list)!=0)
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Наименование</th>
                </tr>
                </thead>
                <tbody>


                    @foreach($list as $l)
                        <tr>
                            <td>{{$l->id}}</td>
                            <td>{{$l->name}}</td>
                            <td>{{$l->created_at}}</td>
                            <td>
                                <input type="button" class="btn btn-info"
                                           value="Показать"
                                           onclick='location.href = "{{route('types.editForm',['id'=>$l->id])}}";'>
                            </td>
                            <td>
                                <input type="button" class="btn btn-danger"
                                           value="Удалить"
                                           onclick='if(confirm("Вы действительно хотите удалить ?")) {
                                                   location.href ="{{route('types.destroy',['id'=>$l->id])}}";}'>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{$clients->links()}}
        </div>
    @else
        <div class="text-center">
            <div class="container">
                <div class="form-group">
                    <h4>Нет данных</h4>
                    <a href="{{route('types.addForm')}}" class="btn btn-success">Добавить</a>
                </div>
            </div>
        </div>
    @endif
@endsection