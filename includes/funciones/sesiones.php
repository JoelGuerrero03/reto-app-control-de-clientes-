<?php
session_start();
session_destroy();
function usuario_autenticado(){
    if(!revisar_usuario() ){
        header('Location:login.php');
        exit();
    }

}
function revisar_usuario(){
    return isset($_SESSION['nombre']);

}
usuario_autenticado();