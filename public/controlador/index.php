<?php
  session_start();
  $usuarioEncontrado = FALSE;
    if($_POST){
    if($_POST['inicioSesion']){
      $correo = ($_POST['correo']);
      $contrasena = ($_POST['contrasena']);

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "restaurantes1";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT usu_codigo, usu_correo, usu_clave, usu_rol FROM usuario WHERE usu_correo='$correo' AND usu_clave='$contrasena'";
      //echo $sql;

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $usuarioEncontrado = TRUE;
          //echo "id: " . $row["id"]. " " . $row["correo"]. " " . $row["contrasena"]. " " . $row["rol"] . "<br>";
          $sqlconsulta = "SELECT nombre FROM cliente WHERE usu_codigo=' $row[usu_codigo] '";
          $_SESSION['Inicio'] = $row["usu_codigo"];
        }
      } else {
        //echo "0 results";
      }
      mysqli_close($conn);
      echo $_SESSION['Inicio'];
    }
}
       
?>


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../../css/estilosf.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <br>
    <br>
  </head>
  
  <style>
    
    body {
      display: flex;
      justify-content: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
      text-align: center;
    }
  </style>

<body >
<main >
  <form method="post" action="" class="formulario">
    <h1 >Inicia sesión</h1>
    <?php 
            if ($usuarioEncontrado){
                echo '<div class="alert alert-dark" role="alert">
                Usuario:' . $correo . '<br>Inició sesión correctamente!
                </div>';
                header("Location: ../vista/principal.php");
            }
            if($_POST && !$usuarioEncontrado){
                echo '<div class="alert alert-dark" role="alert">
                Ingrese nuevamente sus datos<br>Si no tiene una cuenta puede registrarse.
                </div>';
            }
    ?>


<div class="input-contenedor">
    <i class="fas fa-envelope icon"></i>
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" size="50" name="correo"> 
     </div>

    <div class="input-contenedor">
    <i class="fas fa-key icon"></i>
      <input type="password" class="input-contenedor" id="floatingPassword" placeholder="Password" name="contrasena"> 
      </div>

    
    <a href="Principal/Principal.php"><input type="submit" value="Iniciar Sesión"  id="inicioSesion" class="button" name="inicioSesion"></a>
    <p></p>
    
    

    <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
         <p>¿No tienes una cuenta? </p>
         <a href="../vista/registrar_cliente.html" class="link">Registrar Cliente</a>
         <br>
    <a href="../vista/registar_restaurante.html" class="link">Registrar Restaurante</a>
  </form>
</main>


</body>
    

</html>