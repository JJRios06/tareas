<?php

define ('PIEDRA1',  "&#x1F91C;");
define ('PIEDRA2',  "&#x1F91B;");
define ('TIJERAS',  "&#x1F596;");
define ('PAPEL',    "&#x1F91A;" );

    $opciones= rand(1,4);
    if($opciones == 1) {
        $jugador1 = PIEDRA1;
    } else if ($opciones== 3){
        $jugador1 =TIJERAS;
    } else{
        $jugador1 =PAPEL;
    }

    $opciones = rand(1,4);
    if ($opciones == 1) {
        $jugador2 = PIEDRA2;
    } else if ($opciones== 3){
        $jugador2 = TIJERAS;
    } else {
        $jugador2 = PAPEL;
    }

    if ($jugador1 == $jugador2 || $jugador1 == PIEDRA1 && $jugador2 == PIEDRA2) {
        $resultado= 'Empate';
    } else if (($jugador1 == PIEDRA1 && $jugador2 == TIJERAS) ||
        ($jugador1 == PIEDRA2 && $jugador2 == TIJERAS) ||
        ($jugador1 == PAPEL && $jugador2 == PIEDRA1) ||
        ($jugador1 == PAPEL && $jugador2 == PIEDRA2) ||
        ($jugador1 == TIJERAS && $jugador2 == PAPEL)) {
            $resultado = 'Ha ganado el jugador 1';
        } else {
            $resultado = 'Ha ganado el jugador 2';
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>piedrapapeltijera</title>
</head>
<body>
    
    <h1>¡ Piedra, papel, tijera !</h1>
    <h3>Actualice la página para mostrar otra partida</h3> 
    
    <table>
        <tr style="font-size: 25px;">
            <th>Jugador 1</th>
            <th>Jugador 2</th>
        </tr>
        <tr>
            <td><span style="font-size: 7rem"><? = $jugador1 ?></span></td>
            <td><span style="font-size: 7rem"><? = $jugador2 ?></span></td>
        </tr>
        <tr style="font-size: 25px;">
            <th colspan="2"><? = $resultado ?></th>
        </tr>
    </table>


</body>
</html>
