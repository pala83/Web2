1. Cual de estas son ventajas de trabajar con Smarty?
    - Separar la lógica de los datos de la presentación de los mismos
    - Reutilizar codigo HTML
    - Que el diseñador grafico puede trabajar en paralelo con el desarrollador
2. Cual de las siguientes configuraciones de .gitignore es mas apropiada para conservar nuestro desarrollo de plantillas .tpl y no registrar archivos innecesarios:
> templates_c/

3. En el siguiente método PHP, que código se necesita en la línea 2:
~~~ php
1: public function mostrarElemento($elemento) {
2:  ?
3:
4:   $smarty->assign('arbol', $elemento);
5:
6:   $smarty->display('elemento.tpl');
7:
8: }
~~~
> $smarty = new Smarty();

4. Para el siguiente código de plantilla Smarty, que recoree una lista $elemento.
~~~ php
{foreach ?}
    <li>Elemento {$elemento}</li>
{/foreach}
~~~
Cual es la forma correcta de definir el foreach ?
> foreach $elementos as $elemento