4.*Diseñe la __Tabla de ruteo__ para la siguiente funcionalidad de un sstema Web. No es necesario __implementar nada__, simplemente definir las acciones del router.*
1. Obtener la lista de usuarios del sistema
2. Agregar un nuevo usuario
3. Ver la informacion de un usuario dado su DNI


## Tabla de ruteo

| Accion(URL)    | Destino        |
|--------------------|----------------|
| /usuarios          | showList();    |
| /usuarios/register | register();    |
| /usuarios/:dni     | showUser(:dni);|
