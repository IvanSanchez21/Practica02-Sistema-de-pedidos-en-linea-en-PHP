<?php
      session_start();
      $id = $_SESSION['Inicio'];
      //var_dump($_POST);
      //echo $id;
      $rol="";
      $nombre="";
      $nombreRe="";

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "restaurantes1"; 

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM usuario WHERE usu_codigo='$id'";
      //echo $sql;

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $usuarioEncontrado = TRUE;
          //echo "id: " . $row["usu_codigo"]. " " . $row["usu_correo"]. " " . $row["usu_clave"]. " " . $row["usu_rol"] . "<br>";
          $rol = $row["usu_rol"];
        }
      } else {
        //echo "0 results";
      }

      //Sacar nombre del cliente
      $sqlconsulta = "SELECT cli_nombre FROM cliente WHERE cli_codigo='$id'";
      $result = mysqli_query($conn, $sqlconsulta);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $nombre=$row["cli_nombre"];
          //echo "Nombre: " . $row["nombre"]."<br>";
        }
      } else {
        //echo "0 results";
      }

      //Sacar nombre del restaurante
      $sqlconsultaRE = "SELECT res_nombre FROM restaurante WHERE usu_codigo='$id'";
      $result = mysqli_query($conn, $sqlconsultaRE);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $nombre=$row["res_nombre"];
          //echo "Nombre: " . $row["nombre"]."<br>";
        }
      } else {
        //echo "0 results";
      }

      mysqli_close($conn);
      echo $rol;
    
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ofertas Gastronómicas</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
    <header>
        <nav>
            <section class="contenedor nav">
                
                <div class="enlaces-header">
                    <a href="#">Inicio</a>
                    <a href="#">Contactos</a>
                    <a href="#">Visión</a>
                </div>
                <div class="hamburguer">
                    <i class="fas fa-bars"></i>
                </div>

                <div class="flex flex-wrap">
                        <a href="../controlador/index.php">Cerrar Sesión</a>
              
                </div>
            </section>
        </nav>
    </header>

    <section>
        <img src="../../img/Inicio.png" alt="">
    </section>

        
    <?php if($rol == 'R'):?>
    <section class="about-us">
        <div class="contenedor1">
            <center>
                <h2 class="titulo">Gestión de Restaurante</h2>
            </center>   
            <div class="contenedor-articulo">
            <div class="articulo" data-aos="zoom-in-right">
                    <i class="fas fa-cog"></i>
                    <h3>Administrar Clientes</h3>
                    <p>En esta sección usted podra Eliminar,actulizar,agregar y listar los clientes.!</p>
                    <a href="../../private/controlador/cliente/listar_cliente.php">Ir a Clientes---></a>
                </div>  
            
            <div class="articulo" data-aos="zoom-in-right">
                    <i class="fas fa-pen-fancy"></i>
                    <h3>Administrar Productos</h3>
                    <p>En esa sección usted podra usted podra Eliminar,actulizar,agregar y listar los productos. </p>
                    <a href="../../private/controlador/producto/listar_productos.php">Ir a Productos ---></a>
                </div>
                <div class="articulo" data-aos="zoom-in-right">
                    <i class="fas fa-code"></i>
                    <h3>Administrar Restaurantes</h3>
                    <p>En esta sección usted podra Eliminar,actulizar,agregar y listar los restaurantes.</p>
                    <a href="../../private/controlador/restaurante/listar_restaurante.php">Ir a Restaurantes---></a>
                </div>
                
            </div>
        </div>
    </section>


    <?php elseif($rol == 'C'):?>
    <section class="about-us">
        <div class="contenedor1">
            <center>
               <a href="../../private/controlador/carrito.php"><h2 class="titulo">Realice su Pedido</h2></a> 
            </center>   
            
            
        </div>
    </section>
    <?php endif ?>





    <footer>
        <div class="partFooter">
            <img src="" alt="">
        </div>
        
        <div class="partFooter">
            <h4>Servicios</h4>
            <a href="#">Pedidos a domicilio</a>
            <a href="#">Abierto las 24h</a>
            <a href="#">Domingo con horario restringido</a>
        </div>
        
        <div class="partFooter">
            <h4>Acerca de</h4>
            <a href="#">About 1</a>
            <a href="#">About 2</a>
            <a href="#">About 3</a>
        </div>
        
        <div class="partFooter">
            <h4>Redes sociales</h4>
            <div class="social-media">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/c15b744a04.js" crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
</body>

</html>