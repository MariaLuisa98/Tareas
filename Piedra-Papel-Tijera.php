<html>
<style>
th,td { text-align:center; }
th { font-size:23; }
td { font-size:100; }
h1 { font-size:40; }
p { font-size:23; }
</style>

<?php
/* Hay dos jugadores que eligen al azar un valor (Piedra, Papel o Tijera).
   Utilizar los caracteres gráficos de  UTF-8.
   define ('PIEDRA1',"&#x1F91C;");
   define ('PIEDRA2',"&#x1F91B;");
   define ('TIJERAS',"&#x1F596;");
   define ('PAPEL',"&#x1F91A;" ); */

define ('PIEDRA1',"&#x1F91C;");
define ('PIEDRA2',"&#x1F91B;");
define ('TIJERAS',"&#x1F596;");
define ('PAPEL',"&#x1F91A;");

$jugador1=random_int(1,3);
$jugador2=random_int(1,3);

function ganador($jugador1,$jugador2) {
    
    if ($jugador1==$jugador2) {
        echo "¡Empate!";
    }
    if ($jugador1==1 & $jugador2==2) {
        echo "Ha ganado el jugador 1";
    }
    if ($jugador1==1 & $jugador2==3) {
        echo "Ha ganado el jugador 2";
    }
    if ($jugador1==2 & $jugador2==1) {
        echo "Ha ganado el jugador 2";
    }
    if ($jugador1==2 & $jugador2==3) {
        echo "Ha ganado el jugador 1";
    }
    if ($jugador1==3 & $jugador2==1) {
        echo "Ha ganado el jugador 1";
    }
    if ($jugador1==3 & $jugador2==2) {
        echo "Ha ganado el jugador 2";
    }
}
?>

<h1> ¡Piedra, papel, tijera! </h1>
<p> Actualice la página para mostrar otra partida. </p>

<table>

<tr>
<th> Jugador 1 </th>
<th> Jugador 2 </th>
</tr>

<tr>
<td> 
<?php 
if ($jugador1==1) {
    echo PIEDRA1;
}
if ($jugador1==2) {
    echo TIJERAS;
}
if ($jugador1==3) {
    echo PAPEL;
}
?> 
</td>
<td>
<?php 
if ($jugador2==1) {
    echo PIEDRA2;
}
if ($jugador2==2) {
    echo TIJERAS;
}
if ($jugador2==3) {
    echo PAPEL;
}
?>  
</td>
</tr>

<tr>
<th colspan="2"><?php echo ganador($jugador1,$jugador2); ?></th>
</tr>

</table>
</html>