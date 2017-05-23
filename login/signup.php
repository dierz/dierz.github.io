
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
<br><br>
РЕГИСТРАЦИЯ<br><br>
<form action="do-reg.php" method="post">
Логин:                 <input type="text" size="20" name="login"><br><br>
E-mail:                <input type="text" size="20" name="email"><br><br>
Пароль:                <input type="password" size="20" name="password"><br><br>
Подтверждение пароля:  <input type="password" size="20" name="password2"><br><br>
<input type="submit" name="submit"><br><br>

</form>
</div>
<footer>
© Кириченко Евгений КИ-142 idead09@gmail.com
</footer>
</body>
</html>