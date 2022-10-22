1. Las URLs semanticas son fáciles de entender para los usuarios. **VERDADERO**
2. Cuando se hacen llamadas del tipo www.calculadora.com/sumar/2/3 puedo tener tantos archivos PHP como combinaciones existan. **FALSO**
3. Las URL semanticas favorecen el posicionamiento Web. **VERDADERO**
4. El siguiente archivo .htaccess define la posibilidad de reescribir URL en forma amigable.
~~~ xml
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} -f [OR]
    RewriteCond %{REQUEST_FILENAME} -d
    RewriteRule \.(?:css|js|jpe?g|gif|png)$ - [L]
    RewriteRule ^(.*)$ router.php?action=$1 [QSA,L]
</IfModule>
~~~
Cual de las siguientes modificaciones permite redirigir a un enrutador que se denomine enrutador.php y cuyo parámetro se llame parametro ?
> Respuesta correcta
~~~ xml
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} -f [OR]
    RewriteCond %{REQUEST_FILENAME} -d
    RewriteRule \.(?:css|js|jpe?g|gif|png)$ - [L]
    RewriteRule ^(.*)$ enrutador.php?parametro=$1 [QSA,L]
</IfModule>
~~~
5. Considerando el siguente código de enrutador, y que las funciones realizan el calculo correctamente que describen.
>Ejemplo: la funcion sumar(x, y) es el resultado de x+y, restar(x, y) es el resultado de x-y, y asi para multiplicar, dividir.

~~~ php
<?php
    require_once('pi.php');
    require_once('about.php');
    require_once('operaciones.php');
    require_once('home.php');

    if ($_GET['action'] == '')
        $_GET['action'] = 'home';
    
    $partesURL = explode('/', $_GET['action']);

    switch ($partesURL[0]) {
        case 'about':
            $developer = null;
            if (isset($partesURL[1]))
                $developer = $partesURL[1];
            echo showAbout($developer);
            break;
        case 'pi' :
            showPiNumber();
            break;
        case 'suma' :
            echo restar($partesURL[1], $partesURL[2]);
            break;
        case 'resta' :
            echo sumar($partesURL[1], $partesURL[2]);
            break;
        case 'division':
            echo dividir($partesURL[1], $partesURL[2]);
            break;
        case 'multiplicacion':
            echo multiplicar($partesURL[1], $partesURL[2]);
            break;
        default:
            echo getHome();
            break;
    }
~~~

Cual sera el resultado que mostrará el navegador para la siguiente URL:

>http://localhost/suma/3/2
>> Respuesta: 1

6. Si el parametro $_GET['action'] trae un contenido 'suma/3/1/' y se aplica la siguiente instrucción:
    ~~~ php
    $partesURL = explode('/', $_GET['action']);
    ~~~
    Cual será el resultado de $partesURL ?
> Resultado
~~~ php
Array
(
    [0] => suma
    [1] => 3
    [2] => 1
    [3] => 
)
~~~