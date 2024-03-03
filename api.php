<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random User Generator</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 20px;
            background-color: antiquewhite;
            color: #000;
        }
        p {           
            font-size: 20px;
            font-style: italic;
        }
        img {
            border-radius: 50%;
        }
        #name {
            font-size: 25px;
            font-weight: bold;
        }        
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            //Cada 5 segundos se ejecutará la función refrescar
            setTimeout(refrescar, 5000);
            });
            
            function refrescar(){
                //Actualizar la página
                location.reload();
            }
    </script>
</head>
<body>
    <h1>Random User Generator</h1>
    <?php
        // Realizamos la petición a la API que nos devuelve datos sobre usuarios en JSON
        $datos = file_get_contents('https://randomuser.me/api/');
        // Decodificamos JSON en un objeto
        $jsonData = json_decode($datos);
        // Obtenemos los datos del primer usuario
        $usuario = $jsonData->results[0];
    ?>
        <!-- Mostramos la información -->
    <div>
        <img id="picture" alt="user picture" width="170" height="170" src='<?php echo $usuario->picture->large; ?>'>
    </div>
    <p id="name"><?php echo "{$usuario->name->title} {$usuario->name->first} {$usuario->name->last}"; ?>
    <p id="location">Location: <?php echo "{$usuario->location->street->number} {$usuario->location->street->name}, {$usuario->location->city}, 
        {$usuario->location->state}, {$usuario->location->country}, {$usuario->location->postcode}"; ?></p>
    <p id="email">Email: <?php echo $usuario->email; ?></p>
    <p id="phone">Phone: <?php echo $usuario->phone; ?></p>
    <p id="username">Username: <?php echo $usuario->login->username; ?>
    <p id="password">Password: <?php echo $usuario->login->password; ?>
</body>
</html>

