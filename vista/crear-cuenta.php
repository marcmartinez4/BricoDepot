<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/crear-cuenta.css">
    <title>Customer Login Brico Depôt</title>
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center fondo-panel-sesion">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6 panel-inicio-sesion">
                    <!-- Título de la página -->
                    <h1 class="h1-sesion">Mi cuenta</h1>
                    
                    <!-- Div de navegación entre crear cuenta y iniciar sesión -->
                    <div class="div-pestañas">
                        <a class="pestaña-no-activa" href="?controlador=cliente">
                            <div>
                                <p class="pestañas">Identificación</p>
                            </div>
                        </a>
                        
                        <a class="pestaña-activa" href="?controlador=registro">
                            <div>
                                <p class="pestañas">Crear una cuenta</p>
                            </div>
                        </a>
                    </div>

                    <!-- Form con los campos a rellenar para crear una cuenta -->
                    <form class="form-inicio-sesion" action="?controlador=registro&action=crearCuenta" method="post">
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

                            <div class="div-datos">
                                <div class="nombre">
                                    <h3>Nombre</h3>
                                    <input class="input-sesion-datos" type="text" name="nombre" placeholder="Juan">
                                </div>

                                <div class="apellido">
                                    <h3>Apellido</h3>
                                    <input class="input-sesion-datos" type="text" name="apellido" placeholder="García">
                                </div>
                            </div>
                        </div>

                        <div class="boton-inicio">
                            <input type="submit" class="input-boton-sesion" value="Crear cuenta">
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>