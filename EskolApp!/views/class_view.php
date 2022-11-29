
<?php 

    require_once('./css/style.css');

    require_once('./model/conexion.php');
    require_once('./model/class.php');
    $clase = "SELECT * FROM class";

    require_once('./controller/class_controller.php');
    require_once('./controller/class_delete.php');
    require_once('./controller/class_insert.php');
    require_once('./controller/class_modify.php');

?>

<html>

    <header class="header">
        <title class="title">> ESKOLAPP </title>
    </header>

    <body class="body">
 
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

    </body>  

    <footer class="footer">
        <b> Ⓒ 2022 Pinpilinpauxa </b>
    </footer>

</html>

