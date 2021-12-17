<?php           
            
            include '../../config/conexionBD.php';
            
            $nombres = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
            $direcciones = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
            $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null; 
            $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
            $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
            $last_id= "";
            $rol= "";

            $sql = "INSERT INTO usuario (usu_correo, usu_clave, usu_rol) VALUES ( '$correo', '$contrasena', 'R')";


            //echo $sql;

            if ($conn->query($sql) === TRUE) {
                $last_id = $conn -> insert_id;
                echo "New record created successfully";
                $registroCreado = TRUE;
                echo "New record created successfully. Last inserted ID is: " . $last_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $sql = "INSERT INTO restaurante (res_nombre, res_direccion, res_telefono, usu_codigo) 
            VALUES ('$nombres', '$direcciones', '$telefono', $last_id )";

            if ($conn->query($sql) === TRUE) {
                echo $last_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }


            $conn->close();
            header("Location:../controlador/sesion.php");
?>