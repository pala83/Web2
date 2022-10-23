# Responda y justifique
- ## Las imagenes y videos, se pueden almacenar en una BBDD?
- ## ¿Como piensa que se puede tener asociada una imagen a un registro? (por ejemplo, la foto carnet de un usuario)

Rta: Si se puede meter una imagen o video a una Base de Datos, lo que hay que hacer es crear un atributo en una tabla con el **tipo de dato BLOB o LONGBLOB**

Para poder capturar y enviar la imagen a la DB desde PHP se puede hacer de la siguiente manera:
~~~ php
//supongo que me llega una imagen mediante un <input type=file name="img"...> de HTML
$imagen = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
$sentencia = $db->prepare("INSERT INTO tabla(nombre, imagen) VALUES(?)");
$sentencia->execute(array("nombre", $imagen));
~~~

Para obtener la imagen de la DB y representarla:

~~~ php
$sentencia = $db->prepare( "select * from tabla");//realiza la consulta
$sentencia->execute();//ejecuta la consulta en la DB
$tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach($tareas as $tarea)
    echo "<img src='data:image/jpg;base64,.base64_encode($tarea['imagen']).'/>";
~~~

La imagen al registro de asocia en formato binario.