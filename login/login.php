<?php
require "db.php";
?>
<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>Дмитрий Яцочко</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="SHORTCUT ICON" href="../img/Man-Suit-2.png" type="image/gif">
        <style>
            body { overflow-y: scroll; }
            .text{
                font-family: Roboto, sans-serif;
                font-size: 16px;
                color: rgb(44, 62, 80);
                width: 525px;
                text-align: justify;
                margin: 0;
                padding: 10px;
                z-index: 99;
                position: absolute;
            }
            .img1{
                position: absolute;
                right: 0;
                top: 0;
                padding: 10px;
            }
            .img1 img{
                width: 220px;
            }
            .img2{
                position: absolute;
                right: 0;
                top: 200px;
                padding: 10px;
            }
            .img2 img{
                width: 760px;
            }
            .box{
                padding: 5px;
                height: 420px;
            }
            .form{
                width: 250px;
                margin-left: auto;
                margin-right: auto;
            }
            input{
                height: 25px;
                width: 250px;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
    <div class="top-nav-bar">
        <div class="site-name">
            <img src="../img/Books-2.png">                                                                              
                                                             <img src="../img/Lamp.png">
        </div>
        <div class="site-name">
            <a href="../index.php">Дом-страница Дмитрия Яцочко</a>
        </div>

    </div>
    <div class="container">
        <ul class="navbar">
            <li><a href="../work.php"><img src="../img/Desk.png"><span>Делаю</a></li>
            <li><a href="../device.php"><img src="../img/iPad-Space-Grey.png"><span>Использую</span></a></li>
            <li><a href="../music.php"><img src="../img/Apple-Headphones.png"><span>Слушаю</span></a></li>
            <li><a href="../watch.php"><img src="../img/Thunderbolt-Display.png"><span>Смотрю</span></a></li>
            <li><a href="../authgame.php"><img src="../img/ball.png"><span>Игра</span></a></li>
        </ul>
        <div class="content">
            <div class="box">
                <div class="form">
                    <?php
                    $data = $_POST;
                    if(isset($data['do_login'])){
                        $errors = array();
                        $user = R::findOne('users', 'login = ?', array($data['login']));
                        if($user){
                            if(md5($data['password']) == $user->password){
                                $_SESSION['logged_user'] = $user->login;
                                echo '<div style="color: green">Авторизация прошла успешно!</div>';
                            }else{
                                $errors[] = 'Неверно введен пароль!';
                            }
                        }else{
                            $errors[] = 'Пользователя с таким логином не существует!';
                        }
                        if(!empty($errors)){
                            echo '<div style="color: red">'.array_shift($errors).'</div>';
                        }
                    }
                    ?>
                    <form action="login.php" method="post">
                        <p>
                        <p><strong>Логин</strong></p>
                        <input type="text" name="login">
                        </p>
                        <p>
                        <p><strong>Пароль</strong></p>
                        <input type="password" name="password">
                        </p>
                        <p>
                            <button type="submit" name="do_login">Войти</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <ul class="socnav">
            <?php
            if(isset($_SESSION['logged_user'])){
                $username = $_SESSION['logged_user'];
                ?>
                <li><a href=""><img src="../img/Contact-Checked.png"><span><?=$username?></span></a></li>
                <li><a href="../login/logout.php"><img src="../img/Contact-Lock.png"><span>Выйти</span></a></li>
                <?php
            }else{
                ?>
                <li><a href="../login/login.php"><img src="../img/Contact-Unlock.png"><span>Войти</span></a></li>
                <li><a href="../login/signup.php"><img src="../img/Contact-Plus.png"><span>Регистрация</span></a></li>
                <?php
            }
            ?>
            <li><a href="https://vk.com/id120177544"><img src="../img/vk.png"><span>Вконтакте</span></a></li>
            <li><a href="https://www.instagram.com/d.yatsochko/"><img src="../img/Instagram.png"><span>Instagram</span></a></li>
            <li><a href="https://www.youtube.com/channel/UCkT_gStYq-cD5RJ89putceA"><img src="../img/YouTube.png"><span>YouTube</a></li>
        </ul>
    </div>
    <footer>
        © Дмитрий Яцочко 2017 e-mail:yatsochko@gmail.com
    </footer>
    </body>
</hmtl>