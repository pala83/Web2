<?php

function showTabla($def = null){
    require "templates/head.php";
    if($def != null){?>
        <table>
            <tbody>
            <?php
                require_once 'MatrizMultiplicar.php';
                echo(matriz($def));
            ?>
        </tbody>
        </table>
    <?php 
    }
    require "template/footer.html";
}
?>