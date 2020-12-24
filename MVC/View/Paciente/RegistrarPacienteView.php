<h1>REGISTRAR PACIENTE</h1>
    <form action="../Controller/PacienteController.php" method="POST">

        <input name="Dni_Paciente" type="text" placeholder="Ingrese dni del paciente"><br>

        <input name="Paterno_Paciente" type="text" placeholder="Ingrese apellido paterno"><br>

        <input name="Materno_Paciente" type="text" placeholder="Ingrese apellido materno"><br>

        <input name="Nombres_Paciente" type="text" placeholder="Ingrese nombres"><br>

        <input name="Categoria_Paciente" type="text" placeholder="Ingrese numero de categoria"><br>

        <input name="Estado_Paciente" type="text" placeholder="Ingrese el estado"><br>

        <input type="hidden" name="action" value="registrar_paciente">

        <input type="submit" value="Aceptar">
    </form>