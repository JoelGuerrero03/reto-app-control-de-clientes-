<?php 
   error_reporting(E_ALL ^ E_NOTICE); 
//    session_start();
//    session_destroy();
 
    include_once 'includes/templates/header.php';
    include_once 'includes/funciones/conexionBd.php';
?>
<div class="contenedor-formulario">
        <h1>Concesionario</h1>
        <form id="formulario" class="caja-login" method="post">
            <div class="campo">
                <label for="usuario">Usuario: </label>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario">
            </div>
            <div class="campo">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="campo enviar">
                <input type="hidden" id="tipo" value="login">
                <input type="submit" class="boton" value="Iniciar Sesión">
            </div>

            <div class="campo">
                <a href="crear-cuenta.php">Crea una cuenta nueva</a>
            </div>
        </form>
    </div>
<?php include_once 'includes/templates/footer.php' ?>
