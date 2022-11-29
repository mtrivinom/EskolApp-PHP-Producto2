<?php

require_once('./model/conexion.php');
require_once('./model/courses.php');

$course = new course();
$courses = $course->get_course_all();

require_once('./views/panel_admin.php');
require_once('./views/panel_user.php');

?>