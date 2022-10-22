<?php

function sumar($a, $b) {
    return $a + $b;
}

function restar($a, $b) {
    return $a - $b;
}

function multiplicar($a, $b) {
    return $a * $b;
}

function dividir($a, $b) {
    if($b == 0){
        return "infinito!";
    }
    else{
        return $a / $b;
    }
}

?>