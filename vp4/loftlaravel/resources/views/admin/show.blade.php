@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Goods</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th>PHOTO</th>
                            <th>CONTROLS</th>
                        </tr>
                        <tr>
                            <td>{{$good->id}}</td>
                            <td>{{$good->name}}</td>
                            <td>{{$good->price}}</td>
                            <td><img src="/uploads/{{$good->photo}}" width="200px"></td>
                            <td>
                                <a href="/admin/edit/{{$good->id}}"><button>Редактировать</button></a>
                                <a href="/admin/destroy/{{$good->id}}"><button>Удалить</button></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection