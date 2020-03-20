<?php
$primer_nombre      = $_POST['primer_nombre'];
$segundo_nombre     = $_POST['segundo_nombre'];
$primer_apellido    = $_POST['primer_apellido'];
$segundo_apellido   = $_POST['segundo_apellido'];
$celular            = $_POST['celular'];
$residencia         = $_POST['residencia'];
$cedula             = $_POST['cedula'];
$idEmpresa          = $_POST['nombre_empresa'];
$activoId           = $_POST['activo'];
// $activo             = $_POST['activo'];
if(isset($_POST['registro'])){
    if($_POST['registro'] == 'nuevo'){
       
        try{
            require_once('../../includes/funciones/conexionBd.php');
            $stmt = $conn->prepare("INSERT INTO clientes (primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,celular_cliente,
            ubicacion_cliente,cedula,idEmpresa,idActivo) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssii", $primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$celular,$residencia,$cedula,          
                                          $idEmpresa,$activoId );
            $stmt->execute();
            if($stmt->affected_rows){
                $respuesta = array(
                    'respuesta' => 'exito'
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $conn->close();
        }catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        echo json_encode($respuesta);
    }
}
