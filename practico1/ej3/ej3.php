<?php
    if(!empty($_POST)){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        echo("Nombre:".$nombre);
        echo("<br>");
        echo("Apellido:".$apellido);
        echo("<br>");
        echo("Edad:".$edad);
        echo("<br>");
    }
?>

<a href="index.html"><-volver atras</a>