<?php

require_once('./model/conexion.php');
require_once('./model/class.php');

$clase = new clase();
$clases = $clase->get_clase_all();

require_once('./views/class_view.php');

?>