<?php
    require 'MVC/Controller/SessionController.php';
    $is = new SessionController();

    if(empty($_SESSION['nombre'])){

        $is->redirect();
        $usuario_logeado = "";
 
    }else{
        $usuario_logeado = $_SESSION['nombre'];
        $flag = 1;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Vacunacion - Grupo 6</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--JQuery y Datatable.js-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    
    <header>
        <section id = "header">
            <a id = "logo" href="#">LOGO</a>
            <nav class = "nav-bar">
                <ul id="nav-item">
                    <li><a id = "inicio" href="#">Inicio</a></li>
                    <li><a href="#">Verificar</a></li>
                    <li><a href="#">Acerca de nosotros</a></li>
                </ul>
            </nav>
            <ul>
 
                <li><a href="#"><i class="fas fa-sign-in-alt"></i><?php echo "".$usuario_logeado?></a></li>
            </ul>
        </section>        
        <div id="triangulos"></div>
    </header>

    <h1>Lista</h1>

    <div id = "header">
        <ul class= "nav">
            <li><a href="">Inicio</a></li>

            <li><a href="">Solo Administradores</a>
                <ul>
                    <li><a href="MVC/Controller/HospitalController.php?action=registrar_hospital">Registrar hospital</a></li>
                    <li><a href="MVC/Controller/PacienteController.php?action=registrar_paciente">Registrar paciente</a></li>
                    
                </ul>
            </li>

            <li><a href="">Pruebas</a>
                <ul>
                    <li><a href="MVC/Controller/UsuarioController.php?action=hospitales">Listar Hospitales</a></li>
                    <li><a href="MVC/Controller/UsuarioController.php?action=test">Test</a></li>
                    <li><a href="MVC/Controller/UsuarioController.php?action=lista_general">Lista General</a></li>
                </ul>
            </li>

            <li><a href="">Iniciar Session</a>
                <ul>
                    <!-- <li><a href="View/Usuario/LoginView.php">Inicio de sesion para clientes.</a></li> -->
                    <li><a href="MVC/Controller/UsuarioController.php?action=login">Inicio de sesion para administradores.</a></li>
                    
                    <li><a href="MVC/Controller/UsuarioController.php?action=logout">Cerrar Session</a></li>
                </ul>
            </li>

            <li><a href="">Registrarse</a>
                <ul>
                    <li><a href="MVC/Controller/UsuarioController.php?action=registrar">Registro para administradores.</a></li>
                </ul>
            </li>
        </ul>
    </div>



    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel ratione expedita mollitia iusto sapiente. Blanditiis eum temporibus delectus minus quae? Voluptatibus minima facere labore expedita eligendi ad culpa asperiores voluptatum?
    Id, beatae. Error voluptatum voluptas itaque voluptatem eius. Similique libero maxime quos quae vel ipsam est, unde eveniet? Repudiandae accusantium ipsum ex totam, aperiam sit sequi! Doloremque nemo iste quibusdam.
    Quidem distinctio non fuga deserunt architecto esse enim illum et mollitia dicta ab harum quod, facere culpa qui nostrum ducimus? Soluta vitae quisquam voluptate aspernatur laudantium suscipit veniam eos aut.
    Explicabo nam distinctio amet perspiciatis beatae nihil necessitatibus aspernatur officiis, rem similique eum quis corporis voluptatibus hic autem repudiandae soluta doloremque. Earum nam nihil sint mollitia?
    Et, recusandae culpa voluptatem architecto distinctio nam velit qui odit, minima similique nisi. Eos aperiam culpa similique et animi quis aliquid dolor quisquam sunt, ipsum ut optio laudantium. Quidem, dolorem.
    Facere, alias ipsa consectetur accusantium repudiandae aperiam earum officia velit deserunt mollitia atque adipisci impedit. Sint quaerat praesentium laborum inventore deleniti iure quo beatae dignissimos sed corporis. Neque, repellendus sint.
    Incidunt quos magnam nobis nisi placeat quibusdam quo magni facere id sit repellat animi fugit deserunt inventore laboriosam distinctio, error quas! Natus labore ut aliquid vitae vero temporibus exercitationem itaque?
    Id officiis, aspernatur explicabo culpa esse facere, illum tempore ducimus quos veritatis vero quam molestiae deserunt harum sint, ipsam accusantium? Deserunt, veritatis. Unde consectetur repellendus minus reiciendis, cumque necessitatibus cum!
    At vero modi ipsum! Dolor cum voluptas minus quisquam praesentium voluptatum maxime aspernatur qui, numquam totam, quam ut aut ex vero optio odio dicta nisi, iusto quo! Qui, ea illum?
    Quo ab deleniti expedita magnam praesentium deserunt quia nostrum repellendus est libero suscipit, quos laboriosam recusandae qui, doloribus facilis ipsum sunt dolorem? Consequuntur deleniti quas enim rerum minus, doloribus quis.
    Nihil alias ad impedit, aliquam aut possimus. Molestiae velit optio vitae harum repellat dolores aut tempora alias quae quo numquam cum eaque reprehenderit rem tenetur consectetur eius quam, eum porro.
    Quaerat fugiat, ut dolorum maiores debitis veniam quas, neque corporis aperiam error quisquam asperiores quae tempora ullam, tempore quibusdam fuga nihil recusandae iste vitae. Fuga optio nihil deserunt sapiente recusandae?</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel ratione expedita mollitia iusto sapiente. Blanditiis eum temporibus delectus minus quae? Voluptatibus minima facere labore expedita eligendi ad culpa asperiores voluptatum?
  
    <div id="lista"></div>

    <!--Tabla de Prueba-->
    <div class="table-responsive" style="padding: 10%;">
        <table id="data" class="table">
            <thead>
                <tr>
                  <th class="th-sm">ID
            
                  </th>
                  <th class="th-sm">Nombre
            
                  </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>D</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
    <footer><div>Copyright 2020 AmezagaCode | Todos los derechos reservados</div></footer>
    <script src="../JS/script.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"></script>

</body>
</html>