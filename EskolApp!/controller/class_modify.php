<?php

require_once('./model/conexion.php');
require_once('./model/class.php');

$id_class =$_GET['id_class'];

$clase = new clase($id_class,$id_teacher,$id_course,$id_schedule,$name,$color);
$clase -> get_clase($id_class);

$id_class =$_POST['id_class'];
$id_teacher =$_POST['id_teacher'];
$id_course =$_POST['id_course'];
$id_schedule =$_POST['id_schedule'];
$name =$_POST['name'];
$color =$_POST['color'];

$clase = new clase();
$clase -> modify_clase($id_class,$id_teacher,$id_course,$id_schedule,$name,$color);

if ($clase -> modify_clase($id_class,$id_teacher,$id_course,$id_schedule,$name,$color)) {
    echo '<br>Modificado Correctamente</br>';
}
else {
    echo '<br>No Modificado</br>';
}

require_once('./views/class_view.php');

?>
