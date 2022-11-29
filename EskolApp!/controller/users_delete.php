<?php

require_once('./model/conexion.php');
require_once('./model/users.php');

$id_user =$_GET['id_user'];

$user = new user();
$user -> delete_user($id_user);

if ($user -> delete_user($id_user)) {
    echo '<br>Borrado Correctamente</br>';
}
else {
    echo '<br>No Borrado</br>';
}

require_once('./views/panel_admin.php');
require_once('./views/panel_user.php');

?>