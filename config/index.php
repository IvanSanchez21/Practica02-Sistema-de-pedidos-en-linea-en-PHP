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
      <td class="bot"><a href="eliminar.php?codigo=3"><input type='button' name='del' id='del' value='Borrar'></a></td>
      
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
<div class="text-gray-900 bg-gray-200">
    <div class="p-4 flex">
        <h1 class="text-3xl">
            Users
        </h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Name</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">Role</th>
                    <th></th>
                </tr>
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                    <td class="p-3 px-5">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>
                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
                <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                    <td class="p-3 px-5">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>
                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
                
                <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                    <td class="p-3 px-5">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>
                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                    <td class="p-3 px-5">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>
                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
                <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                    <td class="p-3 px-5">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>
                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                    <td class="p-3 px-5">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>
                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
                <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                    <td class="p-3 px-5">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>
                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
                <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                    <td class="p-3 px-5">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>
                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<p>&nbsp;</p>
</body>
</html>