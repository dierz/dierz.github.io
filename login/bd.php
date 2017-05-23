<?php
ini_set('display_errors','On');
error_reporting('E_ALL');
session_start();

mysql_connect ("localhost","root","12345");
mysql_select_db ("test");
mysql_query("SET NAMES utf8");

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$id_user = $_SESSION['id'];
?>();