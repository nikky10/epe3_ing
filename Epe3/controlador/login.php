<?php
session_start();
require_once '../conexion/Conexion.php';


$rut = $_POST["rut"];
$pass = $_POST["clave"];
//var_dump($rut, $pass);
//die();


$SQL = "select usuarios.codigo_usuario,usuarios.rut_usuario,usuarios.clave_usuario,
         usuarios.nombre_usuario,usuarios.apellido_usuario,usuarios.direccion_usuario,
         usuarios.email_usuario,usuarios.clave_usuario, perfiles.codigo_perfil, 
         perfiles.nombre_perfil from Usuarios inner join perfiles on perfiles.codigo_perfil = usuarios.codigo_perfil where rut_usuario = '$rut' and clave_usuario = '$pass';";

$consulta = mysqli_query($conexion, $SQL);
/*Recordad que en la base de datos cambiar los campos cliente por usuario*/
if($consulta->num_rows > 0){
    //$row = $consulta->fetch_assoc(MYSQLI_ASSOC);
    $row = $consulta->fetch_assoc();
    $codigo_usuario = $row['codigo_usuario'];
    $rut_usuario = $row['rut_usuario'];
    $codigo_perfil = $row['codigo_perfil'];
    $nombre_perfil = $row['nombre_perfil'];
    $nombre_pila = $row['nombre_usuario'];
    $apellido_usuario = $row['apellido_usuario'];
    $direccion_usuario = $row['direccion_usuario'];
    $email_usuario = $row['email_usuario'];
    $clave_usuario = $row['clave_usuario'];
    
   // var_dump($row);
   // die();
    if($codigo_perfil== 1){
        $_SESSION['rut_usuario'] = $nombre_usuario;
        $_SESSION['nombre_perfil'] = $nombre_perfil;
        header("Location:http://localhost/epe3_ing/Epe3/vista/profesor/panel_profesor.php");
    }else{
        $_SESSION['codigo_usuario'] = $codigo_usuario;
        $_SESSION['rut_usuario'] = $nombre_usuario;
        $_SESSION['nombre_perfil'] = $nombre_perfil;
        $_SESSION['nombre_usuario'] = $nombre_pila;
        $_SESSION['apellido_usuario'] = $apellido_usuario;
        $_SESSION['direccion_usuario'] = $direccion_usuario;
        $_SESSION['email_usuario'] = $email_usuario;
        $_SESSION['clave_usuario'] = $clave_usuario;
        header("Location:http://localhost/epe3_ing/Epe3/vista/alumno/panel_alumno.php");
    } 
    
}else{

    header("Location:http://localhost/Epe3_ing/Epe3/vista/index.php");
    
    
}


mysqli_free_result($consulta);
mysqli_close($conexion);

 ?>