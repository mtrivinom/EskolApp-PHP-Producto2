<?php

require_once('./model/conexion.php');
require_once('./model/teachers.php');

$teacher = new teacher();
$teachers = $teacher->get_teacher_all();

require_once('./views/panel_admin.php');
require_once('./views/panel_user.php');

?>