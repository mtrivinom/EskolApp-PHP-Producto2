
<?php 

    require_once('./model/conexion.php');
    require_once('./model/teachers.php');
    $teacher = "SELECT * FROM teachers";

    require_once('./controller/teachers_controller.php');
    require_once('./controller/teachers_delete.php');
    require_once('./controller/teachers_insert.php');
    require_once('./controller/teachers_modify.php');

?>

<html>

    <header>
        <title> ESKOLAPP </title>
    </header>

    <body>

        <div class="table_title">PROFESORES</div>
        <div class=container_table>
            <div class="table_header">ID</div>
            <div class="table_header">NAME</div>
            <div class="table_header">SURNAME</div>
            <div class="table_header">TELEPHONE</div>
            <div class="table_header">NIF</div>
            <div class="table_header">EMAIL</div>
            <?php
                $result = mysqli_query($db,$teacher);
                while($row=mysqli_fetch_assoc($result)){?>
                    <div class="table_item"><?php echo $row["id_teacher"]?></div>
                    <div class="table_item"><?php echo $row["name"]?></div>
                    <div class="table_item"><?php echo $row["surname"]?></div>
                    <div class="table_item"><?php echo $row["telephone"]?></div>
                    <div class="table_item"><?php echo $row["nif"]?></div>
                    <div class="table_item"><?php echo $row["email"]?></div>
                    <div class="table_item">
                        <a href="teacher_modify.php?id=<?php echo $row["id_class"];?>" class="table_item_link">Modificar</a>
                        <a href="teacher_delete.php?id=<?php echo $row["id_class"];?>" class="table_item_link">Eliminar</a>
                        <a href="teacher_insert.php?id=<?php echo $row["id_class"];?>" class="table_item_link">Insertar</a>
                    </div>
                <?php }
                    mysqli_free_result($result);
                ?>
            ?>
        </div>

    </body>  

    <footer>
        <b> Ⓒ 2022 Pinpilinpauxa </b>
    </footer>

</html>

