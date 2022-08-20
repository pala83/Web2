<link rel="stylesheet" href="estilo.css">

<table>
    <tbody>
        <?php
            $tamano = $_REQUEST['tam'];
            function celdas($valor, $tam){
                $retorno = "";
                for($j=1; $j<=$tam; $j++){
                    if($valor==$j){
                        $retorno .= '<td class="resaltado">'.$valor*$j."</td>";
                    }
                    elseif($j==1 || $valor==1){
                        $retorno .= '<td class="externo">'.$valor*$j."</td>";
                    }
                    else{
                        $retorno .= '<td class="interno">'.$valor*$j."</td>";
                    }
                }
                return $retorno;
            }

            for($i=1; $i<=$tamano; $i++){
                echo("<tr>");
                echo(celdas($i, $tamano));
                echo("</tr>");
            }
        ?>
    </tbody>
</table>