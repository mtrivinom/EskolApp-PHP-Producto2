<?php

require_once('./model/conexion.php');

class course {
    public $id_course;
    public $name;
    public $description;
    public $date_start;
    public $date_end;
    public $active;
    private $courses;
    private $conexion;
    
    public function __construct(int $id_course = null, string $name = null, string $description = null, string $date_start = null, string $date_end = null, int $active = null) {
        $this->id_course = $id_course;
        $this->name = $name;
        $this->description = $description;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
        $this->active = $active;
        $this->courses = array();
        $this->conexion = new conexion();
    }

public function get_course($id_course) {
    $sql = "SELECT * FROM `courses` WHERE `courses`.`id_course`=:id_course";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_course',$id_course,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function get_course_all() {
    $sql = "SELECT * FROM courses";
    $query = $this->conexion -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if(count($results)>0) {
        foreach($results as $result) {
            $this->courses[] = $result;
        }
    }
    else
    {
        echo 'Sin Resultados';
    }
    return $this->courses;
}

public function delete_course($id_course) {
    $sql = "DELETE FROM `courses` WHERE `courses`.`id_course`=:id_course";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_course',$id_course,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function insert_course($id_course,$name,$description,$date_start,$date_end,$active) {
    $sql = "INSERT INTO courses(id_course,name,description,start,end,active) values(:id_course,:name,:description,:date_start,:date_end,:active)";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_course',$id_course,PDO::PARAM_INT); 
    $query->bindParam(':name',$name,PDO::PARAM_STR,100); 
    $query->bindParam(':description',$description,PDO::PARAM_STR,1000); 
    $query->bindParam(':date_start',$date_start,PDO::PARAM_STR,100);
    $query->bindParam(':date_end',$date_end,PDO::PARAM_STR,100);
    $query->bindParam(':active',$active,PDO::PARAM_INT);
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

public function modify_course($id_course,$name,$description,$date_start,$date_end,$active) {
    $sql="UPDATE `courses` SET `id_course`=:id_course,`name`=:name,`description`=:description,`date_start`=:date_start,`date_end`=:date_end,`active`=:active WHERE `courses`.`id_course`=:id_course";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_course',$id_course,PDO::PARAM_INT); 
    $query->bindParam(':name',$name,PDO::PARAM_STR,100); 
    $query->bindParam(':description',$description,PDO::PARAM_STR,1000); 
    $query->bindParam(':date_start',$date_start,PDO::PARAM_STR,100);
    $query->bindParam(':date_end',$date_end,PDO::PARAM_STR,100);
    $query->bindParam(':active',$active,PDO::PARAM_INT);
    $query -> execute();
    $lastInsertId = $this->conexion->lastInsertId();
    echo $query->rowCount(). "Modificado Correctamente";
}

}

?>
