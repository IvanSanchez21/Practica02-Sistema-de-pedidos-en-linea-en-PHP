<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Productos</title>
<!-- <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" /> -->
<link rel="stylesheet" type="text/css" href="../../../css/hoja.css">

</head>

<body>

<header>
        <nav>
        <ul>
        <li><a href="../controlador/index.php">Inicio</a></li>  
        <li><a href="../cliente/listar_cliente.php">Clientes</a></li>
        <li><a href="listar_productos.php">Productos</a></li>
        <li><a href="../restaurante/listar_restaurante.php">Restaurantes</a></li>
        <li><a href="../controlador/index.php">Cerrar Sesión</a></li>   
      </ul>
        </nav>
    </header>

    


<?php
include '../../../config/conexionBD.php';
$sql = "SELECT * FROM producto";
$result = $conn->query($sql);
?>


<section class="contenedor">
<h1>Administrar Productos</h1>
  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombres</td>
      <td class="primera_fila">Descripció<nav></nav></td>
      <td class="primera_fila">Precio</td>
    </tr> 
   
   <?php 
      while($row = $result->fetch_assoc()):
        echo "<tr>";
        echo " <td>" . $row["pro_codigo"] . "</td>";
        echo " <td>" . $row["pro_nombre"] . "</td>";
        echo " <td>" . $row["pro_descripcion"] . "</td>";
        echo " <td>" . $row["pro_precio"] . "</td>";
    //   
    ?>
      <td class="bot"><a href="eliminar_producto.php?codigo=<?php echo $row["pro_codigo"]?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      
      <td class='bot'><a href="editar.php?
      codigo=<?php echo $row["pro_codigo"]?> &
      cedula=<?php echo $row["pro_nombre"]?> &
      nombre=<?php echo $row["pro_descripcion"]?> &
       correo=<?php echo $row["pro_precio"]?>">
      <input type='button' name='up' id='up' value='Actualizar'></a></td>
      
      <td class="bot"><a href="../producto/crear_producto.php"><input type='button' name='del' id='del' value='Crear'></a></td>
      </tr>

<?php 
endwhile;
?>	
  </table>
  </section>
</body>
</html>