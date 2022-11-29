<?php

require_once('./model/conexion.php');
require_once('./model/teachers.php');

$teacher = new teacher();
$teachers = $teacher->get_teacher_all();

require_once('./views/teachers_view.php');

?>