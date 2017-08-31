{% extends 'template.php' %}

{% block content %}
<h1>Запретная зона, доступ только авторизированному пользователю</h1>
      <h2>Информация выводится из списка файлов</h2>
      <table class="table table-bordered">
        <tr>
          <th>Название файла</th>
          <th>Фотография</th>
        </tr>
        {% for item in result %}
        <tr>
          <td>{{ item.id }}</td>
          <td><img src="{{ item.photo }}" width="100px" alt=""></td>
        </tr>
      {% endfor %}
      </table>
{% endblock %}