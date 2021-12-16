<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<?php

if(!isset($_POST["bot_actualizar"])
// include ("conexionBD.php");
$codigo=$_GET["codigo"];
$cedula=$_GET["cedula"];
$nombre=$_GET["nombre"];
$apellido=$_GET["apellido"];
$direccion=$_GET["direccion"];
$telefono=$_GET["telefono"];
$correo=$_GET["correo"];

// $sql="UPDATE FROM cliente WHERE cli_codigo=$codigo";
// $result = $conn->query($sql);
// header("Location:index.php");

?>


<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    
    <tr>
      <td>Codigo</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $codigo ?>"></td>
    </tr>
    <tr>
      <td>Cédula</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $cedula ?>"></td>
    </tr>
    
    <tr>
      <td>Nombres</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $nombre ?>"></td>
    </tr>

    <tr>
      <td>Apellidos</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $apellido ?>"></td>
    </tr>


    <tr>
      <td>Dirección</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $direccion ?>"></td>
    </tr>

    <tr>
      <td>Teléfono</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $telefono ?>"></td>
    </tr>

    <tr>
      <td>Correo</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $correo ?>"></td>
    </tr>

    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>