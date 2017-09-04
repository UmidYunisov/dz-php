<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\Register;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RegisterController
{
	public function index()
	{
		$view = new View();
		echo $view->generate('reg.php', array('title'=>'Регистрация'));
	}
	public function reg()
	{
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
		  $res = User::where('login','=',$data['login'])->count();
		  
		  if($res !== 0)
		  {
		    $errors[] = 'Пользователь с таким логином уже существует!';
		  }
		  if(trim($data['name']) === '')
		  {
		    $errors[] = 'Введите имя!';
		  }

		  if(empty($errors))
		  {
		  	$remoteIp = $_SERVER['REMOTE_ADDR'];
			$gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
			$recaptcha = new \ReCaptcha\ReCaptcha("6Ld0Uy8UAAAAAGRhfm55LN41j4P6JjGmqcjeK1xD");
			$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
			if ($resp->isSuccess()) 
			{
			    $photoname = 'templates/img/'.$_FILES['photo']['name'];
			    copy($_FILES['photo']['tmp_name'], $photoname);
			    Register::add_user($data['login'],$data['pass1'],$data['name'],$data['born'],$data['descr'],$photoname);
			    $this->sendmail($data['login'],$data['name'],$data['email']);
			    $success = true;
			} 
			else
			{
			   $errors[] = "Ошибка в рекапче";
			}
		  }
		
		$view = new View();
		echo $view->generate('reg.php', array('title'=>'Регистрация','errors'=>array_shift($errors),'data'=>$data, 'success'=>$success));
		}
		
	}

	public function sendmail($login,$name,$email)
	{
		$mail = new PHPMailer(true);
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'test.loft2017@yandex.ru';                 // SMTP username
		    $mail->Password = 'proger2017';                           // SMTP password
		    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption
		    $mail->Port = 465;                                    // TCP port to connect to
		    $mail->CharSet = 'UTF-8';
		    //Recipients
		    $mail->setFrom('test.loft2017@yandex.ru', 'Mailer');
		    $mail->addAddress($email, $name);     // Add a recipient\

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Спасибо за регистрацию на нашем сайте';
		    $mail->Body    = "Спасибо за регистрацию на нашем сайте. Ваш логин: $login</b>";

		    $mail->send();
		} catch (Exception $e) {
		    echo 'Невозможно отправить почта.';
		    echo 'Ошибка: ' . $mail->ErrorInfo;
		}
	}
}