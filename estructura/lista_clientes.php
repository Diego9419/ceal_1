<?php

include "../conexion.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>Lista Clientes</title>
</head>
<body>
<?php include "includes/header.php";?>
<section id="container">

<h1><i class="fa-sharp fa-solid fa-users-rectangle fa-2x"></i> Lista de clientes</h1>
<a href="registro_clientes.php"class="btn_new"><i class="fa-solid fa-user-tie"></i> Crear cliente</a>
<table>
	<tr>
	    <th>Id</th>
		<th>CC</th>
		<th>Nombre</th>
		<th>Dierccion</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Acciones</th>
	</tr>
<?php
   
   $query=mysqli_query($conection, "SELECT c.idcliente, c.CC, c.nombre,
    c.direccion, c.correo, c.telefono FROM clientes c");
	mysqli_close($conection);
   $result=mysqli_num_rows($query);

      if($result >0){
	   while ($data =mysqli_fetch_array($query)){

    ?>
	    <tr>
		   <td><?php echo $data["idcliente"]?></td>
		   <td><?php echo $data["CC"]?></td>
		   <td><?php echo $data["nombre"]?></td>
		   <td><?php echo $data["direccion"]?></td>
		   <td><?php echo $data["correo"]?></td>
		   <td><?php echo $data["telefono"]?></td>
		    <td>
			   <a class="link_edit" href="editar_cliente.php?id=<?php echo $data["idcliente"]?>"><b>
			   <i class="fa-solid fa-pen-to-square"></i>Editar</b></a>
			    <a class="link_delete" href="eliminar_confirmar_cliente.php?id=<?php echo $data["idcliente"]?>"><b>
				<i class="fa-solid fa-trash"></i>Eliminar</b></a>
		     <?php
			 }
			 ?>
			</td>
	     </tr>
<?php		 
        }
    
?>
</table>

</section>
	<?php include "includes/footer.php";?>
</body>
</html>