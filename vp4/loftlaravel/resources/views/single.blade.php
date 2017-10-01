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
                            <th>Продукт</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>{{$good->id}}</td>
                            <td>{{$good->name}}</td>
                            <td><img width="200px" src="/uploads/{{$good->photo}}"></td>
                            <td>
                                <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Купить</button>
                            </td>
                        </tr>
                    </table>                  
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title">Заказать</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="formx" action="javascript:void(null);" onsubmit="call()">
                    {{ csrf_field() }}
                    <label for="name">Продукт:</label><input id="name" name="name" value="{{$good->name}}" type="text">
                    <label for="email">Email:</label><input id="email" name="email" value="{{$email}}" type="text">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" language="javascript">
    function call() {
      var msg   = $('#formx').serialize();
        $.ajax({
          type: 'POST',
          url: '/order',
          data: msg,
        }).done(function() {
            alert("Спасибо за заявку!");
            setTimeout(function() {
                $('#myModal').modal('hide');
            }, 1000);
        });

    }
</script>