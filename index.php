<?php
$alert='';
session_start();
if(!empty($_SESSION['active']))
{
    header('location: estructura/');
}else{

if(!empty($_POST))
{
    if(empty($_POST['usuario']) || empty($_POST['contraseña']))
    {
        $alert='ingrese su usuario y su contraseña';
    }else{
        require_once "conexion.php";
        $user=mysqli_real_escape_string($conection,$_POST['usuario']);
        $pass=md5(mysqli_real_escape_string($conection,$_POST['contraseña']));
        $query=mysqli_query($conection,"SELECT*FROM usuario WHERE usuario='$user' 
        AND clave='$pass'");
        mysqli_close($conection);
        $result=mysqli_num_rows($query);

        if($result > 0)
        {
            $data=mysqli_fetch_array($query);
        
            $_SESSION['active']= true;
            $_SESSION['idUser']= $data['idusuario'];
            $_SESSION['nombre']= $data['nombre'];
            $_SESSION['email']= $data['email'];
            $_SESSION['user']= $data['usuario'];
            $_SESSION['rol']= $data['rol'];

            header('location: estructura/');
        }else{
            $alert= 'el usuario o la contraseña son incorrectos';
            session_destroy();
        }
    }
    
}
}

?>


<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>incio secion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <section id="container">
    <div class="contenedor-formulario caja">
        <div class="imagen-formulario animate__animated animate__flipInX">
    </div>
    <form action="" method="post">
        <form class="formulario animate__animated animate__flipInX">
            <div class="texto-formulario">
                <h2>Ceal lujos y repuestos</h2>
                <p>Inicia sesión con tu usuario</p>
            </div>
            <div class="input">
                <label for="usuario">Usuario</label>
                <input placeholder="Ingresa tu usuario" type="text" name="usuario">
            </div>
            <div class="input">
                <label for="contraseña">Contraseña</label>
                <input placeholder="Ingresa tu contraseña" type="password" name="contraseña">
            </div>
            <div class="alert">
                <?php echo isset($alert)? $alert:'';?>
            </div>
            <div class="password-olvidada">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="input">
               <input type="submit" value="ingresar">
            </div>
           
    
        </form>
    </form>

    </div>
</section>
</body>

</html>

</body>

</html>