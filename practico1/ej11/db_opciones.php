<?php
  // Cant opciones a mostrar
  $opc_1 = new stdClass();
  $opc_1->cantidad = 5;
  $opc_1->texto = "Mostrar los primeros $opc_1->cantidad elementos";
  
  $opc_2 = new stdClass();
  $opc_2->cantidad = 20;
  $opc_2->texto = "Mostrar los primeros $opc_2->cantidad elementos";
  
  $opc_3 = new stdClass();
  $opc_3->cantidad = 100;
  $opc_3->texto = "Mostrar los primeros $opc_3->cantidad elementos";

  $opc_4 = new stdClass();
  $opc_4->cantidad = 160;
  $opc_4->texto = "Mostrar todos los elementos";
  
  $opciones = array($opc_1, $opc_2, $opc_3, $opc_4);
