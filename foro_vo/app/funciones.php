<?php
function usuarioOk($usuario, $contraseña) :bool {
    return strlen($usuario)>=8 && $contraseña==strrev($usuario); 
}

function LetraMasRepetida($comentario) {
    $longitud=strlen($comentario);
    $letraRepe=""; 
    $repes=0;
    
    for ($i=0;$i<$longitud;$i++) {
        $letra=$comentario[$i];
        $repe=1;
        for ($j=1;$j<$longitud;$j++) {
            if ($letra==$comentario[$j]) {
                $repe++;
            }
        }
        
        if ($repes<$repe) {
            $letraRepe=$letra;
            $repes=$repe;
        }
    }
    return $letraRepe;
}

function PalabraMasRepetida($comentario) {
    $palabras=str_word_count($comentario,1);
    $repes=array_count_values($palabras);
    asort($repes);
    $palabraRepe=array_key_last($repes);
    return $palabraRepe; 
} 
?>