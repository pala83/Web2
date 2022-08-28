<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css">
  <title>Ejercicio 11</title>
</head>
<body>
  <div class="contenedor">
    <h1>Pagina creada con AJAX</h1>
    <ul>
      <?php require_once 'db_opciones.php';
      // A cada <a> se le agrega un id
      foreach ($opciones as $key => $opcion) {
        ?><li><a class="opcion" data-cant="<?php echo $opcion->cantidad ?>" id="opcion<?php echo ($key+1) ?>"><?php echo $opcion->texto?></a></li>  
      <?php
      }
      ?>
    </ul>
  </div>
  <div id="contenedorElementos">

  </div>
  <script src="./script.js"></script>
</body>
</html>