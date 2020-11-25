<?php
session_start();
require_once '../conexion/Conexion.php';


$nick = $_POST["nick"];
$clave = $_POST["clave"];


$SQL = "select usuarios.codigo_usuario,usuarios.nick_usuario,usuarios.clave_usuario, usuarios.nombre_usuario,usuarios.apellido_usuario,usuarios.direccion_usuario,usuarios.email_usuario,usuarios.clave_usuario, perfiles.codigo_perfil, perfiles.nombre_perfil from Usuarios inner join perfiles on perfiles.codigo_perfil = usuarios.codigo_perfil where nick_usuario = '$nick' and clave_usuario = '$clave'";

$consulta = mysqli_query($conexion, $SQL);
/*Recordad que en la base de datos cambiar los campos cliente por usuario*/
if($consulta->num_rows > 0){
    //$row = $consulta->fetch_assoc(MYSQLI_ASSOC);
    $row = $consulta->fetch_assoc();
    $codigo_usuario = $row['codigo_usuario'];
    $nombre_usuario = $row['nick_usuario'];
    $codigo_perfil = $row['codigo_perfil'];
    $nombre_perfil = $row['nombre_perfil'];
    $nombre_pila = $row['nombre_usuario'];
    $apellido_usuario = $row['apellido_usuario'];
    $direccion_usuario = $row['direccion_usuario'];
    $email_usuario = $row['email_usuario'];
    $clave_usuario = $row['clave_usuario'];
    

    if($codigo_perfil== 1){
        $_SESSION['nick_usuario'] = $nombre_usuario;
        $_SESSION['nombre_perfil'] = $nombre_perfil;
        header("Location:http://localhost/ProyectoWeb/vista/Panel_administrador.php");
    }else{
        $_SESSION['codigo_usuario'] = $codigo_usuario;
        $_SESSION['nick_usuario'] = $nombre_usuario;
        $_SESSION['nombre_perfil'] = $nombre_perfil;
        $_SESSION['nombre_usuario'] = $nombre_pila;
        $_SESSION['apellido_usuario'] = $apellido_usuario;
        $_SESSION['direccion_usuario'] = $direccion_usuario;
        $_SESSION['email_usuario'] = $email_usuario;
        $_SESSION['clave_usuario'] = $clave_usuario;
        header("Location:http://localhost/ProyectoWeb/vista/panel.php");
    } 
    
}else{

    header("Location:http://localhost/ProyectoWeb/vista/login.php");
    
    
}


mysqli_free_result($consulta);
mysqli_close($conexion);

 ?>