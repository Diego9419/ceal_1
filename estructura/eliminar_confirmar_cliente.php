<?php

include "../conexion.php";

if(!empty($_POST)){

$idcliente =$_POST['idcliente'];

$query_delete=mysqli_query($conection,"DELETE FROM clientes
                                       WHERE idcliente=$idcliente");
if($query_delete){
    header("location: lista_clientes.php");
}else{
    echo "error al eliminar";
} 
}                                      

if(empty($_REQUEST['id'])){
    header("location: lista_clientes.php");
    
}else{
    
    $idcliente =$_REQUEST['id'];
    $query=mysqli_query($conection,"SELECT c.CC, c.nombre, c.telefono
                                    FROM clientes c
                                    WHERE c.idcliente =$idcliente");

 $result=mysqli_num_rows($query);
if($result > 0){
    while ($data=mysqli_fetch_array($query)){
        $CC=$data['CC'];
        $nombre=$data['nombre'];
        $telefono=$data['telefono'];
    }
}else{
    header("location: lista_clientes.php");
}

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>Eliminar cliente</title>
</head>
<body>
<?php include "includes/header.php";?>
<section id="container">
    <div class= "data_delete">
    <i class="fa-solid fa-user-xmark fa-5x"></i><br>
       <h1>¿Esta seguro de eliminar el cliente?</h1> 
       <p class= "text">CC:<span><?php echo $CC; ?></span></p>
       <p class= "text">Nombre:<span><?php echo $nombre; ?></span></p>
       <p class= "text">telefono:<span><?php echo $telefono; ?></span></p>

       <form method="post" action="">
          <input type="hidden" name="idcliente" value="<?php echo $idcliente;?>">
          <a href="lista_clientes.php" class= "btn_cancel" ><i class="fa-solid fa-ban"></i> Cancelar</a>
          <button type="submit" class="btn_ok"><i class="fa-solid fa-trash"></i> Eliminar</button>

       </form>

</div>



</div>  
	</section>
	<?php include "includes/footer.php";?>
</body>

</html>