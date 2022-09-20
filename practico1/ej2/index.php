<h3>Ejercicio 1</h3>
<?php
    //array indexado sin claves
    $array = ["lista", "de", "html", "generada", "con", "PHP"];

    echo('<ul>');
    for($i=0; $i < sizeof($array); $i++){
        $cadena = "<li> $array[$i] </li>";
        echo($cadena);
    }

    echo('</ul>');
    //PHP no distingue entre arrays indexados o asociativos
    //La coma después del último elemento del array es opcional, pudiéndose omitir

    //supongo que es un array asociativo de claves mixtas
    $a = [
        "foo" => "bar",
        "bar" => "foo",
        100 => -100,
        -100 => 100,
    ];
    var_dump($a);
?>