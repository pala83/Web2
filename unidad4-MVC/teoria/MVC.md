# MVC y POO

### Indice

- [MVC](#mvc-model-view-controller)
    - [¿Qué problema resuelve?](#¿qué-problema-resuelve)
    - [¿Qué propone MVC?](#¿qué-propone-mvc)
        - [MODELO](#modelo---responsabilidades)
        - [VISTA](#vista---responsabilidades)
        - [CONTROLADOR](#controlador---responsabilidades)
        - [Cantidad de archivos](#cantidad-de-archivos)
    - [Ventajas](#ventajas-mvc)
    - [Desventajas](#desventajas-mvc)
- [Programacion Orientada a Objetos](#poo---programación-orientada-a-objetos)
    - [¿Qué son los objetos?](#¿qué-son-los-objetos)
    - [Clase](#clase)
- [Creacion de objetos en PHP](#creacion-de-objetos-en-php)
- [Clase vs Instancia](#clase-vs-instancia)


# MVC (model-view-controller)

Es un Patrón de arquitectura de sofware utilizado ampliamente en la industria.

Ofrece **soluciones estándares a problemas comunes** dentro de la ingenieria de sofware.

Un patrón defien una *estructura esencial* para sistema de sofware.

Define cuáles van a ser sus componentes y como se relacionan entre ellos.

## ¿Qué problema resuelve?

**Desacopla el código** de programas donde toda la lógica, el *acceso a datos* y la *interfaz gráfica* se encuentran bajo mismos archivos sin ninguna separación clara.

## ¿Qué propone MVC?

Divide la lógica del programa en **tres elementos inter-relacionados**. Cada uno cumple una función determinada.

Cada componente tiene una responsabilidad determinada y trabajan de forma coordinada:
- **MODELO**: Acceso a datos.
- **VISTA**: Interfaz de usuarios (Front End).
- **CONTROLADOR**: Coordinador entre vista y modelo.

### MODELO - Responsabilidades

En este componente manejamos la **comunicacion con el modelo de datos**
- Proteger y persistir los datos del usuario.
- Asegurar la integridad y consistencia de datos.
    - Consultar datos.
    - Insertar/Modificar datos.
    - Borrar datos.

### VISTA - Responsabilidades

En este componente generamos la **interfaz de usuario**.
- Presentar la informacion al usuario (front-end).
- Permitir al usuario interactuar con la aplicacion.

### CONTROLADOR - Responsabilidades

Es el **intermediario** (cordinador) entre la vista y el modelo.
- **Controla y coordina** el flujo de la aplicación.
- **Obtiene y procesa** los pedidos del usuario.
- **Valida** la entrada de datos del usuario.

### Cantidad de archivos

**MVC** no propone ninguna regla para esto, pero sí existen ciertos estándares que podemos seguir:
- **Modelo**:
    - Por lo general, una clase (model) por entidad.
    - Ej: Una clase para Tareas, una clase para Usuarios.
- **Vista**:
    - Una clase por entidad a mostrar.
    - Ej: Una clase para mostrar lo relacionado a Tareas (lista, detalle, formularios).
- **Controlador**
    - Una clase por cada lógica a controlar.
    - Ej: Una clase para ABM de tareas.

## Ventajas MVC

- MVC crea un **sistema desacoplado**
    - Reduce la complejidad de cada parte del sistema
- Permite **trabajar en paralelo** de forma colaborativa
    - FrontEnd
    - BackEnd
- **Facilita**
    - Escalabilidad
    - Mantenimiento

## Desventajas MVC

- **Agrega complejidad** a la solución.
- La estructura predefinida puede no ser lo que estábamos buscando.

¿Cómo saber cuando **NO** usarlo?
- Donde hay elementos que no splican la tripla MVC.

# POO - Programación Orientada a Objetos

Es una forma de **pensar, modelar y desarrollar aplicaciones**.

Permite desarrollar sistemas que puedan **crecer a gran escala** sin perder la posibilidad de ser **extendidos** y **modificados** de acuerdo a las necesidades del cliente.

## ¿Qué son los objetos?

Resumen: **TODO ES UN OBJETO**

Es un elemento de la vida real representado con programacion, puede ser un elemento que podemos ver y tocar (un perro, gato, auto, jabon, etc) o puede ser un concepto totalmente abstracto (un elemento, inseguridad, felicidad, Cuenta corriente, plazo fijo).

Los objetos se componene por **Acciones** y **Atributos**

## Clase

Una clase es donde definimos al objeto en si, todos los atributos y acciones del objeto.

La clase se utiliza en forma de **molde** para crear **Instancias de clase**, cada instancia de clase es un objeto distinto con sus atributos y acciones definidos.

Supongamos que tenemos una clase perro que tiene de atributo $color, el objeto perro seria una instancia de dicha clase, pero podria tener un color determinado $color = marron.

# Creacion de objetos en PHP

~~~ php
<?php
// esta seria la clase
class Perro{
    private $raza;
    private $color

    public function __construct($raza, $color){
        $this->raza = $raza;
        $this->color = $color;
    }

    public function ladrar(){
        echo"guau guau!";
    }
}
// esta seria la instancia
$perro1 = new Perro("collie", "marron");
$perro2 = new Perro("labrador", "crema");
?>
~~~

# Clase vs Instancia

- ¿Tiene sentido crear 2 **clases** PerroCampo y PerroCiudad?
- ¡No! En este caso serian identicas en cuanto a atributos, pero tendrian distinto nombre.
- En POO es clave diferenciar entre una clase y una instancia de dicha clase