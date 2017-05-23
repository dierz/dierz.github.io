<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css">
<title>Личная страница</title>
<style>
.main_bar span{
font-size:22px;
font-family:Verdana
}
.vk{
position:absolute;
left:5%;
top:360;
}
.twitter{
position:absolute;
left:30%;
top:360;
}
.facebook{
position:absolute;
left:55%;
top:360;
}
.github{
position:absolute;
left:80%;
top:360;
}
.main_bar {
text-align:center;
font-size:22;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
</head>
<body>
<div class="top_bar">
	<div class="title"> 
	
		<a href="../index.html">            
		Личная страница Кириченко Е.Н.</a>
	</div>
	<div class="title">
	<img src="../home.png">
	<a href="../index.html">                                 </a>
	</div>
	
</div>
<div class="left_bar">
	<div class="menu">
	<a href="../hobby.html">
		<div class="menu_item" id="hobby">
		Мои увлечения</div>
		</a>
		<a href="../animals.html">
		<div class="menu_item" id="animal">
		Любимые животные</div>
		</a>
		<a href="../aims.html">
		<div class="menu_item" id="aims">
		Мои цели</div>
		</a>
		<a href="../main.php">
		<div class="menu_item" id="windows">
		Windows interface</div>
		</a>
	</div>
</div>
<div class="right_bar">
<br><br><br>
<i>Цитата дня:
<br>
Ложь, повторенная тысячу раз, становится правдой. <br>                               - Й.Геббельс</i>
<br><br>
<a href="login.php">
<div class="login">
LOG IN
</div>
</a>
<a href="signup.php">
<div class="signup">
SIGN UP
</div>
</a>
</div>
<div class="main_bar">
<?php
    include_once("bd.php");
	require_once "SendMailSmtpClass.php";
    if (isset($_POST['submit'])){
		if(empty($_POST['login']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите логин!"> Введите логин! </font><br><a href="comm.php">Форма логина</a>';
		} 
		elseif (!preg_match("/^\w{3,}$/", $_POST['login'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="В поле "Логин" введены недопустимые символы!"> В поле "Логин" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font><br><a href="comm.php">Форма логина</a>';
		}
		elseif(empty($_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите пароль !"> Введите пароль!</font><br><a href="comm.php">Форма логина</a>';
		}
		elseif (!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Пароль слишком короткий!"> Пароль слишком короткий! Пароль должен быть не менее 6 символов! </font><br><a href="comm.php">Форма логина</a>';
		}
		elseif(empty($_POST['password2'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите подтверждение пароля!"> Введите подтверждение пароля!</font><br><a href="comm.php">Форма логина</a>';
		}
		elseif($_POST['password'] != $_POST['password2']) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введенные пароли не совпадают!"> Введенные пароли не совпадают!</font><br><a href="comm.php">Форма логина</a>';
		}
		elseif(empty($_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите E-mail!">Введите E-mail! </font><br><a href="comm.php">Форма логина</a>';
		}
		elseif (!preg_match("/^[a-z\d]{1,}\.{0,1}[a-z\d]{1,}@[a-z\d]{2,}\.{1}/i", $_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="E-mail имеет недопустимий формат!"> E-mail имеет недопустимий формат! Например, name@gmail.com! </font><br><a href="comm.php">Форма логина</a>';
		}
		 
		else{
			$comm = $_POST['login'];
			$password = $_POST['password'];
			$mdPassword = md5($password);
			$password2 = $_POST['password2'];
			$email = $_POST['email'];
			$rdate = date("d-m-Y в H:i");  
			  
			$query = ("SELECT id FROM users WHERE login='$comm'");
			$sql = mysql_query($query) or die(mysql_error());
			
			if (mysql_num_rows($sql) > 0) {
				echo '<font color="red"><img border="0" src="error.gif" align="middle" alt="Пользователь с таким логином зарегистрированый!"> Пользователь с таким логином зарегистрирован!</font><br><a href="comm.php">Форма логина</a>';
			}
			else {
				$query2 = ("SELECT id FROM users WHERE email='$email'");
				$sql = mysql_query($query2) or die(mysql_error());
				if (mysql_num_rows($sql) > 0){
					echo '<font color="red"><img border="0" src="error.gif"  alt="Пользователь с таким e-mail зарегистрированый!"> Пользователь с таким e-mail уже зарегистрирован!</font><br><a href="comm.php">Форма логина</a>';

				}
				else{
					$query = "INSERT INTO users (login, password, email, reg_date)
							  VALUES ('$comm', '$mdPassword', '$email', '$rdate')";
					$result = mysql_query($query) or die(mysql_error());;
					echo '<font color="green"><img border="0" src="ok.gif" align="middle" alt="Вы успешно зарегистрировались!"> Вы успешно зарегистрировались!</font><br><a href="comm.php">Форма логина</a>';
					
					$activ = mysql_query ("SELECT id FROM users WHERE login='$comm'");
					$id_activ = mysql_fetch_array($activ);
					$activation = md5($id_activ['id']);

					$subject = "Подтверждение регистрации";
					$message = "Здравствуйте! Спасибо за регистрацию на сайте \nВаш логин: ".$comm."\n";
							
$mailSMTP = new SendMailSmtpClass('malkovicderek@gmail.com', 'idead0905', 'ssl://smtp.gmail.com', 'malkovicderek@gmail.com', 465);
  
// заголовок письма
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 	// кодировка письма
$headers .= "Подтверждение регистрации. \r\n";   			// от кого письмо
$result =  $mailSMTP->send($email, 'Send', $message, $headers); // отправляем письмо
if($result === true)
{
    echo "Письмо успешно отправлено";
}
else
{
    echo "Ошибка отправки: " . $result;
}


				}
			}
		}
    }
?>
</div>
<footer>
© Кириченко Евгений КИ-142 idead09@gmail.com
</footer>
</body>
</html>