<?php

require_once('./model/conexion.php');
require_once('./model/courses.php');

$id_course =$_GET['id_course'];

$course = new course();
$course -> delete_course($id_course);

if ($course -> delete_course($id_course)) {
    echo '<br>Borrado Correctamente</br>';
}
else {
    echo '<br>No Borrado</br>';
}

require_once('./views/courses_view.php');

?>