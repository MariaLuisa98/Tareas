<!DOCTYPE html>
<html>
<body>
<?php
session_start(); 

if(isset($_REQUEST["abandonar"])) {
    echo "<h2>Muchas gracias por jugar con nosotros</h2>";
    echo "<h2>Su resultado final es de $_SESSION[dineroinicial] Euros</h2>";
    session_destroy();
    header("refresh:3"); 
} else {
    
if (!isset ($_SESSION["dineroinicial"])) { 
    header('Location: entrada.php');
} else {
$_SESSION["num"]=rand(1,100);

if(!isset($_REQUEST["apuesta"])) {
?>
<div> 
<form method="POST"> 
<p>Dispone de <?php echo $_SESSION["dineroinicial"]?> euros para jugar</p>
<p>Cantidad a apostar</p><input type="number" name="apuesta" min="0" max="<?php echo $_SESSION["dineroinicial"]?>">
<p>Tipo de apuesta: <input type="radio" name="ParImpar" value="Par"> Par
                    <input type="radio" name="ParImpar" value="Impar"> Impar
</p> <br> 
<input type="submit" name="apostar" value="Apostar cantidad">
<input type="submit" name="abandonar" value="Abandonar el Casino">
</form>
</div>

<?php
} else { echo "<h2>Tu apuesta: $_REQUEST[ParImpar]</h2>";
    
    if(resultado($_SESSION["num"],$_REQUEST["ParImpar"])) {
        $_SESSION["dineroinicial"]+=$_REQUEST["apuesta"]*2; 
        echo "<h2>¡Has ganado! <br><br> Ahora tienes $_SESSION[dineroinicial] Euros</h2><br>";
    } else {
        $_SESSION["dineroinicial"]-=$_REQUEST["apuesta"];
        echo "<h2>¡Has perdido! <br><br> Ahora tienes $_SESSION[dineroinicial] Euros</h2><br>";
        
        if ($_SESSION["dineroinicial"]==0) {
            echo "<h2>No tienes más dinero para apostar</h2>";
            session_destroy();  
        } 
        }
        
    header("refresh:3"); 
    
}
}
}
    
function resultado($num,$elegido) {
    if($num%2==0) {
        $resu="Par";
    } else {
        $resu="Impar";
    }
    return $resu==$elegido;
}

?>
</body>
</html>
