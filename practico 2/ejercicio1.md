# 1.¿Para que se utiliza el **ruteo** en una aplicación web?

* Genera una capa de abstraccion entre las funcionalidades de la aplicacion y las peticiones del usuario.
  * Permite configurar la aplicacion para que acepte __URL's__ que no mapean necesariamente con un archivo fisico.
  * __Archivo != URL__
  * Cada __URL__ se enruta a un __componente central de codigo__ encargado de manejarlas
* Las URL tienen significado y ayudan a los usuarios a decidir si la pagina que se cargara al pulsar sobre un enlace contiene lo que esperan.
* Ayuda a la aplicacion a tener mas robustez, ocultando datos innecesarios que son enviados mediante la URL y aportando una mejor visibilidad de la organizacion de la aplicacion
