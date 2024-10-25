<?php

    $imagenSubida;
    $imagenError = "Error al subir la imagen";

    function getNombre(){
        return $_POST['Nombre'];
    }

    function getAlias() {
        return $_POST['Alias'];
    }

    function getEdad() {
        return $_POST['Edad'];
    }

    function getImagen() {

        $upload = 'uploads/';

        if ($_FILES['Imagen']['error'] !== UPLOAD_ERR_OK) {
            $uploadFile = $upload."error.png";
        } else {
            $uploadFile = $upload.basename($_FILES['Imagen']['Nombre']);
        }

        move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFile);

        return $uploadFile;
    }

    function getArmas() {
        $contadorArmas = 0;
        $resu = "";

        if(isset($_POST["Arma"])) {
            foreach ($_POST["Arma"] as $item) {
                ($contadorArmas == 0)? $resu = $item: $resu .= "$item";
                $contadorArmas++;
            }
        }

        return $resu;
    }

    function getArtesMagicas() {
        return $_POST['ArtesMagicas'];
    }

    function getHTML($nombre, $alias, $edad) {
        return '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                    </head>
                    <body>
                        <div class="titulo">
                            <h2>Datos del Jugador</h2>
                        </div>

                        <div class="datos">
                            <div class="info" id="info">
                                <p>Nombre: '.$nombre.'</p>
                                <p>Alias: '.$alias.'</p>
                                <p>Edad: '.$edad.'</p>
                                <p>Armas seleccionadas: '.getArmas().'</p>
                                <p>¿Practica artes mágicas '.getArtesMagicas().'</p>
                            </div>

                            <div class="imagen">
                                <img src= '.getFile().'
                            </div>
                        </div>
                    </body>
                    </html>';
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include 'captura.html';
    }else{
        $nombre = getNombre();
        $alias = getAlias();
        $edad = getEdad();
        $htmlContent = getHTML($nombre, $alias, $edad);
        echo $htmlContent;
    }
?>
