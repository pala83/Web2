<?php
    require_once("operaciones.php");

    function showOperacion($numero1, $numero2, $op){
        if(isset($numero1) && isset($numero2) && isset($op)){
            // Si se cumple esta condición, el usuario nos pasó la info
                
            switch ($op) {
                case 'sumar':
                    $resultado = sumar($numero1, $numero2);
                    $simbolo = "+";
                    break;
                case 'dividir':
                    $resultado = dividir($numero1, $numero2);
                    $simbolo = "/";
                    break;
                case 'restar':
                    $resultado = restar($numero1, $numero2);
                    $simbolo = "-";
                    break;

                default:
                    $resultado = "Operación invalida?";
                    $simbolo = "??";
                    break;
            }
            
            echo '<span>' . $resultado . '</span>';       
        }

    }

?>