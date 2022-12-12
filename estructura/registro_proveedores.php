<?php 

include "../conexion.php";

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['proveedor']) || empty($_POST['contacto']) || empty($_POST['telefono'] || empty($_POST['nit']
    || empty($_POST['direccion']))))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
    }else{
    

        $proveedor=$_POST['proveedor'];
        $contacto=$_POST['contacto'];
        $telefono=$_POST['telefono'];
        $nit=$_POST['nit'];
        $direccion=$_POST['direccion'];

        $query=mysqli_query($conection,"SELECT * FROM proveedor WHERE proveedor= '$proveedor' OR nit = '$nit' ");
        mysqli_close($conection);
        $result=mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">El proveedor ya exixte</p>';
        }else{
            $query_insert =mysqli_query($conection,"INSERT INTO proveedor(proveedor,contacto,telefono,nit, direccion)
                                                     VALUES ('$proveedor','$contacto','$telefono','$nit','$direccion')");
        if($query_insert){
            $alert='<p class="msg_save">Proveedor creado correctamente.</p>';
        }else{
            $alert='<p class="msg_error">Error al crear el proveedor.</p>';  
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
	<title>Registro proveedores</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
        <h1><i class="fa-solid fa-truck fa-lg"></i> Registro proveedores</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="" method="post">
            <label for="nit">Nit</label>
            <input type="number" name= "nit" id="nit" placeholder="Número de nit">
            <label for="nombre">Proveedor</label>
            <input type="text" name= "proveedor" id="proveedor" placeholder="Nombre proveedor">
            <label for="correo">Contacto</label>
            <input type="text" name= "contacto" id="contacto" placeholder="Nombre del contacto">
            <label for="telefono">Telefono</label>
            <input type="number" name= "telefono" id="telefono" placeholder="Telefono">
            <label for="direccion">direccion</label>
            <input type="text" name= "direccion" id="direccion" placeholder="Direccion completa">
            <button type="submit" class="btn_save"><i class="fa-regular fa-floppy-disk"></i> Crear provvedor</button>
          </form>

        </div>
		
	</section>
	<?php include "includes/footer.php";?>
</body>
</html>