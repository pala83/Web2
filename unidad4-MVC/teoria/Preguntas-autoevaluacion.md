 ## 1. Los **patrones arquitectónicos** son soluciones estándar que resuelven problemas comunes en el desarrollo de sistemas.

    ¿A qué apunta el patrón MVC? 

    - Separación de responsabilidades para lograr un sistema desacoplado, reduciendo la complejidad de cada parte.
> MVC separa resposabilidades para lograr que los sistemas sean mantenibles y modificable en el transcurso del tiempo.

## 2. MVC propone separar una aplicación en tres partes inter-relacionadas. El **modelo**, la **vista** y el **controlador**.

¿Cuáles son las funciones de cada uno?

- Se encarga de generar la interfaz gráfica del usuario e interactuar con ellos. **VISTA**
- Coordina la comunicación entre el modelo y la vista. Acepta las peticiones del usuario y coordina el flujo de la aplicación. **CONTROLADOR**
- Se encarga de la comunicación con los datos de nuestro sistema (base de datos). **MODELO**

## 3. En un **ruteo** de una aplicación MVC. Cada entrada de la **tabla de ruteo** invoca a un *método de un controlador*.
**VERDADERO**

> Siempre el router despacha las solicitudes al controlador que es el encargado de coordinar el flujo de la aplicación.

## 4. ¿A qué **parte del MVC** le parece que pertenece este método?
~~~ php
public function showArtists() {
    $artists= $this->model->getAll();

    $this->view->show($artists);
}
~~~
> Al controlador

## 5. ¿A qué **parte del MVC** le parece que pertenece esté método?
~~~ php
public function getAll() {
    $db = $this->createConection();

    $sentencia = $db->prepare("SELECT * FROM artists");
    $sentencia->execute(); 
    $artists = $sentencia->fetchAll(PDO::FETCH_OBJ);

    return $artists;
}
~~~
> Al modelo