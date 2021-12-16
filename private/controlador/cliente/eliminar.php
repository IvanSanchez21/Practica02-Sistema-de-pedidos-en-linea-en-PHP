<!DOCTYPE html>
<html lang="en">
<body>

<?php
include ('../../config/conexionBD.php');
$codigo=$_GET["codigo"];
$sql="DELETE FROM clientes WHERE cli_codigo=$codigo";
$result = $conn->query($sql);
header("Location:listar_cliente.php");
?>
</body>
</html>


    

