# Arquitecturas de sistemas WEB

## Indice

- [Sistemas de información](#sistemas-de-información)
- [Sistemas Web](#sistema-web)
- [Arquitectura cliente-servidor](#arquitectura-cliente---servidor)
- [Protocolo Web](#protocolo-http)
- [Contenido Estático vs Contenido Dinámico](#pagina-estatica-vs-pagina-dinamica)

# Sistemas de información
>Un **Sistema de informacion** (SI) es un conjunto de elementos "digitales" orientados al tratamiento y administracion de datos en información, organizados y listados para su uso posterior, generados para cubrir una **necesidad** o un **objetivo** de una organizacion o individuo.

## ¿Por qué desarrollamos sistemas?

se crean sistemas para cubrir una **necesidad** o un **objetivo** de una organizacion o individuo.

### Los sistemas se utilizan para:
- tomar desiciones,
- controlar operaciones
- analizar problemas y facilitar actividades,
- crear nuevos productos o servicios

### Actividades de un Sistema de Información
Existen cuatro actividades en un **SI** que producen la informacion.
Estas actividades son:
1. **Recopilacion:** captura o recolecta datos.
2. **Almacenamiento:** guarda de forma estructurada la informacion recopilada.
3. **Procesamiento:** convierte esa entrada de datos en una forma más significativa (informacion).
4. **Distribución:** transfiere la informacion procesada a las personas o roles que la usarán.

~~~
DATOS != INFORMACION
~~~

# Sistema WEB

>Un sistema WEB es un sistema diseñado y desarrollado para que funcione a través de **internet**

- Están basados en una arquitectura **cliente - servidor**.
- Utilizan tecnologías WEB para entregar informacion a otros usuarios o sistemas.

# Arquitectura Cliente - Servidor

>Es la **arquitectura preponderante** en la WEB
>Los sistemas web funcionan sobre una arquitectura cliente-servidor

En este tipo de interacción, el usuario **(cliente)** realiza **peticiones (http request)** a un programa remoto **(servidor)**, quien devolverá a cambio una **respuesta (http response)**.

### Una arquitectura WEB cuenta con:
- **Cliente:** realiza peticiones al servidor.
- **Servidor:** administra y responde las peticiones de clientes o de otros servidores.
- **Protocolo HTTP:** es el **protocolo de comunicacion** entre Cliente y Servidor (basado en TCP/IP)

| Client | Server |
|--------|--------|
|Inicia las solicitudes **(HTTP REQUEST)** espera y recibe las respeustas del servidor.|Esperan a que lleguen las solicitudes de los clientes.|
|Interactúa, en general, mediante una interfaz gráfica con el usuario.| Tras la recepción de una solicitud, la procesan y luego envían la respuesta al cliente. **(HTTP RESPONSE)**|

## Arquitectura de un sistema

La **Arquitectura del Sofware** es el diseño de mas alto nivel de la estructura de un sistema.
>Una **Arquitectura** consiste en un conjunto de **patrones** y **abstraciones** coherentes que proporcionan un marco definido y claro para interactuar con el código fuente del **software**

## Diseño de una Arquitectura

- La **arquitectura** le da la estructura a la aplicación
- Permite analizar y diseñar (sin programar) los principales problemas que podemos tener en nuetra aplicacion
    - No es lo mismo que la arquitectura de **WhatsApp** que la de **Dropbox**
- Debe asistir a los servicios/funcionalidad que debe cumplir us sistema (requerimientos funcionales) teniendo en cuenta cuestriones que hacen a la operación (requerimientos no funcionales).

# Protocolo HTTP
>Hay que definirlo

# Pagina Estatica vs Pagina Dinamica

### Ejemplo Pagina Estatica
**paginaEstatica.html**
~~~
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejemplo pagina estatica</title>
</head>
<body>
   <h1>Hola Mundo!</h1>
   <p>Esta es una pagina estatica</p>
</body>
</html>
~~~

### Ejemplo Pagina Dinamica
**paginaDinamica.php**
~~~
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejemplo pagina dinamica</title>
</head>
<body>
   <?php
       $titulo = "Hola Mundo!";
       echo "<h1>" . $titulo . "</h1>";
       $subtitulo="Esta es una pagina dinamica";
       echo "<p>" . $subtitulo . "</p>";
   ?>
</body>
</html>
~~~

## Qué hace un servidor WEB?
Hoy en día, la mayoria de los servidores web permiten que en cada petición se ejecute un programa que genera **dinámicamente** el recurso que se envía al usuario (server-side scripting).

- el contenido dinámico se genera con la información de una base de datos por ejemplo.
- procesan información que les llega del mismo (autenticación, formulario, upload archivos).

Esta funcionalidad permite el desarrollo de **sistemas web** completos.

### APACHE
- Lanzado en 1995 y desarrollado por la Apache Sofware Fundation, hoy en día es el servidor más popular
- Es un servidor web multiplataforma y con una licencia de Sofware Libre (Apache License)
- Esta implementado en C
- Su nombre completo es Apache HTTP Server Project.

### Todas las páginas web se generan igual?

Esta discusión actualmente se ve en los sitios WEB. Existen dos formas de hacerlo
- **Server Side Rendering:** El servidor envía el HTML completo o parcial del sitio
- **Client Side Rendering:** El servidor envía datos (JSON, XML) y el cliente los procesa y renderiza el HTML en la página

Existen casos híbridos, donde se baja el HTML completo inicialmente (procesado en el servidor) pero luego se actualiza mediante AJAX.