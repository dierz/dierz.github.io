<html>
<head>
    <meta charset="utf8">
    <style type="text/css">
        .login{
            background-color: antiquewhite;
            border-radius: 2px;
            position: absolute;
            height: 160px;
            width: 250px;
            top: 40%;
            left: 40%;
            border: solid 2px black;
            box-shadow: 0px 0px 10px #777;
        }
    </style>
</head>
<body bgcolor="#f0ffff">
<div class="login">
<form action="login.php" method="post">
    <h3> Авторизация</h3>
    <p> Логин:<input type="text" name="login"></p>
    <p> Пароль:<input type="password" name="pass"></p>
    <p> <input type="submit" value="Войти">   
        <input type="button" value="Регистрация" onclick="location.href='regg.html'">
    </p>
</form>
</div>
</body>
</html>
