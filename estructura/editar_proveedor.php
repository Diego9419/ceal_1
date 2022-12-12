<?php 

include "../conexion.php";

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['proveedor']) || empty($_POST['contacto']) || empty($_POST['telefono']) || empty($_POST['Nit'])
     || empty($_POST['direccion']))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
    }else{
    
        $codproveedor=$_POST['codproveedor'];
        $Nit=$_POST['Nit'];
        $proveedor=$_POST['proveedor'];
        $contacto=$_POST['contacto'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];

        $query=mysqli_query($conection,"SELECT * FROM proveedor 
                                        WHERE(proveedor='$proveedor' AND codproveedor =$codproveedor)
                                        OR (contacto='$contacto' AND codproveedor =$codproveedor)
                                        OR (telefono='$telefono' AND codproveedor =$codproveedor)
                                        OR (direccion='$direccion' AND codproveedor =$codproveedor)");
        $result=mysqli_fetch_array($query);

        if($result > 0){
           

            if(empty($_POST['Nit'])){
                $sql_update=mysqli_query($conection,"UPDATE proveedor
                                                      SET proveedor='$proveedor', contacto='$contacto', telefono='$telefono', direccion='$direccion'
                                                      WHERE codproveedor= '$codproveedor'");
            }else{
                $sql_update=mysqli_query($conection,"UPDATE proveedor
                                                      SET proveedor='$proveedor', contacto='$contacto', telefono='$telefono', Nit='$Nit', direccion='$direccion'
                                                      WHERE codproveedor= '$codproveedor'");
            }
            
                   
        if($sql_update){
            $alert='<p class="msg_save">Proveedor actualizado correctamente.</p>';
        }else{
            $alert='<p class="msg_error">Error al actualizar el proveedor.</p>';  
        }
        } 

    }
}

//======mostar datos========/

if(empty($_GET['id']))
{
    header('location: lista_proveedores.php');
}
$idprove=$_GET['id'];
$sql=mysqli_query($conection,"SELECT pv.codproveedor, pv.Nit, pv.proveedor,
pv.contacto, pv.telefono, pv.direccion 
            FROM proveedor pv  
            WHERE codproveedor=$idprove");
$result_sql=mysqli_num_rows($sql);

if($result_sql == 0){
    header('location: lista_proveedores.php');
}else{
    $option = '';
     while($data =mysqli_fetch_array($sql)){
      $idprove=$data['codproveedor'];
      $Nit=$data['Nit'];
      $proveedor=$data['proveedor'];
      $contacto=$data['contacto'];
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
	<title>Actualizar proveedor</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
            <h1><i class="fa-solid fa-truck-fast"></i> Actualizar proveedor</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="" method="post">
            <input type="hidden" name="codproveedor" value="<?php echo $idprove;?>">
            <label for="proveedor">Proveedor</label>
            <input type="text" name= "proveedor" id="proveedor" placeholder="proveedor" value="<?php echo $proveedor; ?>">
            <label for="Nit">Nit</label>
            <input type="text" readonly="readonly" name= "Nit" id="Nit" placeholder="Nit" value="<?php echo $Nit; ?>">
            <label for="contacto">Contacto</label>
            <input type="text" name= "contacto" id="contacto" placeholder="contacto" value="<?php echo $contacto; ?>">
            <label for="telefono">Telefono</label>
            <input type="text" name= "telefono" id="telefono" placeholder="telefono" value="<?php echo $telefono; ?>">
            <label for="direccion">Direccion</label>
            <input type="text" name= "direccion" id="direccion" placeholder="direccion" value="<?php echo $direccion; ?>">
        
            </select>
            <button type="submit" class="btn_save"><i class="fa-regular fa-floppy-disk"></i> Actualizar proveedor</button>
        
            </form>


        </div>
		
	</section>
	<?php include "includes/footer.php";?>
</body>
</html>
