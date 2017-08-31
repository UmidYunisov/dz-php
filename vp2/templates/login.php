    {% extends 'template.php' %}

    {% block content %}
      <div class="form-container">
        <form class="form-horizontal" action="{{ DIR }}/user/login" method="post">
        {% if errors %}
        <div class="alert alert-danger">
        {{ errors }}
        </div>
        {% endif %}
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Логин">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" class="btn btn-default">Войти</button>
              <br><br>
              Нет аккаунта? <a href="{{ DIR }}/register">Зарегистрируйтесь</a>
            </div>
          </div>
        </form>
      </div>
      {% endblock %}
