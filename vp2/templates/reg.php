{% extends 'template.php' %}

{% block content %}

<div class="form-container">
{% if success %}
<div class="alert alert-success">
  <strong>Вы успешно зарегистрированы!</strong> <a href='{{ DIR }}/'>Авторизируйтесь</a>
</div>
{% else %}
        <form class="form-horizontal" method="post" action="{{ DIR }}/register/reg" enctype="multipart/form-data">
        <h2>Регистрация</h2>
        {% if errors %}
        <div class="alert alert-danger">
        {{ errors }}
        </div>
        {% endif %}
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="{{ data.login }}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" name="pass1" class="form-control" id="inputPassword3" placeholder="{{ data.pass1 }}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
            <div class="col-sm-10">
              <input type="password" name="pass2" class="form-control" id="inputPassword4" placeholder="{{ data.pass2 }}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="inputText1" placeholder="{{ data.name }}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Дата рождения</label>
            <div class="col-sm-10">
              <input type="date" name="born" class="form-control" id="inputDate" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Описания</label>
            <div class="col-sm-10">
              <input type="text" name="descr" class="form-control" id="inputText2" placeholder="{{ data.descr }}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Фото</label>
            <div class="col-sm-10">
              <input type="file" name="photo" multiple accept="image/*,image/jpeg">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" class="btn btn-default">Зарегистрироваться</button>
              <br><br>
              Зарегистрированы? <a href="{{ DIR }}/user">Авторизируйтесь</a>
            </div>
          </div>
        </form>
{% endif %}
      </div>
{% endblock %}