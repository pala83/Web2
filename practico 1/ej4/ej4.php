<a href="index.html"><-volver atras</a>
<?php
    $arreglo = [];
    for($i=0; $i<200; $i++){
        //rand(int $min, int $max): int
        $arreglo[$i] = rand();
    }
    //print_r($arreglo);
    
    $cantidad = 200;
    if(!empty($_REQUEST)){
        $cantidad = $_REQUEST["cant"];
        echo("<h1>Mostrando los primeros ".$cantidad." elementos</h1>");
    }
    else{
        echo("<h1>Mostrando todos los elementos</h1>");
    }

    echo("<ul>");
    for($j=0; $j<$cantidad; $j++){
        echo("<li>".$arreglo[$j]."</li>");
    }
    echo("</ul>");
?>
