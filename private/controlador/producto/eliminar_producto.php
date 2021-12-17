<!DOCTYPE html>
<html lang="en">
<body>

<?php
include ('../../../config/conexionBD.php');
$codigo=$_GET["codigo"];
$sql="DELETE FROM producto WHERE pro_codigo=$codigo";
$result = $conn->query($sql);
header("Location:listar_productos.php");
?>
</body>
</html>
