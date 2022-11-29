<html>

    <?php 

        require_once('./css/style.css');

        require_once('./model/conexion.php');
        require_once('./model/users.php');
        require_once('./model/schedule.php');
        require_once('./model/enrollment.php');
        require_once('./model/courses.php');
        require_once('./model/class.php');
        require_once('./model/teachers.php');

        $course = "SELECT * FROM courses";
        $clase = "SELECT * FROM class";
        $teacher = "SELECT * FROM teachers";

    
    ?>

    <header class="header">
        <meta charset="utf-8">
        <link rel="css" href="./css/style.css">
        <title class="title"> ESKOLAPP </title>
    </header>

    <body class="body">

        <div id="main-box">
        <div class="table_title">SCHEDULE</div>
        <div class=container_table>
            <div class="table_header">ID</div>
            <div class="table_header">CLASS</div>
            <div class="table_header">START</div>
            <div class="table_header">END</div>
            <div class="table_header">DAY</div>
            <?php
                $result = mysqli_query($db,$schedule);
                while($row=mysqli_fetch_assoc($result)){?>
                    <div class="table_item"><?php echo $row["id_schedule"]?></div>
                    <div class="table_item"><?php echo $row["id_class"]?></div>
                    <div class="table_item"><?php echo $row["time_start"]?></div>
                    <div class="table_item"><?php echo $row["time_end"]?></div>
                    <div class="table_item"><?php echo $row["day"]?></div>
                <?php }
                    mysqli_free_result($result);
                ?>
            ?>
        </div>

        <div id="main-box">
        <div class="table_title">ENROLLMENT</div>
        <div class=container_table>
            <div class="table_header">ID</div>
            <div class="table_header">STUDENT</div>
            <div class="table_header">COURSE</div>
            <div class="table_header">STATUS</div>
            <?php
                $result = mysqli_query($db,$enrollment);
                while($row=mysqli_fetch_assoc($result)){?>
                    <div class="table_item"><?php echo $row["id_enrollment"]?></div>
                    <div class="table_item"><?php echo $row["id_student"]?></div>
                    <div class="table_item"><?php echo $row["id_course"]?></div>
                    <div class="table_item"><?php echo $row["status"]?></div>
                <?php }
                    mysqli_free_result($result);
                ?>
            ?>
        </div>

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