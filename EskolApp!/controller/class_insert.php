<?php

require_once('./model/conexion.php');
require_once('./model/class.php');

$id_class =$_GET['id_class'];

$clase = new clase();
$clase -> get_clase($id_class);

$id_class =$_POST['id_class'];
$id_teacher =$_POST['id_teacher'];
$id_course =$_POST['id_course'];
$id_schedule =$_POST['id_schedule'];
$name =$_POST['name'];
$color =$_POST['color'];

$clase = new clase();
$clase -> insert_clase($id_class,$id_teacher,$id_course,$id_schedule,$name,$color);

if ($clase -> insert_clase($id_class,$id_teacher,$id_course,$id_schedule,$name,$color)) {
    echo '<br>Insertado Correctamente</br>';
}
else {
    echo '<br>No Insertado</br>';
}

require_once('./views/panel_admin.php');
require_once('./views/panel_user.php');

?>