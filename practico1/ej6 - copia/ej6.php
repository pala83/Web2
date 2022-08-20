<link rel="stylesheet" href="estilo.css">

<table>
    <tbody>
        <?php
            require_once 'MatrizMultiplicar.php';

            echo(matriz($_REQUEST['tam']));

        ?>
    </tbody>
</table>

<a href="index.html"><-volver atras</a>