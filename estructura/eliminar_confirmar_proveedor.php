<?php

include "../conexion.php";

if(!empty($_POST)){

$codproveedor =$_POST['codproveedor'];

$query_delete=mysqli_query($conection,"DELETE FROM proveedor
                                       WHERE codproveedor=$codproveedor");
if($query_delete){
    header("location: lista_proveedores.php");
}else{
    echo "error al eliminar";
} 
}                                      

if(empty($_REQUEST['id'])){
    header("location: lista_proveedores.php");
    
}else{
    
    $codproveedor =$_REQUEST['id'];
    $query=mysqli_query($conection,"SELECT pv.Nit, pv.proveedor, pv.contacto
                                    FROM proveedor pv
                                    WHERE pv.codproveedor =$codproveedor");

 $result=mysqli_num_rows($query);
if($result > 0){
    while ($data=mysqli_fetch_array($query)){
        $nit=$data['Nit'];
        $proveedor=$data['proveedor'];
        $contacto=$data['contacto'];
    }
}else{
    header("location: lista_proveedores.php");
}

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>Eliminar proveedor</title>
</head>
<body>
<?php include "includes/header.php";?>
<section id="container">
    <div class= "data_delete">
        <i class="fa-solid fa-truck fa-5x"></i><br>
       <h1>¿Esta seguro de eliminar el proveedor?</h1> 
       <p class= "text">Nit:<span><?php echo $nit; ?></span></p>
       <p class= "text">Proveedor:<span><?php echo $proveedor; ?></span></p>
       <p class= "text">Contacto:<span><?php echo $contacto; ?></span></p>

       <form method="post" action="">
          <input type="hidden" name="codproveedor" value="<?php echo $codproveedor;?>">
          <a href="lista_proveedores.php" class= "btn_cancel" ><i class="fa-solid fa-ban"></i> Cancelar</a>
          <button type="submit" class="btn_ok"><i class="fa-solid fa-trash"></i> Eliminar</button>

       </form>

</div>



</div>  
	</section>
	<?php include "includes/footer.php";?>
</body>

</html>