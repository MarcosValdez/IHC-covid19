<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Mi Técnico Perú</title>
</head>
<body>

    <div id = "header">
        <ul class= "nav">
            <li><a href="">Inicio</a></li>

            <li><a href="">Clientes</a>
                <ul>
                    <li><a href="">Ficha Clientes</a></li>
                    <li><a href="">Ficha Clientes2</a></li>
                    <li><a href="">Ficha Clientes3</a></li>
                </ul>
            </li>

            <li><a href="">Tecnicos</a>
                <ul>
                    <li><a href="">Ficha Clientes</a></li>
                    <li><a href="">Ficha Clientes2</a></li>
                    <li><a href="">Ficha Clientes3</a></li>
                </ul>
            </li>

            <li><a href="">Iniciar Session</a>
                <ul>
                    <!-- <li><a href="View/Usuario/LoginView.php">Inicio de sesion para clientes.</a></li> -->
                    <li><a href="http://localhost/MVC/Controller/UsuarioController.php?action=login">Inicio de sesion para clientes.</a></li>
                    <li><a href="">Inicio de sesion para técnicos.</a></li>
                </ul>
            </li>

            <li><a href="">Registrarse</a>
                <ul>
                    <li><a href="Controller/UsuarioController.php?action=registrar">Registro para clientes.</a></li>
                    <li><a href="">Registro para técnicos.</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <BR></BR>
    <BR></BR>

    <h1>Modelo MVC</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

    
    <?php   
        //require_once("Controller/TecnicosController.php");

        //require_once("View/LoginView.php");
    ?>

</body>
</html>