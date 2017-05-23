<?php
$log=strtoupper(trim($_POST['login']));
$pw=trim($_POST['pass']);
if (!($fp = fopen("db_users.txt", "r"))){
    echo "error";
    exit();
}
$user_is_correct=false;
while (!feof($fp)) {     
    $account = fgets($fp);  
    $account = explode(",", $account);
    $account[0] = strtoupper(trim($account[0]));
    $account[1] = trim($account[1]);
    if ($account[0] == $log && $account[1] == $pw){
        $user_is_correct = true;
        break;
    }
}
if ($user_is_correct) {
    header("Location: windows.html");
} else {
    header("Location: wrong.html");
}
fclose($fp);
?>
