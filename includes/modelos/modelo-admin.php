<?php

$password = $_POST['password'];
$usuario = $_POST['usuario'];
if(isset($_POST['registro'])){
    if($_POST['registro'] == 'crear'){
    $opciones = array(
        'cost' => 12
    );
    $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
    try {
         // importar la conexion
        require_once('../../../reto(app control de clientes)/includes/funciones/conexionBd.php');
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario,password) VALUES (?,?)");
        $stmt->bind_param('ss', $usuario  , $hash_password);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
    }
}
$accion = $_POST['accion'];
if($accion === 'login'){
    //codigo que loguee a los administradores
     // importar la conexion
     require_once('../../../reto(app control de clientes)/includes/funciones/conexionBd.php');

     try{
         //seleccionar el administrador de la bd
         $stmt = $conn->prepare("SELECT usuario, id, password FROM  usuarios WHERE usuario = ?");
         $stmt->bind_param('s', $usuario);
         $stmt->execute();
         //loguear el usuario
         $stmt->bind_result($usuario, $id_usuario, $pass_usuario);
         $stmt->fetch();
        if($usuario){
            //el usuario existe, verificar el password
            if(password_verify($password, $pass_usuario)){
                //iniciar la seccion
                session_start();
                $_SESSION['nombre'] = $usuario;
                $_SESSION['id'] = $id_usuario;
                $_SESSION['login'] = true;
                //login correcto
                $respuesta = array(
                    'respuesta' => 'correcto',
                    'nombre' => $usuario,
                     'tipo' => $accion
                 );
            }else{
                //login incorrecto, enviar error 
                $respuesta = array(
                    'resultado' => 'Password Incorrecto'
                );
            } 
        }else{
            $respuesta = array(
                'error' => 'Usuario no existe'
            );
        }
         $stmt->close();
         $conn->close();
     } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));

}
