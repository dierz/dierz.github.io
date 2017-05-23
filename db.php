<?php
$login=$_POST["log"]; 
$pass=$_POST["password"]; 
$db=mysqli_connect("localhost", "root", "12345","test"); 
$add="INSERT INTO login (name, password) VALUES ('%s','%s')";
$query=sprintf($add, mysqli_real_escape_string($db,$login), mysqli_real_escape_string($db,$pass));
$result=mysqli_query($db,$query);
if($result){
	echo "Record succesfully added to DB!";
}
else {
	echo "ERROR!";
}






?>