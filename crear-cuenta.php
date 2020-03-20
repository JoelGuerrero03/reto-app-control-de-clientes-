<!-- <body class="crear-cuenta"> -->
<?php include_once 'includes/templates/header.php' ?>
<div class="contenedor-formulario">
        <h1>Concesionario <span>Crear Cuenta</span></h1>
        <form name="guardar-registro" id="guardar-registro" method="post" class=" caja-login"  action="./includes/modelos/modelo-admin.php">
            <div class="campo">
                <label for="usuario">Usuario: </label>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario">
            </div>
            <div class="campo">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="campo enviar">
               <input type="hidden" name="registro" value="crear">
               <button type="submit" class="boton" id="crear_registro_cliente">Crear cuenta</button>
            </div>
            <div class="campo">
                <a href="login.php">Inicia Sesión Aquí</a>
            </div>
        </form>
    </div>
<?php include_once 'includes/templates/footer.php' ?>
