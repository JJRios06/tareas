<?php

    define("uno", "&#9856");
    define("dos", "&#9857");
    define("tres", "&#9858");
    define("cuatro", "&#9859");
    define("cinco", "&#9860");
    define("seis", "&#9861");

    $dados[] = [
        1 => uno,
        2 => dos,
        3 => tres,
        4 => cuatro,
        5 => cinco,
        6 => seis
    ];

    $jugador1;
    $jugador2;
    $resultado1;
    $resultado2;

    function valores_dados(&$array, &$jugador){
        $resultado ="";

        for($cont = 1; $cont < 6; $cont++){

            $aleatorio = random_int(1,6);
            $valorDado = $array[0][$aleatorio];
            $resultado = "$resultado &nbsp;".$valorDado."&nbsp;";
            $jugador[] = $aleatorio;
        }
        return $resultado;
    }

    function resultado(&$jugador, &$restultadojugador){
        $suma = 0;
        for ($cont = 0; $cont <sizeof($jugador); $cont++){
            if (!($cont == 0 || $cont == (sizeof($jugador) -1))){
                $suma += $jugador[$cont];
            }
        }

        $restultadojugador = $suma;
        return $suma;
    }

    function ganador ($jugador1, $jugador2){
        if ($jugador1 == $jugador2){
            return "Ha sido empate";
        } else {
            return ($jugador1 > $jugador2) ?"Ha ganado el jugador 1":"Ha ganado el jugador 2";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea Dados</title>
    <style>
            h1{
                font-size: 3rem;
            }

            h3{
                font-size: 2rem;
            }
            .tabla{
                flex-direction: column;
            }

            .modelo{
                display: flex;
                align-items: center;
            }

            .dados1{
                background-color: red;
                padding: 2rem 1rem;
                font-size: 3rem;
            }

            .dados2{
                background-color: blue;
                padding: 2rem 1rem;
                font-size: 3rem;
            }
            
            p{
                font-size: 2rem;
            }

            b{
                font-size: 2rem;
            }
        </style>
</head>
<body>

    <h1>Cinco dados</h1>
    <h3>Actualice la página para mostrar una nueva tirada</h3>
    
    <div class="tabla">
        <div class="modelo">
            <b>Jugador 1 &nbsp;&nbsp;&nbsp;</b>
            <p class="dados1"><?php echo valores_dados($dados, $jugador1);?></p>&nbsp;&nbsp;&nbsp;
            <b><?php echo resultado($jugador1,$resultado1);?> puntos</b>
        </div>

        <div class="modelo">
            <b>Jugador 2 &nbsp;&nbsp;&nbsp;</b>
            <p class="dados2"><?php echo valores_dados($dados,$jugador2);?></p>&nbsp;&nbsp;&nbsp;
            <b><?php echo resultado($jugador2,$resultado2);?> puntos</b>
        </div>
        <div>
            <b>Resultado </b><span><?php echo ganador($resultado1,$resultado2);?></span>
        </div>
    </div>
</body>
</html>
