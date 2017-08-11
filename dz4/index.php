<?php
require_once 'config.php';
session_start();
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass, $opt);

$data = $_POST;
if(isset($data['submit']))
{
  $errors = array();
  $stmt = $pdo->prepare('SELECT * FROM users WHERE login = ?');
  $stmt->execute(array($data['login']));
  $user = $stmt->fetch(PDO::FETCH_OBJ);
  if($user)
  {
    if(password_verify($data['password'], $user->password))
    {
      $_SESSION['logged_user'] = $user;
      header('Location: list.php');
    }
    else
    {
      $errors[] = 'Не верно введен пароль!';
    }
  }
  else
  {
    $errors[] = 'Пользователь с таким логином не найден!';
  }
  if(!empty($errors))
  {
  echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
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
            <li><a href="logout.php">Выйти</a></li>
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="form-container">
        <form class="form-horizontal" action="index.php" method="post">
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
              Нет аккаунта? <a href="reg.php">Зарегистрируйтесь</a>
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
