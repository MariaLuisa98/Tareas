<?php
session_start();

if ( !isset($_SESSION["dineroinicial"] )) {
    
    if (isset($_REQUEST["dinero"])) {
        if ($_REQUEST["dinero"]>0) {
            $_SESSION["dineroinicial"]=$_REQUEST["dinero"];
            $veces=($_COOKIE["visitas"])+1;
            setcookie("visitas",$veces,time()+60*60*24*30);
            header('Location: minicasino.php');
        } else {
            echo "<h1>No has introducido ninguna cantidad.</h1>";
            header("refresh:3");
        }
        
    } else {
        echo "<form method='POST'>";
        echo "<h1>BIENVENIDO AL MINICASINO</h1>";
        echo "<h2>Esta es su $_COOKIE[visitas]º visita</h2>";
        echo "Introduzca el dinero con el que va a jugar: <input type='number' name='dinero'><br></form>";
    }
    
} else {
    $veces= ($_COOKIE["visitas"])+1;
    setcookie("visitas",$veces,time()+60*60*24*30);
    header('Location: minicasino.php');
}

if (!isset($_COOKIE["visitas"])) {
    $veces=1;
    setcookie("visitas",$veces,time()+60*60*24*30);
}

?>
