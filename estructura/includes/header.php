<?php
session_start();
if(empty($_SESSION['active']))
{
    header('location: ../');
}


?>

<header>
		<div class="header">
			
			<h1>Ceal lujos y repuestos </h1>
			<div class="optionsBar">
				<p>Colombia Bogota,<?php echo fecha();?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['nombre'];?></p></span>
				<img class="photouser" src="img/usuario.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<?php include "includes/nav.php";?>
	</header>