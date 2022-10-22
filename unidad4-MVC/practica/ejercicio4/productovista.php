<?php

class productovista{
    function renderProducto($nombre, $productos){
?>
    <h1>Lista de <?php echo($nombre); ?>s:</h1>
    <a href="home"><---volver</a>
    <div class="container-fluid">

        <?php
        foreach($productos as $producto){
        ?>
            <div class="card" style="width: 18rem;">
                <img src="assets/<?php echo($producto->nombre); ?>.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo($producto->nombre); ?> </h5>
                    <p class="card-text"><?php echo($producto->precio); ?></p>
                    <a href="#" class="btn btn-primary">mas info+</a>
                </div>
            </div>
        <?php 
        }
        ?>

    </div>
    <?php
    }
    function renderError() {
        echo "<h2>Error! Género no especificado.</h2>";
    }
}
?>