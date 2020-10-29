 <html>
 <!--  
 Realizar el  programa guardarimagenes.php  que muestre un formulario web que permita el envío de uno o dos ficheros de imágenes 
   que se guardarán en un directorio  llamado imgusers no accesible por web.  Crear el directorio y darle los permisos adecuados. 
   El programa  mostrará el formulario (GET) o lo procesará (POST)
   El programa PHP debe controlar:
   El tamaño máximo de los ficheros no puede superar los 200 Kbytes cada uno y entre los dos no mas de 300  Kbytes.
   Se puede enviar uno o dos ficheros simultáneamente.
   Los ficheros tienes que ser o JPG o PNG no se admiten otros formatos.
   La aplicación NO  debe permitir subir ficheros cuyo nombres ya exista en el directorio de imágenes. 
-->
<head>
<title> </title>
<meta charset="UTF-8">
</head>
<body>
<h2>Formulario para guardar imágenes</h2>
<form  enctype="multipart/form-data"  method="post">

<input type="hidden" name="directorio" /> 
<input type="hidden" name="capacidadMaxima" value="300000" /> 

<input name="archivo1" type="file" value="200000" /> 
<input name="archivo2" type="file" value="200000" /> 
<input type="submit" name="subir" value="Subir archivo" />

</form>
</body>
</html>

<?php

if (isset($_POST["subir"])) {
    $archivo1 = $_FILES["archivo1"]["name"];
    $archivo2 = $_FILES["archivo2"]["name"];
    $directorio="imgusers/"; 
    
    if(!file_exists($directorio)) {
       mkdir($directorio,775);
    }  
    
       if (isset($archivo1) && $archivo1 != "" || isset($archivo2) && $archivo2 != "") {
        $tipo1 = $_FILES["archivo1"]["type"];
        $tamano1 = $_FILES["archivo1"]["size"];
        $ruta1 = $_FILES["archivo1"]["tmp_name"];
        $tipo2 = $_FILES["archivo2"]["type"];
        $tamano2 = $_FILES["archivo2"]["size"];
        $ruta2 = $_FILES["archivo2"]["tmp_name"];
        
        if (!((strpos($tipo1, "jpg") || strpos($tipo1, "jpeg")|| strpos($tipo1, "png")) && ($tamano1 < 200000) && ($tamano1+$tamano2<300000)
            || (strpos($tipo2, "jpg") || strpos($tipo2, "jpeg")|| strpos($tipo2, "png")) && ($tamano2 < 200000) && ($tamano1+$tamano2<300000))) 
        {
            echo "<div><b>Error: La extensión o el tamaño de los archivos no es correcta.<br/>";
        }
        else {
           
            if (move_uploaded_file($ruta1,$directorio.$archivo1)) {
                echo "<div><b>Se ha subido correctamente la imagen.</b></div>";
            }
            
            if (move_uploaded_file($ruta2,$directorio.$archivo2)) {
                echo "<div><b>Se ha subido correctamente la imagen.</b></div>";
            } 
        } 
    }
}
?>
