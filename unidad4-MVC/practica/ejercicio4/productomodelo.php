<?php
class productomodelo{
   /**
    *  Obtiene la lista de peliculas de la DB según género
    */
   function getProductoNombre($nombre) {
       $db = new PDO('mysql:host=localhost;'.'dbname=casaLimpieza;charset=utf8', 'root', '');
       
       $query = $db->prepare('SELECT * FROM producto WHERE nombre = ?');
       $query->execute([$nombre]);

       $productos = $query->fetchAll(PDO::FETCH_OBJ);
       return $productos;
   }
}
