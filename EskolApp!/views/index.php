<?php

    require_once('./model/conexion.php');
    require_once('./model/courses.php');
    require_once('./model/class.php');
    require_once('./model/teachers.php');

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

<html>

    <header>
        <title> ESKOLAPP </title>
    </header>

    <body>

        <h1> CURSOS </h1>
        <p>SELECT * FROM courses </p>
        <?php
            $course = new course();
            $courses = $course->get_course_all();
            if(count($courses)>0) {
                foreach($courses as $result); {
                    echo "<div>
                        <span>".$result -> id_course."</span>
                        <span>".$result -> name."</span>
                        <span>".$result -> description."</span>
                        <span>".$result -> date_start."</span>
                        <span>".$result -> date_end."</span>
                        <span>".$result -> active."</span>
                        <span><a href=\"courses_modify.php?id=".$result -> id_course."\">Modificar</a></span>
                        <span><a href=\"courses_delete.php?id=".$result -> id_course."\">Borrar</a></span>
                        </div>";
                }
            }
            else
            {
                echo 'Sin Resultados';
            }
        ?>
        <p>
            <a href="courses_insert.php">Insertar</a>
        </p>
        
        <h1> CLASES </h1>
        <p>SELECT * FROM class </p>
        <?php
            $clase = new clase();
            $clases = $clase->get_clase_all();
            if(count($clases)>0) {
                foreach($clases as $result) {
                    echo "<div>
                        <span>".$result -> id_class."</span>
                        <span>".$result -> id_teacher."</span>
                        <span>".$result -> id_course."</span>
                        <span>".$result -> id_schedule."</span>
                        <span>".$result -> name."</span>
                        <span>".$result -> color."</span>
                        <span><a href=\"class_modify.php?id=".$result -> id_class."\">Modificar</a></span>
                        <span><a href=\"class_delete.php?id=".$result -> id_class."\">Borrar</a></span>
                    </div>";
                }
            }
            else
            {
                echo 'Sin Resultados';
            }
        ?>
        <p>
            <a href="class_insert.php">Insertar</a>
        </p>
        
        <h1> PROFESORES </h1>
        <p>SELECT * FROM teachers </p>
        <?php
            $teacher = new teacher();
            $teachers = $teacher->get_teacher_all();
            if(count($teachers)>0) {
                foreach($teachers as $result) {
                    echo "<div>
                        <span>".$result -> id_teacher."</span>
                        <span>".$result -> name."</span>
                        <span>".$result -> surname."</span>
                        <span>".$result -> telephone."</span>
                        <span>".$result -> nif."</span>
                        <span>".$result -> email."</span>
                        <span><a href=\"teachers_modify.php?id=".$result -> id_teacher."\">Modificar</a></span>
                        <span><a href=\"teachers_delete.php?id=".$result -> id_teacher."\">Borrar</a></span>
                    </div>";
                }
            }
            else
            {
                echo 'Sin Resultados';
            }
        ?>
        <p>
            <a href="teachers_insert.php">Insertar/a</a>
        </p>


    </body>

    <footer>
        <b> Ⓒ 2022 Pinpilinpauxa </b>
    </footer>

</html>