@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Новый товар</div>
                <div class="panel-body">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </div>
                <div class="panel-body">
                    <form action="/admin/store" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <table class="table">
                           <tr>
                               <td>Названия товара</td>
                               <td><input type="text" name="name"></td>
                           </tr>
                           <tr>
                               <td>Категория</td>
                               <td>
                                  <select name="cat">
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                  </select>
                               </td>
                           </tr>
                           <tr>
                               <td>Цена</td>
                               <td><input type="text" name="price"></td>
                           </tr>
                           <tr>
                               <td>Описание</td>
                               <td><textarea name="description"></textarea></td>
                           </tr>
                           <tr>
                             <td>Фото</td>
                             <td><input type="file" name="image"></td>
                           </tr>
                           <tr>
                               <td></td>
                               <td><input type="submit" name="create" value="Создать"></td>
                           </tr>
                           <tr>
                               <td></td>
                               <td></td>
                           </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection