# Programacion Server-Side + PHP

## indice
- [Programacion Server-Side](#programacion-server-side-1)
- [PHP](#php)
    - [Servidor Web](#servidor-web)
    - [VARIABLES](#variables)
    - [CONSTANTES](#constantes)
    - [ARREGLOS INDEXADOS](#arreglos-indexados)
    - [ARREGLOS ASOCIATIVOS](#arreglos-asociativos)
    - [OPERACIONES SOBRE ARREGLOS](#operaciones-sobre-arreglos)
    - [OPERADORES PARA ARREGLOS](#operadores-para-arreglos)
    - [OBJETOS](#objetos)
    - [ESTRUCTURAS DE CONTROL](#estructuras-de-control)
    - [STRINGS](#strings)
    - [FUNCIONES](#funciones)
    - [AMBITOS](#ambitos)
    - [INCLUDE](#include)
    - [REQUIRE](#require)
    - [REQUIRE_ONCE](#require_once)
- [Metodos HTTP](#metodos-http)

    
# Programacion Server-Side

La programación **server-side** es el componente principal de lo sitios dinámicos, donde un servidor recibe las solicitudes de los clientes, para luego procesarlas y devolver una respuesta.
- El cliente recibe HTML/JSON pero no sabe cómo fue producido.
- Requiere instalación en el servidor.
- No requiere instalación ni complementos adicionales en el cliente.

# PHP
Lenguaje server-side de código abierto muy popular especialmente adecuado para el desarrollo web.
- Lenguaje de programacion interpretado.
- Diseñado para producir sitios y aplicaciones web dinámicas.
- Soporte par amúltiples plataformas.
- El ódigo es procesador por el intérprete PHP que genera la página web resultante.

## Servidor WEB
Tenemos que “servir” nuestros archivos usando un servidor web:
- XAMPP - Apache usa por default la carpeta ‘htdocs’ para servir archivos (en windows c:\xampp\htdocs).
- Ponemos los archivos donde el servidor pueda verlos y usamos nuestra dirección local (localhost/127.0.0.1). Apache traduce la ruta relativa de la URL a la estructura de carpetas que tenemos en el servidor.

## VARIABLES
- PHP es un lenguaje **débilmente tipado**: el tipo se define por el contexto en el que es usada. (Apartir de versiones 7 puede agregar tipos).
- Se definen **implícitamente**: no hay que declararlas.
- El nombre *siempre* empieza con $
~~~ php
<?php
$aBool = true;
// boolean
$name = "Juan"; // string
$lastName = "Perez"; // string
$cont = 12;
// integer
echo "$name, $lastName"; // outputs "Juan, Perez"
?>
~~~

## CONSTANTES
Como el nombre sugiere, este valor no puede variar durante la ejecución del script.
- Se usa el método define(nombre, valor).
- Para leerlas, usamos el nombre sin ‘$’.
~~~ php
<?php
define("SALUDO", "Hello world.");
echo SALUDO; // outputs "Hello world."
?>
~~~

## ARREGLOS INDEXADOS
Pueden ser creados utilizando el contructor **array()**
~~~ php
<?php
$cars = ["Volvo", "BMW", "Toyota"];
// Asignación manual
$cars[0] = "Volvo";
$cars[1] = "BMW";
$cars[2] = "Toyota";
$count = count($cars);
?>
~~~

## ARREGLOS ASOCIATIVOS
Se construyen indicando pares *clave => valor* separados por coma como argumento
~~~ php
<?php
$edades = array(
"juan" => 35,
"nico" => 17,
"julia" => 23
); /**v2: $edades = [“juan” => 35, “nico” => 17,
“julia”=> 23] **/
echo ‘<ul>’;
echo ‘<li>’.$edades["juan"].’</li>’; //imprime 35
echo ‘<li>’.$edades["julia"].’</li>’; //imprime 23
echo ‘</ul>’;
?>
~~~

## OPERACIONES SOBRE ARREGLOS
**Insertar** un elemento al final
~~~ php
array_push($arreglo, $valor)
$arreglo[] = $valor;
~~~
**Extraer** el último elemento del array
~~~ php
array_pop($arreglo)
~~~
**Invertir** orden de los elementos
~~~ php
array_reverse($arreglo) //Devuelve un arreglo nuevo
~~~
**Operaciones aritméticas** sobre arreglos
~~~ php
array_sum($arr) //Calcula la suma de los valores
array_product($arr) //Calcula el producto de los valores
~~~

## OPERADORES PARA ARREGLOS
| Ejemplo | Efecto | Resultado |
|---------|--------|-----------|
| $a + $b |Unión   |Union de $a y $b|
| $a == $b|Igualdad|TRUE si $a y $b tienen las mismas parejas clave/valor.|
|$a === $b|Identidad|TRUE si $a y $b tienen las mismas parejas clave/valor en el mismo orden y de los mismos tipos.|
| $a != $b|Desigualdad|TRUE si $a no es igual a $b|
| $a <> $b|Desigualdad|TRUE si $a no es igual a $b|
|$a !== $b|No Identidad|TRUE si $a no es idéntica a $b|

## OBJETOS
### stdClass(Clase Estándar)
Es una clase predefinida en php, que no tiene ningún atributo ni métodos.

La podemos usar cuando queremos crear un objeto genérico al que después podemos agregar propiedades.

> Podemos verlo como un JSON en Javascript
~~~ php
<?php
$user = new stdClass();
$user->name = 'Miguel';
$user->age = 22;
echo $user->name;
echo $user->edad;
?>
~~~

## ESTRUCTURAS DE CONTROL
- if, else, elseif
~~~ php
<?php
if($a > $b){
    echo "a es mayor que b";
}
else {
    echo "a NO es mayor que b";
}
/*=====================*/
if($a > $b) {
    echo "a es mayor que b";
}
elseif ($a == $b) {
    echo "a is igual a b";
}
else {
    echo "a menor que b";
}
?>
~~~
- switch, break, continue
~~~ php
<?php
$i = 3;
switch($i){
    case 0:
        echo "i es igual a 0";
        break;
    case 1:
        echo "i es igual 1";
        break;
    default:
        echo "i es distinto a 0 y 1";
        break;
}?>
~~~
> arreglo indexad de ejemplo
~~~ php
$cars[0] = "Volvo";
$cars[1] = "BMW";
$cars[2] = "Toyota";
$count = count($cars);
~~~
- for
~~~ php
for($i=0; $i < $count; $i++){
    echo "<li>".$cars[$i]."</li>";
}
~~~
- while, do-while
~~~ php
$i=0;
while($i < $count){
    echo "<li>".$cars[$i]."</li>";
    $i++;
}
~~~
- foreach
~~~ php
foreach($cars as $car){
    echo "<li>".$car."</li>";
}
~~~

## STRINGS
Concatenación de **cadenas de texto**

### Por operador
- . -> Concatena strings
- .= -> Concatena strings a final
~~~ php
<?php
$bar = "Mundo";
$foo = "Hola " . $bar;
$foo .= "!";
echo $foo; //outputs Hola Mundo!
?>
~~~
### Por interpolacion
~~~ php
<?php
$alguien = 'David';
$donde = 'Aqui';
echo "$donde estuvo $alguien";
?>
~~~

## FUNCIONES
Una función puede ser definida empleando una sintaxis como la siguiente:
~~~ php
<?php
/**
* Calcular el promedio de los valores de un arreglo
**/
function promedioEdad($edades){
    $promedio = array_sum($edades) / count($edades);
    return $promedio;
}
?>
~~~

## AMBITOS
~~~ php
<?php
$a = 1; /* ámbito global */
function test() {
    echo $a; /* referencia a una variable del ámbito local */
}
test();
?>
~~~
> Solucion
- Se puede indicar que $a es global, con ”global $a” o accediendo directamente con “$GLOBALS['a']”.
- Usar variables globales es mala práctica!
~~~ php
<?php
$a = 1; /* ámbito global */
function test() {
    GLOBAL $a;
    echo $a;
}
test();
?>
~~~

## INCLUDE
> include 'file_name.php'

Incluye el archivo especificado. Todas las funciones y variables definidas en el archivo incluido tienen alcance global.

## REQUIRE
> require 'file_name.php'

Es igual a include excepto que en caso de fallo producirá un error fatal de nivel E_COMPILE_ERROR.
- Se detiene el script mientras que include sólo emitirá una advertencia (E_WARNING) lo cual permite continuar el script.
- Algunas posibles causas de fallos son:
    - El archivo no existe
    - El archivo no es accesible (permisos)

## REQUIRE_ONCE
> require_once 'file_name.php'

Es idéntica a **require** salvo que PHP verificará si el archivo ya ha sido incluido y si es así, no se incluye de nuevo.

Sucede lo mismo con la sentencia include_once.

# Metodos HTTP

Dos de los métodos HTTP más utilizados con los que el navegador puede enviar información al servidor desde un formulario son:
### Método GET
~~~ html
<form method='GET'>
~~~
El método **HTTP GET** envía la información codificada del usuario en **HTTP request**, directamente en la **URL**.
### Método POST
~~~ html
<form method='POST'>
~~~
Con el método **HTTP POST** también se codifica la información, pero ésta se envía a través del **body** del **HTTP Request**, por lo que no aparece en la URL.