<?php

require_once('./model/conexion.php');
require_once('./model/users.php');
require_once('./forms/users_form.php');

if(isset($_POST)){
    
    if(isset($_SESSION['error'])){
        unset($_SESSION['error']);
    }

    $username = trim($_POST['username']);
    $pass = trim($_POST['pass']);

    $sql_user = "SELECT * FROM users WHERE id_user = 'id_user'";
    $login_user = mysqli_query($db, $sql_user);

    $sql_admin = "SELECT * FROM users_admin WHERE email = 'email'";
    $login_admin = mysqli_query($db, $sql_admin);

    if($login_user && mysqli_num_rows($login_user) == 1){
        $user = mysqli_fetch_assoc($login_user);
        if($pass){
            $_SESSION['user'] = $user;
        }else{
            $_SESSION['error'] = "Error: No se puede iniciar sesión";  
        }   
    }else{
        $_SESSION['error'] = "Error: No se puede iniciar sesión";
    }
}

?>

