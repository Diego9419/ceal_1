<?php 

include "../conexion.php";

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['direccion']))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
    }else{
    
        $idcliente=$_POST['idcliente'];
        $CC=$_POST['CC'];
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];

        $query=mysqli_query($conection,"SELECT * FROM clientes 
                                        WHERE(nombre='$nombre' AND idcliente =$idcliente)
                                        OR (correo='$correo' AND idcliente =$idcliente)
                                        OR (telefono='$telefono' AND idcliente =$idcliente)
                                        OR (direccion='$direccion' AND idcliente =$idcliente)");
        $result=mysqli_fetch_array($query);

        if($result > 0){
           

            if(empty($_POST['CC'])){
                $sql_update=mysqli_query($conection,"UPDATE clientes
                                                      SET correo='$correo', telefono='$telefono', direccion='$direccion'
                                                      WHERE idcliente= '$idcliente'");
            }else{
                $sql_update=mysqli_query($conection,"UPDATE clientes
                                                      SET correo='$correo', telefono='$telefono', CC='$CC', direccion='$direccion'
                                                      WHERE idcliente= '$idcliente'");
            }
            
                   
        if($sql_update){
            $alert='<p class="msg_save">clientes actualizado correctamente.</p>';
        }else{
            $alert='<p class="msg_error">Error al actualizar el clientes.</p>';  
        }
        } 

    }
}

//======mostar datos========/

if(empty($_GET['id']))
{
    header('location: lista_clientes.php');
}
$idclien=$_GET['id'];
$sql=mysqli_query($conection,"SELECT c.idcliente, c.CC, c.nombre,
c.correo, c.telefono, c.direccion 
            FROM clientes c  
            WHERE idcliente=$idclien");
$result_sql=mysqli_num_rows($sql);

if($result_sql == 0){
    header('location: lista_clientes.php');
}else{
    $option = '';
     while($data =mysqli_fetch_array($sql)){
      $idclien=$data['idcliente'];
      $CC=$data['CC'];
      $nombre=$data['nombre'];
      $correo=$data['correo'];
      $telefono=$data['telefono'];
      $direccion=$data['direccion'];
    
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>Actualizar clientes</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
            <h1><i class="fa-solid fa-user-pen"></i> Actualizar cliente</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="" method="post">
            <input type="hidden" name="idcliente" value="<?php echo $idclien;?>">
            <label for="nombre">Nombre</label>
            <input type="text" name= "nombre" id="nombre" placeholder="nombre" value="<?php echo $nombre; ?>">
            <label for="CC">CC</label>
            <input type="text" readonly="readonly" name= "CC" id="CC" placeholder="CC" value="<?php echo $CC; ?>">
            <label for="correo">Correo</label>
            <input type="text" name= "correo" id="correo" placeholder="correo" value="<?php echo $correo; ?>">
            <label for="telefono">Telefono</label>
            <input type="text" name= "telefono" id="telefono" placeholder="telefono" value="<?php echo $telefono; ?>">
            <label for="direccion">Direccion</label>
            <input type="text" name= "direccion" id="direccion" placeholder="direccion" value="<?php echo $direccion; ?>">
        
            </select>
            <button type="submit" class="btn_save"><i class="fa-regular fa-floppy-disk"></i> Actializar cliente</button>
        
            </form>


        </div>
		
	</section>
	<?php include "includes/footer.php";?>
</body>
</html>
