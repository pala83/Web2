<?php
  $cantidad = $_GET['cant'];
  // Se crea un array de elementos con indices desde 1 hasta cant;
  $keys = range(0, ($cantidad-1), 1);
  $elementos = array_fill_keys($keys, "Elemento ");
  foreach($elementos as $key => $elemento){
    $elementos[$key].=$key+1;
  }
  /*
    - El json debe tener un (clave -> valor), es por eso que se crea el array asociativo.
    - Se creo primero el array "$keys" (usando range()), la cual creo un array desde el 0 a N-1.
    - Se creo el array "$elementos" (usando array_fill_keys(), la cual a partir de un array que 
      funcionara como clave, se le asignara un value (En este caso, los N elementos tienen el mismo value)).
    
    - Leer el README, alli hay links al funcionamiento de los metodos utilizados.
  */
  $objJson = json_encode($elementos);
  echo $objJson;
?>