<?php

function getDeudas(){
    $db = new PDO('mysql:host=localhost;dbname=deudas;charset=utf8', 'root', '');
    $query = $db->prepare("SELECT * FROM pagos");
    $query->execute();
    $pagos = $query->fetchAll(PDO::FETCH_OBJ);
    return $pagos;
}

function ingresarPago($nombre, $id,  $monto, $fecha){
    $db = new PDO('mysql:host=localhost;dbname=deudas;charset=utf8', 'root', '');
    $query = $db->prepare("INSERT INTO tarea(titulo) VALUES(?)");
    $sentencia = $db->prepare('INSERT INTO pagos(deudor, id_cuota, monto_cuota, fecha_pago) VALUES :deudor, :id_cuota, :monto_cuota, :fecha_pago)');
    $sentencia->execute([":titulo"=>$tarea['titulo'], ":descripcion"=>$tarea['descripcion']]);
}

?>