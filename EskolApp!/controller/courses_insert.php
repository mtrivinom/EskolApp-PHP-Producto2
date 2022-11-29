<?php

require_once('./model/conexion.php');
require_once('./model/courses.php');

$id_course =$_GET['id_course'];

$course = new course();
$course -> get_course($id_course);

$id_course =$_POST['id_course'];
$name =$_POST['name'];
$description =$_POST['description'];
$date_start =$_POST['date_start'];
$date_end =$_POST['date_end'];
$active =$_POST['active'];

$course = new course();
$course -> insert_course($id_course,$name,$description,$date_start,$date_end,$active);

if ($curso -> insert_course($id_course,$name,$description,$date_start,$date_end,$active)) {
    echo '<br>Insertado Correctamente</br>';
}
else {
    echo '<br>No Insertado</br>';
}

require_once('./views/panel_admin.php');
require_once('./views/panel_user.php');

?>