<?php

require_once('./model/conexion.php');
require_once('./model/class.php');

$id_class =$_GET['id_class'];

$clase = new clase();
$clase -> delete_clase($id_class);

if ($clase -> delete_clase($id_clase)) {
    echo '<br>Borrado Correctamente</br>';
}
else {
    echo '<br>No Borrado</br>';
}

require_once('./views/panel_admin.php');
require_once('./views/panel_user.php');

?>