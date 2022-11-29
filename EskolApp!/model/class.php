<?php

require_once('./model/conexion.php');
require_once('./model/teacher.php');
require_once('./model/course.php');
require_once('./model/schedule.php');

class clase {
    public $id_class;
    public $id_teacher;
    public $id_course;
    public $id_schedule;
    public $name;
    public $color;
    private $clases;
    private $conexion;
    
    public function __construct(int $id_class = null, int $id_teacher = null, int $id_course = null, int $id_schedule = null, string $name = null, string $color = null) {
        $this->id_class = $id_class;
        $this->id_teacher = $id_teacher;
        $this->id_course = $id_course;
        $this->id_schedule = $id_schedule;
        $this->name = $name;
        $this->color = $color;
        $this->clases = array();
        $this->conexion = new conexion();
    }

public function get_clase($id_class) {
    $sql = "SELECT * FROM `class` WHERE `class`.`id_class`=:id_class";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_class',$id_class,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function get_clase_all() {
    $sql = "SELECT * FROM class";
    $query = $this->conexion -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if(count($results)>0) {
        foreach($results as $result) {
            $this->clases[] = $result;
        }
    }
    else
    {
        echo 'Sin Resultados';
    }
    return $this->clases;
}

public function delete_clase($id_class) {
    $sql = "DELETE FROM `class` WHERE `class`.`id_class`=:id_class";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_class',$id_class,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function insert_clase($id_class,$id_teacher,$id_course,$id_schedule,$name,$color) {
    $sql = "insert into class(id_class,id_teacher,id_course,id_schedule,name,color) values(:id_class,:id_teacher,:id_course,:id_schedule,:name,:color)";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_class',$id_class,PDO::PARAM_INT); 
    $query->bindParam(':id_teacher',$id_teacher,PDO::PARAM_INT); 
    $query->bindParam(':id_course',$id_course,PDO::PARAM_INT); 
    $query->bindParam(':id_schedule',$id_schedule,PDO::PARAM_INT); 
    $query->bindParam(':name',$name,PDO::PARAM_STR,100); 
    $query->bindParam(':color',$color,PDO::PARAM_STR,10); 
    $query -> execute();
    $lastInsertId = $this->conexion->lastInsertId();
    if($lastInsertId>0) {
        echo "<div class='content alert alert-primary'> Curso Insertado: $name </div>";
    }
    else
    {
        echo "<div class='content alert alert-danger'> No es posible Insertar el Curso </div>";
    }
}

public function modify_clase($id_class,$id_teacher,$id_course,$id_schedule,$name,$color) {
    $sql="UPDATE `class` SET `id_class`=:id_class,`id_teacher`=:id_teacher,`id_course`=:id_course,`id_schedule`=:id_schedule,`name`=:name,`color`=:color WHERE `class`.`id_class`=:id_class";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_class',$id_class,PDO::PARAM_INT); 
    $query->bindParam(':id_teacher',$id_teacher,PDO::PARAM_INT); 
    $query->bindParam(':id_course',$id_course,PDO::PARAM_INT); 
    $query->bindParam(':id_schedule',$id_schedule,PDO::PARAM_INT); 
    $query->bindParam(':name',$name,PDO::PARAM_STR,100); 
    $query->bindParam(':color',$color,PDO::PARAM_STR,10); 
    $query -> execute();
    $lastInsertId = $this->conexion->lastInsertId();
    echo $query->rowCount(). "Curso Modificado Correctamente";
}

}

?>
