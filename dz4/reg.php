<?php
require_once 'config.php';
session_start();
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass, $opt);

$data = $_POST;
if(isset($data['submit']))
{
  $errors = array();

  if(trim($data['login']) === '')
  {
    $errors[] = 'Введите логин!';
  }
  if(trim($data['pass1']) === '')
  {
    $errors[] = 'Введите пароль!';
  }
  if(trim($data['pass2']) === '')
  {
    $errors[] = 'Введите повторный пароль!';
  }
  if($data['pass1'] != $data['pass2'])
  {
    $errors[] = 'Повторный пароль введен не верно!';
  }
  if(isset($_FILES['photo']))
  {
    if($_FILES['photo']['name'] == '')
    {
      $errors[] = 'Вы не выбрали файл.';
    }
    $getMime = explode('.', $_FILES['photo']['name']);
    $mime = strtolower(end($getMime));
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    if(!in_array($mime, $types))
    {
      $errors[] = 'Недопустимый тип файла.';
    }
  }

  $stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE login = ?');
  $res = $stmt->execute(array($data['login']));
  if($res == 0)
  {
    $errors[] = 'Пользователь с таким логином уже существует!';
  }
  if(trim($data['name']) === '')
  {
    $errors[] = 'Введите имя!';
  }

  if(empty($errors))
  {
    $p_name = 'Временный запис';
    $stmt = $pdo->prepare('INSERT INTO users (login,password,name,age,description,photo) VALUES (?,?,?,?,?,?)');
    $stmt->bindParam(1, $data['login']);
    $stmt->bindParam(2, password_hash($data['pass1'], PASSWORD_DEFAULT));
    $stmt->bindParam(3, $data['name']);
    $stmt->bindParam(4, $data['born']);
    $stmt->bindParam(5, htmlspecialchars($data['descr']));
    $stmt->bindParam(6, $p_name);
    $stmt->execute();
    $id = $pdo->lastInsertId();
    $last_photoname = 'img/'.$id.'.'.$mime;
    copy($_FILES['photo']['tmp_name'], $last_photoname);
    $stmt = $pdo->prepare("UPDATE users SET photo=:lastid WHERE id=:id");
    $stmt->bindParam(':lastid', $last_photoname);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "Вы успешно зарегистрированы! <a href='index.php'>Авторизируйтесь</a>";
  }
  else
  {
    echo "<p>".array_shift($errors)."</p";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          <?php if(!$_SESSION['logged_user']): ?>
            <li class="active"><a href="index.php">Авторизация</a></li>
            <li><a href="reg.php">Регистрация</a></li>
          <?php else: ?>
            <li><a href="list.php">Список пользователей</a></li>
            <li><a href="filelist.php">Список файлов</a></li>
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="form-container">
        <form class="form-horizontal" method="post" action="reg.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Логин">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" name="pass1" class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
            <div class="col-sm-10">
              <input type="password" name="pass2" class="form-control" id="inputPassword4" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="inputText1" placeholder="Имя">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Дата рождения</label>
            <div class="col-sm-10">
              <input type="date" name="born" class="form-control" id="inputDate" placeholder="ГГГГ-ММ-ДД">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Описания</label>
            <div class="col-sm-10">
              <input type="text" name="descr" class="form-control" id="inputText2" placeholder="О себе">
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
              Зарегистрированы? <a href="index.php">Авторизируйтесь</a>
            </div>
          </div>
        </form>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
