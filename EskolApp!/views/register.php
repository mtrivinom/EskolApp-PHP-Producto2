<?php

require_once('./model/conexion.php');
require_once('./model/users.php');
require_once('./forms/users_form.php');

if(isset($_POST['submit'])){

    if(!isset($_SESSION)){
        session_start();
    }

    $username = isset($_POST['username']) ? mysqli_real_escape_string($db, $_POST['username']) : false;
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $pass = isset($_POST['pass']) ? mysqli_real_escape_string($db, trim($_POST['pass'])) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

    $error = array();

    if(!empty($username)){
        $username_validate = true;
    }else{
        $username_validate = false;
        $error['username'] = "Error: Escoge otro Username";
    }

    if(!empty($name)){
        $name_validate = true;
    }else{
        $name_validate = false;
        $error['name'] = "Error: Escoge otro Name";
    }

    if(!empty($email)){
        $email_validate = true;
    }else{
        $email_validate = false;
        $error['email'] = "Error: Escoge otro Email";
    }

    if(!empty($pass)){
        $pass_validate = true;
    }else{
        $pass_validate = false;
        $error['pass'] = "Error: Escoge otro Pass";
    }

    $save = false;    
    if(count($error) == 0){
        $save = true; 
        $sql = "INSERT INTO users VALUES(null, '$username', '$name', '$email', '$pass');";
        $save = mysqli_query($db, $sql);       
        if($save){
            $_SESSION['correcto'] = "Usuario Registrado";
        }else{
            $_SESSION['error'] = "Error: Usuario No Registrado";
        }
        
    }else{
        $_SESSION['error'] = $error;  
    }
}

?>