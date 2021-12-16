<?php
    $db_servername="localhost";
    $db_username="root";
    $db_password="";
    $db_name="restaurantes1";

    $conn=new mysqli($db_servername,$db_username,$db_password,$db_name);
    // $conn->set_charset("utf8");

    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }else{
        // echo"<p> Conexión exitosa!!</p>";
    }

  session_start();
  var_dump($_POST);
  include '../../config/conexionBD.php';
  $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
  $contrasena = isset($_POST["clave"]) ? trim($_POST["clave"]) : null;

      $sql = "SELECT usu_codigo, usu_correo, usu clave, usu_rol FROM usuario WHERE usu_correo='$correo' AND usu_contrasena='$contrasena'";

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          //echo "id: " . $row["id"]. " " . $row["correo"]. " " . $row["contrasena"]. " " . $row["rol"] . "<br>";
          $sqlconsulta = "SELECT nombre FROM cliente WHERE usu_codigo=' $row[id] '";
          $_SESSION['Inicio'] = $row["id"];
        }
      } else {
        echo "0 results";
      }
      mysqli_close($conn);
      //echo $_SESSION['Inicio'];

?>