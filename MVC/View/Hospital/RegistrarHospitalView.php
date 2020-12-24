<h1>REGISTRAR HOSPITAL</h1>
    <form action="../Controller/HospitalController.php" method="POST">

        <input name="Nombre_Hospital" type="text" placeholder="Ingrese nombre del hospital"><br>

        <input name="Direccion_Hospital" type="text" placeholder="Ingrese la direccion del hospital"><br>

        <input name="Distrito_Hospital" type="text" placeholder="Ingrese el distrito"><br>

        <input name="Id_Telefonos_Hospital" type="text" placeholder="Ingrese id de telefonos"><br>

        <input type="hidden" name="action" value="registrar_hospital">

        <input type="submit" value="Aceptar">
    </form>