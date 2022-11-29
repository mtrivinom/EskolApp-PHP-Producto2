
<html>

    <?php 

        require_once('./css/style.css');

        require_once('./model/conexion.php');
        require_once('./model/courses.php');
        require_once('./model/class.php');
        require_once('./model/teachers.php');

        $course = "SELECT * FROM courses";
        $clase = "SELECT * FROM class";
        $teacher = "SELECT * FROM teachers";

        require_once('./views/courses_view.php');
        require_once('./views/class_view.php');
        require_once('./views/teachers_view.php');
    
        require_once('./controller/courses_controller.php');
        require_once('./controller/courses_delete.php');
        require_once('./controller/courses_insert.php');
        require_once('./controller/courses_modify.php');
    
        require_once('./controller/class_controller.php');
        require_once('./controller/class_delete.php');
        require_once('./controller/class_insert.php');
        require_once('./controller/class_modify.php');
    
        require_once('./controller/teachers_controller.php');
        require_once('./controller/teachers_delete.php');
        require_once('./controller/teachers_insert.php');
        require_once('./controller/teachers_modify.php');

    ?>

    <header class="header">
        <title class="title"> ESKOLAPP </title>
    </header>

    <body class="body">

        <div id="main-box">
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
        
        <div id="main-box">
        <div class="table_title">CLASES</div>
        <div class=container_table>
            <div class="table_header">ID</div>
            <div class="table_header">NAME</div>
            <div class="table_header">TEACHER</div>
            <div class="table_header">COURSE</div>
            <div class="table_header">SCHEDULE</div>
            <div class="table_header">COLOR</div>
            <?php
                $result = mysqli_query($db,$clase);
                while($row=mysqli_fetch_assoc($result)){?>
                    <div class="table_item"><?php echo $row["id_class"]?></div>
                    <div class="table_item"><?php echo $row["name"]?></div>
                    <div class="table_item"><?php echo $row["id_teacher"]?></div>
                    <div class="table_item"><?php echo $row["id_course"]?></div>
                    <div class="table_item"><?php echo $row["id_schedule"]?></div>
                    <div class="table_item"><?php echo $row["color"]?></div>
                    <div class="table_item">
                        <a href="class_modify.php?id=<?php echo $row["id_class"];?>" class="table_item_link">Modificar</a>
                        <a href="class_delete.php?id=<?php echo $row["id_class"];?>" class="table_item_link">Eliminar</a>
                        <a href="class_insert.php?id=<?php echo $row["id_class"];?>" class="table_item_link">Insertar</a>
                    </div>
                <?php }
                    mysqli_free_result($result);
                ?>
            ?>
        </div>
        
        <div id="main-box">
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

    <footer class="footer">
        <b> Ⓒ 2022 Pinpilinpauxa </b>
    </footer>

</html>