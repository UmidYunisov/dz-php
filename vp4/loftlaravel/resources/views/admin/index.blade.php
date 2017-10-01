@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Goods</div>
                <div class="panel-body"><a href="/admin/create"><button>Создать</button></a></div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th>CONTROLS</th>
                        </tr>
                        @foreach($goods as $good)
                        <tr>
                            <td>{{$good->id}}</td>
                            <td>{{$good->name}}</td>
                            <td>{{$good->price}}</td>
                            <td>
                                <a href="/admin/show/{{$good->id}}"><button>Посмотреть</button></a>
                                <a href="/admin/edit/{{$good->id}}"><button>Редактировать</button></a>
                                <a href="/admin/destroy/{{$good->id}}"><button>Удалить</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection