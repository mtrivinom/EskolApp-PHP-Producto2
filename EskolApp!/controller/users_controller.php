<?php

require_once('./model/conexion.php');
require_once('./model/users.php');

$user = new user();
$users = $user->get_user_all();

require_once('./views/panel_admin.php');
require_once('./views/panel_user.php');

?>