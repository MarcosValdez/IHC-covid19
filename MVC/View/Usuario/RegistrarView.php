<h1>REGISTRAR ADMINISTRADOR</h1>
    <form action="../Controller/UsuarioController.php" method="POST">

        <input name="Apellido_Paterno" type="text" placeholder="Ingrese su apellido paterno"><br>
        <input name="Apellido_Materno" type="text" placeholder="Ingrese su apellido materno"><br>
        <input name="Nombres" type="text" placeholder="Ingrese su nombre"><br>
        <input name="Email" type="text" placeholder="Ingrese su email"><br>

        <input name="Password" type="password" placeholder="Ingrese una contraseña"><br>
        <input name="Password_Confirmacion" type="password" placeholder="Vuelva a ingresar la contraseña"><br>

        <input type="hidden" name="action" value="signup">

        <input type="submit" value="Aceptar">
    </form>