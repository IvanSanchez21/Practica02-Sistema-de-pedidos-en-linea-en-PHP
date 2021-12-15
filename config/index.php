<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" /> -->
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>



<?php
include 'conexionBD.php';
$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);
?>


<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Cédula</td>
      <td class="primera_fila">Nombres</td>
      <td class="primera_fila">Apellidos</td>
      <td class="primera_fila">Dirección</td>
      <td class="primera_fila">Teléfono;</td>
      <td class="primera_fila">Correo</td>
    </tr> 
   
   <?php 
      while($row = $result->fetch_assoc()):
        echo "<tr>";
        echo " <td>" . $row["cli_codigo"] . "</td>";
        echo " <td>" . $row["cli_cedula"] . "</td>";
        echo " <td>" . $row["cli_nombres"] . "</td>";
        echo " <td>" . $row["cli_apellidos"] . "</td>";
        echo " <td>" . $row["cli_direccion"] . "</td>";
        echo " <td>" . $row["cli_telefono"] . "</td>";
        echo " <td>" . $row["cli_correo"] . "</td>";
      // echo "<tr>";
    ?>
      <td class="bot"><input type='button' name='del' id='del' value='Borrar'></td>
      
      <td class='bot'><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr> 

<?php 
endwhile;
?>	
	<tr>
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name=' Dir' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
	</tr>    
  </table>



  <!-- component -->
<div class="md:px-20 py-8 w-full">
  <div class="shadow overflow-hidden rounded border-b border-gray-500">
    <table class="min-w-full bg-white">
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="w-1/3 text-left py-4 px-4 uppercase font-semibold text-sm">Name</th>
          <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</td>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</td>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</td>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</td>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</td>
        </tr>
      </thead>

    
      <tbody class="text-gray-700">
      <tr>
        <td class="w-1/3 text-left py-3 px-4">Lian</td>
        <td class="w-1/3 text-left py-3 px-4">Smith</td>
        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
      </tr>
  
    </tbody>
    </table>
  </div>
</div>

<p>&nbsp;</p>
</body>
</html>