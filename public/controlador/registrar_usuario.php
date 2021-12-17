
 <?php           
            include '../../config/conexionBD.php';
            $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null; 
            $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
            $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null; 
            $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
            $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null; 
            $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
            $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
            $last_id= "";

            $sql = "INSERT INTO usuario (usu_correo, usu_clave, usu_rol) VALUES ( '$correo', '$contrasena', 'C')";

            //echo $sql;

            if ($conn->query($sql) === TRUE) {
                $last_id = $conn -> insert_id;
                echo "New record created successfully";
                $registroCreado = TRUE;
                echo "New record created successfully. Last inserted ID is: " . $last_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

$sql = "INSERT INTO cliente (cli_cedula, cli_nombre, cli_apellido, cli_direccion, cli_telefono, cli_correo, cli_clave, usu_codigo) 
VALUES ('$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', '$contrasena', $last_id )";

            if ($conn->query($sql) === TRUE) {
                echo $last_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }


            $conn->close();
            header("Location:../controlador/index.php");
?>