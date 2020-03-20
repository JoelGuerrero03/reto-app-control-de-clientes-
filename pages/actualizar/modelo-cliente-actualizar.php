<?php
$primer_nombre      = $_POST['primer_nombre'];
$segundo_nombre     = $_POST['segundo_nombre'];
$primer_apellido    = $_POST['primer_apellido'];
$segundo_apellido   = $_POST['segundo_apellido'];
$celular            = $_POST['celular'];
$residencia         = $_POST['residencia'];
$cedula             = $_POST['cedula'];
$idEmpresa          = $_POST['nombre_empresa'];
$idregistro         = $_POST['id_registro'];
$activoId           = $_POST['activo'];
if(isset($_POST['registro'])){
    if($_POST['registro'] == 'actualizar'){
        try{
            require_once('../../includes/funciones/conexionBd.php');
            $stmt = $conn->prepare('UPDATE clientes SET primer_nombre = ?, segundo_nombre = ?, primer_apellido =?, segundo_apellido =?,
             celular_cliente =?, ubicacion_cliente=?, cedula =?,idEmpresa=?,idActivo=? WHERE 	idClientes = ? ');
            $stmt->bind_param("sssssssiii", $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido,
                                          $celular, $residencia, $cedula, $idEmpresa,$activoId,$idregistro);
            $stmt->execute();
            $respuesta = [];
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
        die(json_encode($respuesta));
    }
}
