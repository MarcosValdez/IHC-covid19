<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Login.css">
    <title>Document</title>
</head>
<body>
  <h2>Login</h2>
    <form action="UsuarioController.php" method="POST">

        
                <input type="text" placeholder="Email" name="Email" />
                <input type="password" placeholder="Password" name="Password" />
 
                <input type="hidden" name="action" value="login">

                <input type="submit" value="Ingresar">
  </form>

</body>
</html>

