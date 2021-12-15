<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
<link rel="stylesheet" type="text/css" href="../../css/hoja.css">
<link rel="stylesheet" type="text/css" href="../../css/estilos1.css">
</head>

<body>

<header>
        <nav>
            <section class="contenedor nav">
                <div class="logo">
                    <img src="" alt="">
                </div>
                <div class="enlaces-header">
                    <a href="#">Inicio</a>
                    <a href="#">Restaurantes</a>
                    <a href="#">Contactos</a>
                    <a href="#">Visión</a>
                </div>
                <div class="hamburguer">
                    <i class="fas fa-bars"></i>
                </div>

                <div class="flex flex-wrap">
                    <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-1000 dark:focus:ring-blue-500">Iniciar Sesión</button>
                    <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-500">Regístrate</button>
                </div>
            </section>
        </nav>
    </header>


<?php
include '../../config/conexionBD.php';
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
?>

<section></section>
<h1>Administración de Cliente</span></h1>

  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Cédula</td>
      <td class="primera_fila">Nombres</td>
      <td class="primera_fila">Apellidos</td>
      <td class="primera_fila">Dirección</td>
      <td class="primera_fila">Teléfono;</td>
      <td class="primera_fila">Correo</td>
      <td class="primera_fila">Contraseña</td>
    </tr> 
   
   <?php 
      while($row = $result->fetch_assoc()):
        echo "<tr>";
        echo " <td>" . $row["cli_codigo"] . "</td>";
        echo " <td>" . $row["cli_cedula"] . "</td>";
        echo " <td>" . $row["cli_nombre"] . "</td>";
        echo " <td>" . $row["cli_apellido"] . "</td>";
        echo " <td>" . $row["cli_direccion"] . "</td>";
        echo " <td>" . $row["pro_telefono"] . "</td>";
        echo " <td>" . $row["cab_correo"] . "</td>";
        echo " <td>" . $row["cab_clave"] . "</td>";
    //   
    ?>
      <td class="bot"><a href="eliminar.php?codigo=<?php echo $row["cli_codigo"]?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      
      <td class='bot'><a href="editar.php?
      codigo=<?php echo $row["cli_codigo"]?> &
      cedula=<?php echo $row["cli_cedula"]?> &
      nombre=<?php echo $row["cli_nombre"]?> &
      apellido=<?php echo $row["cli_apellido"]?> &
      direccion=<?php echo $row["cli_direccion"]?> &
      telefono=<?php echo $row["pro_telefono"]?> &
      correo=<?php echo $row["cab_correo"]?> &
      correo=<?php echo $row["cab_clave"]?>">
      <input type='button' name='up' id='up' value='Actualizar'></a></td>
      
      <td class="bot"><a href="../vista/crear_cliente.html"><input type='button' name='del' id='del' value='Crear'></a></td>
      </tr>

<?php 
endwhile;
?>	
  </table>
  </section>
</body>
</html>