<?php 

include "../conexion.php";

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['direccion']) || empty($_POST['telefono'] || empty($_POST['CC']
    || empty($_POST['correo']))))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
    }else{
    

        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $cc=$_POST['CC'];
        $email=$_POST['correo'];

        $query=mysqli_query($conection,"SELECT * FROM clientes WHERE nombre= '$nombre' OR CC = '$cc' ");
        mysqli_close($conection);
        $result=mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">El cliente ya exixte</p>';
        }else{
            $query_insert =mysqli_query($conection,"INSERT INTO clientes(nombre,direccion,telefono,CC, correo)
                                                     VALUES ('$nombre','$direccion','$telefono','$cc','$email')");
        if($query_insert){
            $alert='<p class="msg_save">Cliente creado correctamente.</p>';
        }else{
            $alert='<p class="msg_error">Error al crear el cliente.</p>';  
        }
        } 

    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>Registro cliente</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
        <h1><i class="fa-solid fa-user-tie fa-2x"></i> Registro cliente</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="" method="post">
            <label for="CC">CC</label>
            <input type="number" name= "CC" id="CC" placeholder="Número de CC">
            <label for="nombre">Nombre</label>
            <input type="text" name= "nombre" id="nombre" placeholder="Nombre completo">
            <label for="correo">Correo electronico</label>
            <input type="email" name= "correo" id="nombre" placeholder="Correo electronico">
            <label for="telefono">Telefono</label>
            <input type="number" name= "telefono" id="telefono" placeholder="Telefono">
            <label for="direccion">direccion</label>
            <input type="text" name= "direccion" id="direccion" placeholder="Direccion completa">
            <button type="submit" class="btn_save"><i class="fa-regular fa-floppy-disk"></i> Crear cliente</button>
          </form>

        </div>
		
	</section>
	<?php include "includes/footer.php";?>
</body>
</html>