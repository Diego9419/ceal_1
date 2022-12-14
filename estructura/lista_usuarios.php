<?php

include "../conexion.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>Lista Usuarios</title>
</head>
<body>
<?php include "includes/header.php";?>
<section id="container">

<h1><i class="fa-solid fa-users fa-2x"></i> Lista de usuarios</h1>
<a href="registro_usuario.php"class="btn_new"><i class="fa-solid fa-user-plus"></i> Crear usuario</a>
<table>
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Usuario</th>
		<th>Rol</th>
		<th>Acciones</th>
	</tr>
<?php
   
   $query=mysqli_query($conection, "SELECT u.idusuario, u.nombre,
   u.correo, u.usuario,r.rol FROM usuario u INNER JOIN rol r ON 
   u.rol = r.idrol");
   mysqli_close($conection);
   $result=mysqli_num_rows($query);

      if($result >0){
	   while ($data =mysqli_fetch_array($query)){

    ?>
	    <tr>
		   <td><?php echo $data["idusuario"]?></td>
		   <td><?php echo $data["nombre"]?></td>
		   <td><?php echo $data["correo"]?></td>
		   <td><?php echo $data["usuario"]?></td>
		   <td><?php echo $data["rol"]?></td>
		    <td>
			   <a class="link_edit" href="editar_usuario.php?id=<?php echo $data["idusuario"]?>"><b><i class="fa-solid fa-pen-to-square"></i> Editar</b></a>
			|<?php

			if($data["rol"]!='Administrador'){ ?>

			  <a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $data["idusuario"]?>"><b><i class="fa-solid fa-trash"></i> Eliminar</b></a>
		     <?php
			 }
			 ?>
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