<html>
	<head>
		<title>RGR</title>
		
		<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
		<link href="css/mainDiv.css" rel="stylesheet" type="text/css">
		<link href="css/buttonMenu.css" rel="stylesheet" type="text/css"> 
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/text.css" rel="stylesheet" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	
	<body>
		<div id="upBanner">
			<a href="index.html" id="backGT"></a>
			
			</div>
		</div>	
		</div>
		<div id="leftMenu" align="middle">
			<!--
				<a href="passions.html" id="knopka1">as</a>
				<img id="knopka1">
				src="images/knopka1.jpg" 
				onmouseover="this.src='images/knopka1_over.jpg';"
				onmouseout="this.src='images/knopka1.jpg';"
				onmousedown="this.src='images/knopka1_click.jpg';"
			-->

			<div id="knopka4" align="right">
				<a href="index.html" id="backGT"></a>
			</div>
		<div id="knopka2">
				<a href="index2.html" id="backGT"></a>
			</div>
			<div id="knopka3">
				<a href="index3.html" id="backGT"></a>
			</div>
			<div id="knopka1">
				<a href="index1.html" id="backGT"></a>
			</div>
		</div>
		<div id="mainBlock">
			<table width="99%" height="99%" border="2" vertical-align="top">
			<tr>
			<td>
			<div id="ggwp">
				<?php 
				error_reporting( E_ERROR );
include("bd.php");

if (isset($_GET['act']) AND isset($_GET['login'])) {
	$act = $_GET['act'];
	$act = stripslashes($act);
	$act = htmlspecialchars($act);
	
	$login = $_GET['login'];
	$login = stripslashes($login);
	$login = htmlspecialchars($login);
}
else{
	exit("Вы зашил на страницу без кода подтверждения!");
}


$activ = mysql_query("SELECT id FROM users WHERE login='$login'"); //извлекаем идентификатор пользователя с данным логином
$id_activ = mysql_fetch_array($activ); 

$activation = md5($id_activ['id']);

if ($activation == $act) {//сравниваем полученный из url и сгенерированный код
	mysql_query("UPDATE users SET activation='1' WHERE login='$login'");
	echo "Ваш аккуант <strong>".$login."</strong> успешно активирован! Теперь вы можете зайти на сайт под своим логином и паролем!<br><a href='index_for_com.html'>Форма логина</a>";
}
else {
	echo "Ошибка! Ваш аккуант не активирован. Обратитесь к админетратору.<br><a href='index_for_com.html'>Форма логина</a>";
}

?>	
</div>
</td>
</tr>
</table>		
		</div>
		<div id="rightNews">
			<iframe src="javaswiki.html" width="99%" height="99%"></iframe>
		</div>

		<div class="wrapper">


                

      <div class="blur"></div>
      <div class="inner-wrapper">
        <a 	href="index.html"> Main </a> <br>
        <a href="index2.html"> My_device </a>
        <a href="index3.html"> Animal </a>
		<a href="index1.html"> My_Hobbie </a>
			<br>
			2017 rgrone.com.ua All rights are protected 
			<br>
			Kononenko Sergey <a href="index_for_com.html"> Сomments</a>
      </div>
      <div id="knopka5">
		<a href="index.html"></a>
		</div>
    </div>
			
	</body>
