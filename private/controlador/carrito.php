<?php
  session_start();
  $usuario_id=$_SESSION['Inicio'];
  $datos= null;
  $nombre="";
  $apellido="";
  $cedula="";
  var_dump($_POST);
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "restaurantes1";
  $subtotal = 0;
  $iva = 0;
  date_default_timezone_set('America/Guayaquil');
  $HoraFecha=date("Y-m-d H:i:s");

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //Capturar cedula, nombre y apellido del cliente para la factura 
  $sqlconsulta = "SELECT cli_cedula, cli_nombre, cli_apellido FROM cliente WHERE usu_codigo='$usuario_id'";
  $result = mysqli_query($conn, $sqlconsulta);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $cedula=$row["cli_cedula"];
      $nombre=$row["cli_nombre"];
      $apellido=$row["cli_apellido"];
      //echo "Nombre: " . $row["nombre"]."<br>";
    }
  } else {
        echo "0 results";
  }

  
  if($_POST){
    //Mostrar todos los productos
    if(array_key_exists('listar', $_POST) && $_POST['listar']){

        $sql = "SELECT pro_codigo, pro_nombre, pro_descripcion, pro_precio FROM producto";
        echo $sql;

        $result = $conn->query($sql);

        if ($result) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo  $row["pro_codigo"]. $row["pro_nombre"]. " " . $row["pro_descripcion"]. $row["pro_precio"]."<br>";
            $datos .= '<tr><td scope="col">'.$row["pro_codigo"].'</td>'. '<td scope="col">'.$row["pro_nombre"].'</td>'. '<td scope="col">'.$row["pro_descripcion"].'</td>'. '<td scope="col">'.$row["pro_precio"].'</td><td><button type="submit" class="btn btn-dark" name="agregarPedido" value="'.$row["pro_codigo"].'" >Agregar al pedido</button><input type="hidden" value="'.$row["pro_codigo"].'" name="codigoProducto'.$row["pro_codigo"].'"/></td></tr>';
          }
        } else {
            echo "0 results";
        }
        
    }

    //Agregar a la tabla temporal
    if(array_key_exists('agregarPedido', $_POST) && $_POST['agregarPedido']){
      //echo $_POST['agregarPedido'];
      $consultaProducto = $_POST['agregarPedido'];
      $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
      $sqlcons = "SELECT tem_codigo, tem_nombre, tem_precio, tem_descripcion FROM producto where pro_codigo=$consultaProducto";
      echo $sqlcons;
      $result = $conn->query($sqlcons);

        if ($result) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          //echo "<br>";
          //echo  $row["codigo"]. $row["nombre"]. " " . $row["descripcion"]. $row["precio"]."<br>";
          $nombre=$row["tem_nombre"];
          $descripcion=$row["tem_descripcion"];
          $precio=$row["tem_precio"];
          $codigo=$row["tem_codigo"];
          
          $sql = "INSERT INTO temporal (tem_nombre, tem_descripcion, tem_precio, tem_producto, usu_codigo)
            VALUES ( '$nombre', '$descripcion', $precio, $codigo, $usuario_id)";

            //echo $sql;

            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
        }
    }  

    //Confirmar la factura
    if(array_key_exists('guardarFactura', $_POST) && $_POST['guardarFactura']){

      //Insertar los datos a la factura cabecera
      $sql = "INSERT INTO cabecera (cab_nombre, cab_apellido, cap_hora, cab_subtotal, cab_iva, cli_codigo)
      VALUES ('$nombre', '$apellido', '$HoraFecha', $subtotal, $iva, '$cedula')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $last_id = $conn->insert_id;
        //Insertar los datos a la factura detalle
        $sql = "SELECT * FROM temporal Where usu_codigo=$usuario_id";
        $pedidoQuery = $conn->query($sql);
        $pedidoTempData=null;
        if ($pedidoQuery) {
          // output data of each row
          while($row = $pedidoQuery->fetch_assoc()) {
            //echo  $row["codigo"]. $row["nombre"]. " " . $row["descripcion"]. $row["precio"]."<br>";
              $nombre=$row["tem_nombre"];
              $precio=$row["tem_precio"];        
              $cantidad=$row["tem_cantidad"];
              $codigo=$row["pro_codigo"];
              $sql = "INSERT INTO detalle (det_nombre, det_precio, det_cantidad, pro_cod, cab_codigo)
              VALUES ('$nombre', $precio, $cantidad, $codigo, $last_id)";

              if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
          }
        } else {
            //echo "0 results";
        }
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      
    }
  }
  //Muestra la tabla temporal de los productos seleccionados
  $sql = "SELECT * FROM temporal Where usu_codigo=$usuario_id";
  $pedidoQuery = $conn->query($sql);
  $pedidoTempData=null;
  if ($pedidoQuery) {
    // output data of each row
    while($row = $pedidoQuery->fetch_assoc()) {
      //echo  $row["codigo"]. $row["nombre"]. " " . $row["descripcion"]. $row["precio"]."<br>";
      $pedidoTempData .= '<tr><td scope="col">'.$row["tem_codigo"].'</td>'. '<td scope="col">'.$row["tem_nombre"].'</td>'. '<td scope="col">'.$row["tem_descripcion"].'</td>'. '<td scope="col">'.$row["tem_precio"].'</td><td scope ="col"><input type=text value='.$row["tem_cantidad"].' size="1"></td><td scope ="col">'.$row["pro_codigo"].'</td><td><button type="submit" class="btn btn-dark" name="eliminarPedido" value="eliminarPedido" >Eliminar Pedido</button><input type="hidden" value="'.$row["pro_codigo"].'" name="codigoProductoTemp"/></td></tr>';
      $subtotal = $subtotal+$row["tem_precio"];
    }
  } else {
      //echo "0 results";
  }
  $iva = $subtotal * 0.12;
  $conn->close();
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Listar Menú</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/grid/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../CSS/Listar.css" rel="stylesheet">
  </head>
<body class="center">
    <form method="post" action="">
            
        <main>
            <div id="columna1">

                <h1>Listado de todos los productos</h1>
                <p>Aquí puedes encontrar el menú completo de los restaurante registrados.</p>
                <input type="submit" value="Listar Productos" class="w-50 btn btn-secondary" id="listar" name="listar">
                <p><br>A continuación, se mostrará el menú completo con todos sus detalles.</p>

                <form method="post" action="">
                  <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Opcion</th>
                        </tr>  
                        <?php 
                            echo $datos;
                        ?>
                    </thead>
                  </table>
                </form>

                <h1><br>¿Viste algo que te gustó? A continación puedes comprarlo.</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Opcion</th>
                        </tr>  
                        <?php 
                            echo $pedidoTempData;
                        ?>
                    </thead>
                </table>
                <br>
                <table id="tabla">
                  <tr>
                    <td> 
                      <p>Subtotal:&nbsp;</p> 
                    </td>
                    <td> 
                      <input type="number_format(double)" class="form-control" id="subtotal" size="5" name="subtotal" value=<?php echo $subtotal ?>> 
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <p>IVA:&nbsp;</p>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="iva"  size="5" name="iva" value=<?php echo $iva ?>>
                    </td>
                  </tr>
                </table>
                <br>
                <br><input type="submit" value="Guardar Factura" class="w-50 btn btn-secondary" id="Guardar" name="guardarFactura">
                <br>
                <br><a href="../Principal/Principal.php"><input type="button" value="Regresar a la página principal" class="w-50 btn btn-secondary"></a>
                <br><br>
            </div>  
        </main>
    </form>
</body>

</html>
