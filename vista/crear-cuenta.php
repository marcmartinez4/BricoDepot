<?php
    include ('../modelo/ClienteDAO.php');
    include ('../controlador/clienteControlador.php');

    $contraseña_incorrecta = false;

    if (isset($_POST['nombre'])) {
        if (isset($_POST['apellido'])) {
            if (isset($_POST['correo'])) {
                if (isset($_POST['contraseña'])) {
                    if (isset($_POST['contraseña2'])) {
                        if (isset($_POST['contraseña']) == isset($_POST['contraseña2'])) {
                            $nombre = $_POST['nombre'];
                            $apellido = $_POST['apellido'];
                            $mail = $_POST['correo'];
                            $contra = $_POST['contraseña'];

                            clienteControlador::crearCuenta($nombre, $apellido, $mail, $contra);

                            header('Location: ../vista/inicio-sesion.php');
                        } else {
                            $contraseña_incorrecta = true;
                        }
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/css/crear-cuenta.css">
    <title>Customer Login Brico Depôt</title>
</head>
<body>

    <?php include ('../vista/header.php'); ?>

    <div class="container-fluid">
        <div class="d-flex justify-content-center fondo-panel-sesion">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6 panel-inicio-sesion">
                    
                    <h1 class="h1-sesion">Mi cuenta</h1>
                    
                    <div class="div-pestañas">
                        <a class="pestaña-no-activa" href="../vista/inicio-sesion.php">
                            <div>
                                <p class="pestañas">Identificación</p>
                            </div>
                        </a>
                        
                        <a class="pestaña-activa" href="../vista/crear-cuenta.php">
                            <div>
                                <p class="pestañas">Crear una cuenta</p>
                            </div>
                        </a>
                    </div>

                    <form class="form-inicio-sesion" action="" method="post">
                        <div class="primer-div-form">
                            <div class="segundo-div-form">
                                <h3>Email</h3>
                                <input class="input-sesion" type="email" name="correo">
                            </div>
                            
                            <div>
                                <h3>Contraseña</h3>
                                <input class="input-sesion" type="password" name="contraseña">
                                <div class="panel-contraseña">
                                    <p>Contraseña segura: <span>Sin contraseña</span></p>
                                </div>
                            </div>

                            <div>
                                <h3>Confirmar contraseña</h3>
                                <input class="input-sesion" type="password" name="contraseña2">
                                <?php
                                    if ($contraseña_incorrecta) {
                                        echo '<p class="coinciden">Las contraseñas no coinciden</p>';
                                    }
                                ?>
                            </div>

                            <div class="div-datos">
                                <div class="nombre">
                                    <h3>Nombre</h3>
                                    <input class="input-sesion-datos" type="text" name="nombre">
                                </div>

                                <div class="apellido">
                                    <h3>Apellido</h3>
                                    <input class="input-sesion-datos" type="text" name="apellido">
                                </div>
                            </div>
                        </div>

                        <div class="boton-inicio">
                            <input type="submit" class="input-boton-sesion" value="Entrar">
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

    <?php include ('../vista/footer.html'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>