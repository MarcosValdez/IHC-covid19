<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--JQuery y Datatable.js-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>


<div class="table-responsive" style="padding: 10%;">
<!--
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
                    <td><?php echo "".$ID_ENVIO  ?></td>
                    <td><?php echo "".$NOMBRE_ENVIO   ?></td>
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
        </table> -->
        <table id="data" class="table">
            <thead>
                <tr>
                    <th class="th-sm">ID</th>

                    <th class="th-sm">NOMBRE</th>

                    <th class="th-sm">DIRECCION</th>

                    <th class="th-sm">DISTRITO</th>

                    <th class="th-sm">ID TELEFONOS</th>
                </tr>
            </thead>

            <?php
            foreach($matriz as $registro){
                echo 
                "<tr>
                    <td>" . $registro["INT_HOSPID"] . "</td>
                    <td>" . $registro["VCH_HOSPNOMBRE"] . "</td>
                    <td>" . $registro["VCH_HOSPDIRECCION"] . "</td>
                    <td>" . $registro["VCH_HOSPDISTRITO"] . "</td>
                    <td>" . $registro["INT_HOSPTELEFONOS_ID"] . "</td>
                </tr>";

            }
            ?>

        </table>
    </div>

</body>
</html>




