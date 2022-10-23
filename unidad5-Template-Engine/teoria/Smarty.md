# Templates engine
### Indice
- [Templates engine](#templates-engine)
    - [Ventajas](#ventajas)
    - [¿A que llamamos logica?](#¿a-que-llamamos-lógica)
- [Smarty](#smarty)
    - [Usar Smarty](#usar-smarty)
    - [Como lo uso](#¿cómo-lo-uso)
    - [Sintaxys de template](#sintaxys-de-template)
    - [Caracteristicas](#caracteristicas)

# Templates Engine

Son herramientas que se utilizan para separar la **logica del programa** y la **presentacion del contenido** en dos partes independientes.

## Ventajas

- Facilita el desarrollo tanto de la logica como de la presentacion.
- Mejora la flexibilidad.
- Facilita la modificacion y el mantenimiento.
- Facilita la separacion de lenguajes (HTML y PHP).

## ¿A que llamamos Lógica?

La logica de una aplicacion es la parte del codigo que realiza todo lo referido a la obtencion, almacenamiento y procesamiento de los datos para entregarlos a la vista que sabe como visualizarlos.

Se dice que es el "detras de escena" necesario para poder presentar los datos en pantalla.

# Smarty

Smarty es un motor de plantillas para PHP.
- Es rapido y eficiente.
- La plantilla es compilada solo una vez.

Smarty usa una combinacion de etiquetas HTML y **etiquetas de plantilla** para formatear la presentacion del contenido.
- **Etiquetas de plantilla** -> itulizan el formato de **{tags}**
- La idea siempre es:
    - Mantener separada la presentacion (menor acoplamiento posible).
    - Mismo objetivo que CSS separado del HTML!!
    - El menor oberhead posible.

## Usar Smarty

| Crear la logica de la aplicacion | Crear el template de presentacion |
|----------------------------------|-----------------|
| Obtiene la informacion (BBDD, files, etc), se procesa y se asigna el contenido a mostrar en variables. | Recibe la informacion y se muestra mediante una combinacion de tags html y tags de plantillas.|
| **.PHP** | **.TPL** |
| No tiene informacion de como va a ser mostrado el contenido | No se encarga de obtener ni procesar el contenido |

## ¿Cómo lo uso?

1. **Lo descargo e incluyo en mi sitio**
    - [Link](https://www.smarty.net/download)
2. **Lo incluyo**
    ~~~ php
    require_once('libs/smarty{version}/Smarty.class.php')
    ~~~
3. **Lo instancio**
    ~~~ php
    $smarty = new Smarty();
    ~~~
4. **Creo el template**
    - templates/animales.tpl
5. **Asigno variables**
    ~~~ php
    $smarty->assign('titulo', "Lista de mamiferos");
    $smarty->assign('animales', $mamiferos);
    ~~~
6. **Renderizo el template**
    ~~~ php
    $smarty->display('templates/animales.tpl')
    ~~~

## Sintaxys de template

~~~ html
<h1>{$titulo}</h1>
<table>
    {foreach $animales as $animal}
    <tr>
        <td>{$animal->nombre}</td>
        <td>{$animal->peso}</td>
        <td>{$animal->tamanio}</td>
    </tr>
    {/foreach}
</table>
~~~

Incluir plantillas dentro de plantillas
~~~ html
{include file="header.tpl"}
<h1>{$titulo}</h1>
<table>
    ...
</table>
{include file="footer.tpl"}
~~~

## Caracteristicas

Smarty se enfoca en tener
- Plantillas rapidas
- Poco codigo
- Mantenibles

Smarty ofrece uan enorme cantidad de funciones y herramientas para facilitarle el trabajo al desarrollador.