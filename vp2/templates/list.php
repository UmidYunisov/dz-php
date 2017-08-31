{% extends 'template.php' %}

{% block content %}
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
      <h2>Информация выводится из базы данных</h2>
      <table class="table table-bordered">
        <tr>
          <th>Пользователь(логин)</th>
          <th>Имя</th>
          <th>возраст</th>
          <th>описание</th>
          <th>Фотография</th>
          <th>Действия</th>
        </tr>
        {% for item in list %}
        <tr>
          <td>{{ item.login }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.age }}{% if item.age > 18 %}  <p>Совершеннолетний</p>  {% else %}  <p>Несовершеннолетний</p> {% endif %}</td>
          <td>{{ item.description }}</td>
          <td><img src="/{{ item.photo }}" width="100px" alt=""></td>
          <td>
            <a href="{{ DIR }}list/delete/{{ item.id }}">Удалить пользователя</a>
          </td>
        </tr>
        {% endfor %}
      </table>
{% endblock %}