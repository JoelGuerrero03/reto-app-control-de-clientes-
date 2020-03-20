<?php 
$user = "root";
$contrasena = "Semeolvido10";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
$servidor = "localhost";
$basededatos = "empresaautomotriz";


$conn = mysqli_connect( $servidor, $user, $contrasena ) or die ("No se ha podido conectar al servidor de Base");


$db = mysqli_select_db( $conn, $basededatos );

$db = mysqli_select_db( $conn, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

// verificar conexion 1 bien 0 mal
// echo $conn->ping();
?>