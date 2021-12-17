<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
</head>

<body>
    <form id="formulario01" method="POST" action="../controlador/producto/crear_producto.php">
        <h1>Producto</h1>
        
           <!-- <div id="alumnos">
               <label for=""><select name="" id="">
                   <?php
                       include '../../../config/conexionBD.php';
                       $sql = "SELECT * FROM restaurante";
                       $result = $conn->query($sql);     
                ?> 
                
                <?php foreach($result as $opciones):?>
                    <option value="<?php echo $opciones['res_nombre'] ?>"><?php echo $opciones['res_nombre'] ?></option>
                   
                   <?php endforeach  ?>
               </select></label>
           </div>  -->

        
        <label for="cedula">Nombre (*)</label>
        <input type="text" id="cedula" name="nombre" value="" placeholder="Ingrese el nombre..." required />
        <br />
        <label for="nombres">Descripción (*)</label>
        <input type="text" id="nombres" name="descripcion" value="" placeholder="Ingrese una descripción..." required />
        <br />
        <label for="apellidos">Precio (*)</label>
        <input type="text" id="apellidos" name="precio" value="" placeholder="Ingrese su precio..." required />
        <br />

        <input type="submit" id="crear" name="crear" value="Aceptar" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form>
</body>

</html>