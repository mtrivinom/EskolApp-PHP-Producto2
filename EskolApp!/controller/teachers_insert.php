<?php

require_once('./model/conexion.php');
require_once('./model/teachers.php');

$id_teacher =$_GET['id_teacher'];

$teacher = new teacher();
$teacher->get_teacher($id_teacher);

$id_teacher =$_POST['id_teacher'];
$name =$_POST['name'];
$surname =$_POST['surname'];
$telephone =$_POST['telephone'];
$nif =$_POST['nif'];
$email =$_POST['email'];

$teacher = new teacher();
$teacher -> insert_teacher($id_teacher,$name,$surname,$telephone,$nif,$email);

if ($teacher -> insert_teacher($id_teacher,$name,$surname,$telephone,$nif,$email)) {
    echo '<br>Insertado Correctamente</br>';
}
else {
    echo '<br>No Insertado</br>';
}

require_once('./views/panel_admin.php');
require_once('./views/panel_user.php');

?>