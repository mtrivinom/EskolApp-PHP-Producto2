
<?php 

    require_once('./model/conexion.php');
    require_once('./model/courses.php');
    $course = "SELECT * FROM courses";

    require_once('./controller/courses_controller.php');
    require_once('./controller/courses_delete.php');
    require_once('./controller/courses_insert.php');
    require_once('./controller/courses_modify.php');

?>

<html>

    <header>
        <title> ESKOLAPP </title>
    </header>

    <body>

        <div class="table_title">CURSOS</div>
        <div class=container_table>
            <div class="table_header">ID</div>
            <div class="table_header">NAME</div>
            <div class="table_header">DESCRIPTION</div>
            <div class="table_header">START</div>
            <div class="table_header">END</div>
            <div class="table_header">ACTIVE</div>
            <?php
                $result = mysqli_query($db,$course);
                while($row=mysqli_fetch_assoc($result)){?>
                    <div class="table_item"><?php echo $row["id_course"]?></div>
                    <div class="table_item"><?php echo $row["name"]?></div>
                    <div class="table_item"><?php echo $row["description"]?></div>
                    <div class="table_item"><?php echo $row["date_start"]?></div>
                    <div class="table_item"><?php echo $row["date_end"]?></div>
                    <div class="table_item"><?php echo $row["active"]?></div>
                    <div class="table_item">
                        <a href="course_modify.php?id=<?php echo $row["id_course"];?>" class="table_item_link">Modificar</a> |
                        <a href="course_delete.php?id=<?php echo $row["id_course"];?>" class="table_item_link">Eliminar</a>
                        <a href="course_insert.php?id=<?php echo $row["id_class"];?>" class="table_item_link">Insertar</a>
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

