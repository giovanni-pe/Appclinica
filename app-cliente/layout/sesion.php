<?php
session_start();
if (isset($_SESSION['sesion_email'])) {
    $email_sesion=$_SESSION['sesion_email'];
    $sql_usuarios= "SELECT us.id_usuario,us.nombres,us.email,rol.id_rol,rol.rol from tb_usuarios as us inner join tb_roles as rol on us.id_rol=rol.id_rol
    where us.email = '$email_sesion'";
    $query_usuarios=$pdo->prepare($sql_usuarios);
    $query_usuarios->execute();
    $usuarios=$query_usuarios->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($usuarios as $usuario){
      $usuario_logeado=$usuario['nombres'];
      $rol_session=$usuario['rol'];  
    }

} else {
    echo 'no existe session';
    header('Location:' . $URL . '/login/index.php');
}
?>