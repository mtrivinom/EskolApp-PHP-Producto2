<?php

require_once('./model/conexion.php');
require_once('./model/teachers.php');

$id_teacher =$_GET['id_teacher'];

$teacher = new teacher();
$teacher -> delete_teacher($id_teacher);

if ($teacher -> delete_teacher($id_teacher)) {
    echo '<br>Borrado Correctamente</br>';
}
else {
    echo '<br>No Borrado</br>';
}

require_once('./views/panel_admin.php');
require_once('./views/panel_user.php');

?>