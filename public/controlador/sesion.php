<?php
  session_start();
  
  include '../../config/conexionBD.php';
    $correo = ($_POST['correo']);
      $contrasena = ($_POST['contrasena']);

      $sql = "SELECT id, correo, contrasena, rol FROM usuario WHERE correo='$correo' AND contrasena='$contrasena'";

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $usuarioEncontrado = TRUE;
          //echo "id: " . $row["id"]. " " . $row["correo"]. " " . $row["contrasena"]. " " . $row["rol"] . "<br>";
          $sqlconsulta = "SELECT nombre FROM cliente WHERE usuario_id=' $row[id] '";
          $_SESSION['Inicio'] = $row["id"];
        }
      } else {
        //echo "0 results";
      }
      mysqli_close($conn);
      //echo $_SESSION['Inicio'];
    
?>