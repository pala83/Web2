<?php

function fila($valor, $tam){
    $retorno = "";
    for($j=1; $j<=$tam; $j++){
        if($valor==$j){
            $retorno .= '<td class="resaltado">'.$valor*$j."</td>";
        }
        elseif($j==1 || $valor==1){
            $retorno .= '<td class="externo">'.$valor*$j."</td>";
        }
        else{
            $retorno .= '<td class="interno">'.$valor*$j."</td>";
        }
    }
    return $retorno;
}

function matriz($tamano){
    $retorno = "";
    for($i=1; $i<=$tamano; $i++){
        $retorno .= "<tr>" . fila($i, $tamano) . "</tr>" ;
    }
    return $retorno;
}

?>