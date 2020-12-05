<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <tr><td>NOMBRE DEL ARTICULO</td>
    <?php
        foreach($matrizTecnicos as $registro){
            echo "<tr><td>" . $registro["VCH_TECNOMBRES"] . "</td></tr>";

        }
    ?>
</table>
<br>
<br>

<table>
    <tr><td>TECNICOS POR ESPECIALIDAD</td>
    <?php
        foreach($matrizTecnicos2 as $registro2){
            echo "<tr><td>" . $registro2["INT_TECID"] . "</td></tr>";

        }
    ?>
</table>

</body>
</html>