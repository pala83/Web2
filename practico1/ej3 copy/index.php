<?php
    print_r($_GET);
    if(!empty($_GET)){
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $edad = $_GET['edad'];
        echo("Nombre:".$nombre);
        echo("<br>");
        echo("Apellido:".$apellido);
        echo("<br>");
        echo("Edad:".$edad);
        echo("<br>");
    }
?>

<a href="ej3.html"><-volver atras</a>