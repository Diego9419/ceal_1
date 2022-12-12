<?php

include "../conexion.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>Lista proveedores</title>
</head>
<body>
<?php include "includes/header.php";?>
<section id="container">

<h1><i class="fa-solid fa-box fa-2x"></i> Lista de proveedores</h1>
<a href="registro_proveedores.php"class="btn_new"><i class="fa-solid fa-truck"></i> Crear proveedor</a>
<table>
	<tr>
	    <th>codproveedor</th>
		<th>Nit</th>
		<th>Proveedor</th>
		<th>Contacto</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Acciones</th>
	</tr>
<?php
   
   $query=mysqli_query($conection, "SELECT pv.codproveedor, pv.Nit, pv.proveedor,
   pv.contacto, pv.telefono, pv.direccion FROM proveedor pv");
   mysqli_close($conection);
   $result=mysqli_num_rows($query);

      if($result >0){
	   while ($data =mysqli_fetch_array($query)){

    ?>
	    <tr>
		   <td><?php echo $data["codproveedor"]?></td>
		   <td><?php echo $data["Nit"]?></td>
		   <td><?php echo $data["proveedor"]?></td>
		   <td><?php echo $data["contacto"]?></td>
		   <td><?php echo $data["telefono"]?></td>
		    <td><?php echo $data["direccion"]?></td>
		    <td>
			   <a class="link_edit" href="editar_proveedor.php?id=<?php echo $data["codproveedor"]?>"><b>
			   <i class="fa-solid fa-pen-to-square"></i>Editar</b></a>
			|
			  <a class="link_delete" href="eliminar_confirmar_proveedor.php?id=<?php echo $data["codproveedor"]?>"><b>
				<i class="fa-solid fa-trash"></i> Eliminar</b></a>
		     </td>
	     </tr>
<?php		 
        }
    }
?>
</table>

</section>
	<?php include "includes/footer.php";?>
</body>
</html>