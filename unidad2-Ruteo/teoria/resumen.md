# Ruteo

### indice
- [problema a solucionar](#problema-a-solucionar)
- [url semanticas](#url-semanticas)
- [Routing](#routing)
- [Reglas Apache](#reglas-de-apache)
- [.htaccess](#htaccess)
- [Una mala practica que si podemos hacer](#una-mala-practica-que-si-podemos-hacer)

# Problema a solucionar

~~~
- https://localhost/index.php
- https://localhost/noticia.php?id=1
- https://localhost/about.php?dev=juan
~~~

1. Por cada acción nueva o sección que quiero agregale al sistema, tengo que **crear un archivo nuevo php**.

    - Necesitamos una forma de que cada acción NO se mapee directamente a un archivo fisico.(ENRUTAMIENTO).
2. Las URL's no se entienden y esto es **malo para el SEO**

    - Es importante que los sistemas utilicen URL's semanticas (amigables).

# Url semanticas
Las URL's semanticas o amigables son aquellas que son entendibles para el usuario.

## ventajas
- Fáciles de **entender** para los usuarios
- Mejoran el **posicionamiento** web.
- Proporcionan informacion sobre la **estructura** del sitio web.
- Faciles de **compartir**, ej: whatsapp, llamada, divulgacion.
- Mas **esteticas**, ej: imprimirlas en folletos, facebook, etc.

### Ejemplo de transformacion a URL semantica
>url comun
~~~
https://localhost/index.php
https://localhost/noticia.php?id=1
https://localhost/about.php?dev=juan
~~~
>url semantica
~~~
https://localhost/home
https://localhost/noticia/1
https://localhost/about/juan
~~~

# Routing

El **routing** (ruteo o enrutamiento) en un Sistema WEB es el mecanismo por el cual _cada solicitud del usuario_ especificada por la URL y por un metodo HTTP es dirigida a un _componente de codigo encargado de atenderlas_.

- Se encarga de determinar el PATH a donde redireccionaremos.
- Implica romper la logica de "cada URL es un archivo".

## Tabla de ruteo
| ACCION(URL)  | DESTINO           |
|--------------|-------------------|
| /home        | showHome();       |
| /about       | showAbout();      |
| /about/:deb  | showAbout(:deb);  |
| /noticia/:id | showNoticia(:id); |

## Entonces, ¿Que es el router?

El router es un **archivo.php** al cual vamos a llamar **"router.php"**, este es una capa de abstraccion que le agregamos a nuestro sistema que se encarga de redirigir las url semanticas a la funcionalidad que nosotros le asignemos.

**IMP:** El index.html de nuestra pagina pasa a ser el **router.php**, este va a ser el archivo principal que va a controlar cada accion que se realiza en la pagina, en la cual la URL sera modificada.

### Template de router basico "router.php"

~~~~
<?php
require_once 'tabla.php';

//definimos la URL base de nuestra pagina, en este caso sera https://localhost...etc
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//leemos la accion que viene por parametro, por defecto sera "tabla"
$action = 'tabla';  //   tabla/10
if (!empty($_GET['action'])) {
    $action = $_GET['action'];  // action => about/juan
}
//genera un arreglo con las acciones enviadas por url, ej: /tabla/10 => [tabla, 10]
$params = explode('/', $action);
//determina la funcionalidad asignada dependiendo la accion enviada por la URL
switch($params[0]){
    case 'tabla':
        if(empty($params[1])){
            showTabla();
        }
        else{
            showTabla($params[1]);
        }
        break;
    default:
        echo "404 no anda, andate";
        break;
}

?>
~~~~
****
# Reglas de APACHE

¿Como eliminar la parte de "router.php" de la URL actual?

- /router.php?action=**about/juan**
- /router.php?action=**noticia/1**

Para poder transformarla a URL semanticas y que queden de la siguiente manera

- about/juan
- noticia/1

## Reglas de servidor
Utilizamos **reglas de servidor**(Apache en este caso) para poder **enmascarar** la url y no mostrar el archivo router.php

En el archivo **.htaccess** indicamos qué URLs van a que archivo PHP.  En general vamos a redirigirlas a un código que sepa procesar la URL (router.php)

# .htaccess

Es u narchivo de configuracion de Apache HTTP web server.

Permite configurar opciones a nivel de directorio.

## Aplicaciones:
- Prevenir hotlinkg
- Bloquear usuarios por IP
- Documentos de error
- Redirigir durante mantenimiento
- Ocultar listado del directorio
- Ruteo

### Template .htaccess
~~~
<IfModule mod_rewrite.c>
	RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} -f [OR]
    RewriteCond %{REQUEST_FILENAME} -d

    RewriteRule \.(?:css|js|jpe?g|gif|png)$ - [L]
    RewriteRule ^(.*)$ router.php?action=$1 [QSA,L]
</IfModule>
~~~

### Explicacion paso a paso
- RewriteEngine On: Permito escritura (ruteo) de URL's
- RewriteCond %{REQUEST_FILENAME} -f: Verifica si existe el archivo (-f) con el nombre {elkesea}
- [OR]: Or logico
- RewriteCond %{REQUEST_FILENAME} -d: Verifica si existe el directorio (-d) con el nombre {elkesea}
- RewriteRule \.(?:css|js|jpe?g|gif|png)$ - [L]: hace un link simbolico a cada archivo que aparezca con las siguientes extensiones
- RewriteRule ^(.*)$ router.php?action=$1 [QSA,L]: con QSA indicas que la query string, o URL antigua sera cambiada por una nueva y con L le haces un link simbolico

# Una mala practica que si podemos hacer

Declarar la URL base de nuestro sitio web y ponerla en el head del html de la siguiente manera

~~~
<base href="https://localhost/WebII/etc...">
~~~

Tambien podemos declarar la URL base en una constante utilizando PHP

~~~
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
~~~

