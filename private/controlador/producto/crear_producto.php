<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Crear Nuevo Usuario</title>
<style type="text/css" rel="stylesheet">
    .error{ 
        color: red;
    } 
</style>
</head> 
 <h1>llege al controlador </h1>
<body>
<?php 

//incluir conexión a la base de datos 
include '../../../config/conexionBD.php';
$nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null; 
$descripcion = isset($_POST["descripcion"]) ? trim($_POST["descripcion"]): null; 
$precio = isset($_POST["precio"]) ? trim($_POST["precio"]): null;

$sql = "INSERT INTO producto VALUES ('$nombre', '$descripcion', '$precio')";

if ($conn->query($sql) === TRUE) {
    echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
} else {
    if($conn->errno == 1062){
        echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
    }else{
        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    } 
}
//cerrar la base de datos 
$conn->close();
// header("Location:index.html");
?> 
</body> 
</html>