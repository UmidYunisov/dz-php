@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Редактировать</div>
                <div class="panel-body">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </div>
                <div class="panel-body">
                    <form action="/admin/update/{{$good->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <table class="table">
                           <tr>
                               <td>Названия</td>
                               <td><input type="text" name="name" value="{{$good->name}}"></td>
                           </tr>
                           <tr>
                               <td>Категория</td>
                               <td>
                                <select name="cat">
                                  @foreach($cat as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                  </select>
                              </td>
                           </tr>
                           <tr>
                               <td>Цена</td>
                               <td><input type="text" name="price" value="{{$good->price}}"></td>
                           </tr>
                           <tr>
                               <td>Описания</td>
                               <td>
                                <p><textarea rows="10" cols="45" name="description">{{$good->description}}</textarea></p>
                              </td>
                           </tr>
                           <tr>
                               <td>Фото</td>
                               <td>
                                <p><img width="200px" src="/uploads/{{$good->photo}}"></p>
                                <input type="hidden" value="uploads/{{$good->photo}}" name="delete_file" />
                                <input type="file" name="image">
                              </td>
                           </tr>
                           <tr>
                               <td></td>
                               <td><input type="submit" name="update" value="Редактировать"></td>
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