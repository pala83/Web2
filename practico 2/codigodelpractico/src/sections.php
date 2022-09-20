<?php

function showHome() {
    include_once "templates/header.php";
    echo '
        <form id="form-calc" method="GET" >
            <input type="number" name="numero1">
            <select name="op">
                <option value="sumar">+</option>
                <option value="restar">-</option>
                <option value="multiplicar">*</option>
                <option value="dividir">/</option>
            </select>
            <input type="number" name="numero2">
            <input type="submit" value="=">
            <span id="resultado"></span>    
        </form>';
    include_once "templates/footer.php";
}

function showPi(){
    include_once "templates/header.php";
    $pi = M_PI;

    echo "<h1>Acá el numero pi</h1>";
    echo "<p>PI = $pi</p>";
    include_once "templates/footer.php";
}

function showAbout($desarrollador = null) {
    include_once "templates/header.php";
    if (isset($desarrollador)) {
    echo "<h1>Acerca de $desarrollador</h1>";
    echo "<img src='img\dev.jpg'>";
    } else {
        echo "<h1>Este es about general: Calculadora de la materia Web 2 </h1>";
        echo "<img src='img\about.jpg'>";
    }
    include_once "templates/footer.php";

}