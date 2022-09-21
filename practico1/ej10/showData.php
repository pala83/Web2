<?php
  if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['edad'])){
    echo "Usted se llama {$_POST['nombre']} {$_POST['apellido']} y tiene {$_POST['edad']} años";
  }
  else
  {
    echo "Error al cargar sus datos";
  }
?>