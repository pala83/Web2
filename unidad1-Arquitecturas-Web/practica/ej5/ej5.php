<h1>Resultados</h1>

<?php
    $peso = $_REQUEST['peso'];
    $altura = $_REQUEST['altura'];
    $resultado = $peso/pow($altura, 2);
    echo("<p>IMC = ".$resultado."</p>");
    echo("<strong>Comentario:</strong>");
    switch($resultado){
        case($resultado<18.5):{
            echo("<p>Su peso esta muy bajo, te falta sopa</p>");
            break;
        }
        case($resultado>18.5 && $resultado<24.99):{
            echo("<p>Estas demaciado sano, tenes que empezar a fumar</p>");
            break;
        }
        case($resultado>=25 && $resultado<30):{
            echo("<p>Tenes unos kilos de mas, deja de comprar pan</p>");
            break;
        }
        case($resultado>=30):{
            echo("<p>Estas re gordo, ponete a dar unas vueltas al dique corriendo</p>");
            break;
        }
        default:{
            echo("<p>Este mensaje no deberia salir, estas intentando romper mi codigo</p>");
            break;
        }
    }
?>
<p>Nota: El IMC por sí solo no es una herramienta de diagnóstico. Si tenés dudas, consultá a un médico.</p>
<a href="index.html"><-volver atras</a>