<?php
$log=strtoupper(trim($_POST['login']));
$pw=trim($_POST['pass']);
if (!($fp = fopen("db_users.txt", "a+"))){
    echo "error";
    exit();
}
$user_is_correct=false;
while (!feof($fp)) {
    $account = fgets($fp);
    $account = explode(",", $account);
    $account[0] = strtoupper(trim($account[0]));
    $account[1] = trim($account[1]);
    if ($account[0] == $log){
        echo "Логин занят. Введите другой";
        echo "<br><input type=\"button\" value=\"На главную страницу\" onclick=\"location.href='main.php'\">";
        exit();
    }
}
fwrite($fp, "\n".$log.",".$pw);
fclose($fp);
echo "<h1>Регистрация прошла успешно</h1>";
echo "<br><input type=\"button\" value=\"На главную страницу\" onclick=\"location.href='main.php'\">";
?>