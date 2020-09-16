<?php

$dir_path = "resultados/";
$extensions_array = array('png');

if(is_dir($dir_path))
{
    $files = scandir($dir_path);
    
    for($i = 0; $i < count($files); $i++)
    {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            // get file name
            
            
            // get file extension
            $file = pathinfo($files[$i]);
            $extension = $file['extension'];
            
            
           // check file extension
            if(in_array($extension, $extensions_array))
            {
            // show image
            echo "<div><img src='$dir_path$files[$i]' style='width:100px;height:100px;'></div><br><br><br><br>";

           

   

            }
        }
    }
}

?>




<html>


<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>


<style>
.panel {
  border: 1px solid white;
  box-sizing:border-box;
  padding: 0.5em;
  margin:0.5em 0;
}
	
hr {
  
  border:none;
  border-top:2px solid white;
}




pre {

overflow-y: hidden;
background-color: #111;

}



h1 {

font-size: 1em;
color: #3bfc34;

}

h2 {


color: #FFFFFF;

}




</style>



<body style="background-color: #111">

   
</body>


</html>

