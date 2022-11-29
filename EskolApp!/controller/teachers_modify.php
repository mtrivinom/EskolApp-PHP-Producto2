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
$teacher -> modify_teacher($id_teacher,$name,$surname,$telephone,$nif,$email);

if ($teacher -> modify_teacher($id_teacher,$name,$surname,$telephone,$nif,$email)) {
    echo '<br>Modificado Correctamente</br>';
}
else {
    echo '<br>No Modificado</br>';
}

require_once('./views/teachers_view.php');

?>
