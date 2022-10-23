# Bases de Datos - PDO

## Indice

- [Conectarse a una Base de Datos con PHP](#conectarse-a-una-base-de-datos-con-php)
- [Problema a resolver](#problema-a-resolver)
- [PHP data objects(PDO)](#php-data-objects-pdo)
- [Conectarse a una base de datos utilizando PDO](#conectarse-a-una-base-de-datos-utilizando-pdo)
- [Inyeccion SQL](#inyeccion-sql)
- ALTA, BAJA, MODIFICACION Y CONSULTAS
    - [Obtener datos con FETCH en PDO](#obtener-datos-con-fetch-en-pdo)
    - [Insertar datos con PREPARE en PDO](#insertar-datos-con-prepare-en-pdo)
    - [Borrar datos con PREPARE en PDO](#borrar-datos-con-prepare-en-pdo)
    - [Modificar datos con PREPARE en PDO](#modificar-datos-con-prepare-en-pdo)
- [ACID transacciones](#acid-transacciones)

# Conectarse a una Base de Datos con PHP

Cada lenguaje tiene un conector a la base de datos. Usamos funciones específicas para conectarnos.

En resumen, estos son los pasos habituales para conectarnos desde nuestro código.

### Existen funciones especificas en PHP para acceder a una base de datos MySQL:

1. **Abrimos** una conexion.
~~~ php
$link = mysqli_connect($host, $user, $passwd, $db);
~~~
2. **Enviamos** la consulta.
~~~ php
$result = mysqli_query($link, 'SELECT * WHERE 1=1');
$arreglo = mysqli_fetch_all($result, MYSQLI_ASSOC);
~~~
3. **Procesamos** los datos para generar el HTML.
~~~ php
foreach($arreglo as $value){
    echo($value['campo']);
}
~~~ 
4. **Cerramos** la conexion.
~~~ php
mysqli_close($link);
~~~

# Problema a resolver

- Habíamos creado la aplicación para que funcione con MySQL.
- Las bases de datos tienen pequeñas diferencias en el código SQL que entienden (algunas no tan pequeñas).
- Vamos a tener que revisar nuestro código y reescribir cada consulta.

# PHP Data Objects (PDO)

Es una capa de abstraccion que hace que escribamos una vez el codigo y funcione para cualqueir base de datos.

Funciona como INTERMEDIARIO entre la **logica** y los **datos** de nuestra aplicacion.

## Ventajas
- Herramienta de acceso a bases de datos (interface)
- Funciona en PHP 5.1 y posteriores
- PDO es compilaro: Mas Rapido.
- PHP soporta la mayoria de bases de datos del mercado:
    - MySQL
    - SQLite
    - MSSql

cada controlador de bases de datos que implemente la interfaz PDO puede exponer caracteristicas especificas de la base de datos

## ¿Como se si tengo PDO activo?

1. Creo un archivo "info.php"
2. Escribo el siguiente comando
~~~ php
<?php phpinfo(); ?>
~~~
3. Ejecuta ese archivo en tu web server
4. Buscar las siguientes lineas:

PDO
| PDO support| enabled|
|------------|--------|
|PDO drivers | mysql  |

pdo_mysql
| PDO Driver for MySQL| enabled|
|------------|--------|
|Client API version | mysqlnd 5.0.11-dev-20120503 - $id: 987129817293861924691287391827981239817298 |

5. Si ya estan, se puede usar PDO normalmente

# Conectarse a una base de datos utilizando PDO

- Paso 1:
    - Crear una base de datos en PhpMyAdmin
    - Si no tenes ganas de usar la interfaz, utiliza las sguientes sentencias SQL:
    ~~~ sql
    CREATE DATABASE ejemplo;
    ~~~
- Paso 2:
    - Crear tablas en la base de datos
    - Sentencias SQL de ejemplo:
    ~~~ sql
    CREATE TABLE tabla(
        id int NOT NULL AUTO_INCREMENT,
        nombre varchar(20) NOT NULL,
        apellido varchar(20) NOT NULL,
        edad int(2) NOT NULL,
        valido tinyint(1) NOT NULL DEFAULT '0',
        telefono int,
        PRIMARY KEY (id)
    )   ENGINE=InnoDB DEFAILT CHARSET=utf8;
    ~~~
- Paso 3:
    - Insertar valores a las tablas
    - Sentencias SQL de ejemplo:
    ~~~ sql
    INSERT INTO tabla (id, nombre, apellido, edad, valido, telefono) VALUES
    (10, "Fulano", "Detal", 20, 0, 2494000000),
    (12, "Mengano", "Mellamo", 25, 1, 2494000001),
    (14, "Armando Esteban", "Quito", 60, 1, 2494000002);
    ~~~
- Paso 4:
    - Pasamos a un archivo .php a realizar la conexion con la base de datos
    - Pasos para realizar la conexion
        1. Abrimos la conexion.
        ~~~ php
        $db = new PDO('mysql:host=localhost;', 'dbname=ejemplo;charset=utf8', 'root', '');//("servidor", "nombre de la DB", "usuario", "contraseña")
        ~~~
        2. Enviamos una consulta SQL.
        ~~~ php
        $sentencia = $db->prepare( "select * from tabla");//realiza la consulta
        $sentencia->execute();//ejecuta la consulta en la DB
        $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);//transforma el resultado de la consulta en un arreglo de objetos
        ~~~
        3. Procesamos los datos. Es buena practica separar el procesamiento de los datos en un archivo a parte, separar HTML de DB
        ~~~ php
        foreach($tareas as $tarea) {
            echo $tarea->nombre;
        }
        ~~~
        4. Cerrar conexion con la DB
        > En PDO no es necesario cerrar la conexion

# Inyeccion SQL

Es un tipo de ataque que puede provocar un usuario malintencionado a nuestra base de datos.

Consta de ingresar sentencias SQL dentro de los inputs HTML que utilizamos para recopilar datos, si esa sentencia llega a nuestra base de datos, puede vulnerar la seguridad de nuestros datos y/o romper toda la base de datos y seria una cagada importante.

## Malas practicas
> Utilizar exec() apra insertar datos a nuestra DB
~~~ php
$db->exec("INSERT INTO tarea(titulo)"."VALUES('".$tarea."')");
~~~
Si bien se puede utilizar para insertar datos a una DB, no previene ataques de inyeccion SQL
~~~ php
$db->lastInsertId() //nos devuelve el id del último elemento insertado
~~~

# Obtener datos con FETCH en PDO

> fetchAll(PDO::FETCH_*): trae todas las filas de una tabla y las retorna de las siguientes formas:

- **PDO::FETCH_ASSOC**: devuelve un *array indexado* por los nombres de las columnas del conjunto de resultados.
- **PDO::FETCH_OBJ**: devuelve un *objeto anónimo* con nombres de propiedades que se corresponden a los nombres de las columnas devueltas en el conjunto de resultados.
- **PDO::FETCH_BOTH**: devuelve un *array indexado* tanto por nombre de columna, como numéricamente.
- **PDO::FETCH_NUM**: devuelve un *array indexado* por el número de columna tal como fue devuelto en el conjunto de resultados, comenzando por la columna 0.

> $tareas = $sentencia->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC);

- **PDO::FETCH_GROUP**: agrupa las filas usando la primer  columna como índice.
- **PDO::FETCH_UNIQUE**: No hace un arreglo de arreglos al  ser única cada fila por grupo.

# Insertar datos con PREPARE en PDO
> prepare($sqlQuery) //permite la creacion de una sentencia "parametrizada" para su posterior uso
~~~ php
$sentencia = $db->prepare("INSERT INTO tarea(titulo) VALUES(?)");
~~~
>execulte($array) //ejecuta la sentencia con los paremetros del arreglo
~~~ php
$sentencia->execute(array("Hacer la página de Web"));
$sentencia->execute(array("Estudiar otras materias"));
~~~
- El paso de parámetros le permite a PDO controlar y escapar las variables con contenido inseguro:
~~~ php
$sentencia->execute(array("tarea’; DROP TABLE tarea; SELECT ‘"));
~~~
- PDO escapará los caracteres problemáticos y el texto será insertado normalmente.
    - Devolver el ultimo ID insertado a la tabla
    ~~~ php
    $db->lastInsertId()
    ~~~

## Parametros enviados de forma asociativa
~~~ php
$sentencia = $this->db->prepare("INSERT INTO tarea(titulo, descripcion)”."VALUES :titulo, :descripcion)");
$sentencia->execute(array(":titulo"=>$tarea['titulo'], ":descripcion"=>$tarea 'descripcion']));
~~~

# Borrar datos con PREPARE en PDO
La sintaxis y el metodo es el mismo que para hacer un INSERT pero la sentencia SQL va a ser otra
~~~ php
$sentencia = $db->prepare("delete from tarea where id=?");
$sentencia->execute(array($id_tarea));
~~~

# Modificar datos con PREPARE en PDO
La sintaxis y el metodo es el mismo que para hacer un INSERT pero la sentencia SQL va a ser otra
~~~ php
$sentencia = $db->prepare("UPDATE tarea SET Finalizada=1 "." WHERE idTarea=?");
$sentencia->execute(array($tarea['id']));
~~~

## Checkear que no se rompio nada
- ¿Como saber que filas fueron afectadas con la ultima sentencia SQL?
~~~ php
$sentencia->rowCount() //nos dice cuántas filas fueron afectadas en la última ejecución. (También aplicable en INSERT o DELETE)
~~~

# ACID transacciones
Una transaccion es un conjunto de sentencias SQL que se ejecutan como unidad:
- Se ejecutan todas o no se ejecuta ninguna
- Si una transacción tiene éxito, todas las modificaciones de datos realizadas se guardan en la base de datos.
- Si una transaccion falla los datos no se guardaran.

## Atomicity, Consistency, Isolation, Durability
Las transacciones garantizan:
- **Atomicidad:** Asegura que la operación se ha realizado o no, y por lo tanto ante un fallo del sistema no puede quedar a medias
- **Consistencia:** Sólo se pueden escribir datos válidos respetando los tipos de datos declarados y la integridad referencial.
- **Aislamiento:** Asegura que una operación no puede afectar a otras. Con esto se asegura que varias transacciones sobre la misma información sean independientes y no generen ningún tipo de error.
- **Durabilidad:** Cuando se completa una transacción con éxito los cambios se vuelven permanentes.

## Pasos para hacer transaccion en PDO
En PDO una transacción comienza con: 
~~~ php
$db->beginTransaction();
~~~
Todas las operaciones siguientes serán ejecutadas en modo de transacción.

La transacción se completa con:
~~~ php
$db->commit();
~~~
O se deshacen los cambios con:
~~~ php
$db->rollBack();
~~~
### Solucion completa
~~~ php
$db->beginTransaction();
$consulta = $db->prepare('SELECT saldo'
                        .'FROM usuario WHERE idUsuario = ?');
$consulta->execute(array($idUsr));
$saldo = $consulta->fetchColumn();
if($saldo<$costo) return false;
    $saldo-=$costo;
$consulta = $db->prepare('UPDATE saldo'
                        .'SET saldo=? WHERE idUsuario = ?');
$consulta->execute(array($saldo, $idUsr));
$db->commit();
~~~
### Exepciones
Ahora queremos asegurar que un monto se debite si y sólo si la compra se realiza.

Una excepción es la indicación de un problema que ocurre durante la ejecución de un programa.

Pueden ser capturadas encerrando las funciones que las producen en bloques try:
>$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
~~~ php
try{
   $db->beginTransaction();
   /* instrucciones que generan excepciones */
   /* Si todo es correcto, los cambios son guardados. */
   $db->commit(); 
}catch(PDOException  $ex){ 
   /* Si una transacción falla, deshace los cambios. */
   $db->rollBack(); 
   log($ex->getMessage());
}
~~~