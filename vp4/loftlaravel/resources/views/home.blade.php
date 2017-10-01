@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12">
            <div class="col-xs-3">
                @include('layouts.sidebar')
            </div>

            <div class="col-xs-9">
                <div class="row">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Продукты</th>
                            <th>Цена</th>
                            <th>Просмотр</th>
                        </tr>
                        @foreach($goods as $good)
                        <tr>
                            <td>{{$good->id}}</td>
                            <td>{{$good->name}}</td>
                            <td>{{$good->price}}</td>
                            <td>
                                <a href="/show/{{$good->id}}"><button class="btn btn-info">Показать</button></a>
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
