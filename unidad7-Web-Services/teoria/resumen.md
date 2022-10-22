# API Rest

## Indice

- [Diseño de endpoints](#diseño-de-endpoints)
- [Tabla de ruteo](#tabla-de-ruteo)
    - [Modificar .htaccess](#modificar-htaccess)
    - [Router Avanzado](#router-avanzado)
- [Api View](#api-view)

# Diseño de endpoints

| Method | Action |
|--------|--------|
| GET | api/tareas |
| POST | api/tareas|
| GET | api/tareas/:**ID**  | 
| PUT | api/tareas/:**ID** |
| DELETE | api/tareas/:**ID**|

# Tabla de ruteo

| URL | Verbo | Controller | Method |
|-----|-------|------------|--------|
| tareas | GET | ApiTaskConteoller | obtenerTareas() |
| tareas | POST | ApiTaskConteoller | crearTarea() |
| tareas/:ID | GET | ApiTaskConteoller | obtenerTarea($id) |
| tareas/:ID | DELETE | ApiTaskConteoller | eliminarTarea($id) |
| tareas/:ID | PUT | ApiTaskConteoller | actualizarTarea($id) |

## Modificar .htaccess
Buena practica: agregamos el prefijo api/ en la URL
~~~ xml
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
// RewriteRule ^api/(.*)$ route.php?resource=$1 [QSA,L,END] //
</IfModule>
~~~

## Router avanzado
Vamos a utilizar una libreria creada por los profes que tiene una interfaz publica de Router.
> Nuestro router ahora tendra la siguiente apariencia
~~~ php
<?php
require_once 'libs/Router.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('tareas', 'GET', 'TaskApiController', 'obtenerTareas');
$router->addRoute('tareas', 'POST', 'TaskApiController', 'crearTarea');
$router->addRoute('tareas/:ID', 'GET', 'TaskApiController', 'obtenerTarea');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
~~~

Las rutas se definen utilizando el metodo:

~~~ php
$router->addRoute($resource: string, $httpMethod: string, $controller: string, $methodController: string);
~~~

Los controllers obtienen los parámetros del recurso a través de un arreglo asociativo que es enviado a los métodos con el nombre $params.

~~~ php
public function getTarea($params = null) {
        $id = $params[':ID'];
 …
}
~~~

# API View
### Metodo response
- Responsabilidades:
    - Setear header con resultado de la operación
    - Encode data en formato JSON

> codigo
~~~ php
public function response($data, $status) {
    header("Content-Type: application/json");
    header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
    echo json_encode($data);
}
~~~
### Metodo requestStatus
- Responsabilidad: dar un mensaje asociado a un código de respuesta

>Devuelve el status de respuesta según el código solicitado.
~~~ php
private function _requestStatus($code){
    $status = array(
    200 => "OK",
    404 => "Not found",
    500 => "Internal Server Error"
    );
    return (isset($status[$code]))? $status[$code] : $status[500];
}
~~~

# API Controller
### Ejemplo de funcion GET para la api rest
~~~ php
 function get($params = []) {
    if(empty($params)){
      $tareas = $this->model->getTareas();
      return $this->view->response($tareas,200);
    }
    else {
      $tarea = $this->model->getTarea($params[":ID"]);
      if(!empty($tarea)) {
        return $this->view->response($tarea,200);
      }.... ELSE?
    }
~~~

### Ejemplo de funcion DELETE para la api rest

~~~ php
public function deleteTask($params = []) {
        $task_id = $params[':ID'];
        $task = $this->model->getTask($task_id);

        if ($task) {
            $this->model->deleteTask($task_id);
            $this->view->response("Tarea id=$task_id eliminada con éxito", 200);
        }
        else 
            $this->view->response("Task id=$task_id not found", 404);
}
~~~