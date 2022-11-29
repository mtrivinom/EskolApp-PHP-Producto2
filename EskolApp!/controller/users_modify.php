<?php

require_once('./model/conexion.php');
require_once('./model/users.php');

$id_user =$_GET['id_user'];

$user = new user();
$user->get_user($id_user);

$id_user =$_POST['id_user'];
$username =$_POST['username'];
$name =$_POST['name'];
$email =$_POST['email'];
$pass =$_POST['pass'];

$user = new user();
$user -> modify_user($id_user,$username,$name,$email,$pass);

if ($user -> modify_user($id_user,$username,$name,$email,$pass)) {
    echo '<br>Insertado Correctamente</br>';
}
else {
    echo '<br>No Insertado</br>';
}

require_once('./views/users_view.php');

?>