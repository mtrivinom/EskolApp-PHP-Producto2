<?php

require_once('./model/conexion.php');

class teacher {
    public $id_teacher;
    public $name;
    public $surname;
    public $telephone;
    public $nif;
    public $email;
    private $teachers;
    private $conexion;
    
    public function __construct(int $id_teacher = null, string $name = null, string $surname = null, string $telephone = null, string $nif = null, string $email = null) {
        $this->id_teacher = $id_teacher;
        $this->name = $name;
        $this->surname = $surname;
        $this->telephone = $telephone;
        $this->nif = $nif;
        $this->email = $email;
        $this->teachers = array();
        $this->conexion = new conexion();
    }

public function get_teacher($id_teacher) {
    $sql = "SELECT * FROM `teachers` WHERE `teachers`.`id_teacher`=:id_teacher";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_teacher',$id_teacher,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function get_teacher_all() {
    $sql = "SELECT * FROM teachers";
    $query = $this->conexion -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if(count($results)>0) {
        foreach($results as $result) {
            $this->teachers[] = $result;
        }
    }
    else
    {
        echo 'Sin Resultados';
    }
    return $this->teachers;
}

public function delete_teacher($id_teacher) {
    $sql = "DELETE FROM `teachers` WHERE `teachers`.`id_teacher`=:id_teacher";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_teacher',$id_teacher,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function insert_teacher($id_teacher,$name,$surname,$telephone,$nif,$email) {
    $sql = "insert into teachers(id_teacher,name,surname,telephone,nif,email) values(:id_teacher,:name,:surname,:telephone,:nif,:email)";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_teacher',$id_teacher,PDO::PARAM_INT); 
    $query->bindParam(':name',$name,PDO::PARAM_STR,50); 
    $query->bindParam(':surname',$surname,PDO::PARAM_STR,50); 
    $query->bindParam(':telephone',$telephone,PDO::PARAM_STR,9);
    $query->bindParam(':nif',$nif,PDO::PARAM_STR,7);
    $query->bindParam(':email',$email,PDO::PARAM_STR,50);
    $query -> execute();
    $lastInsertId = $this->conexion->lastInsertId();
    if($lastInsertId>0) {
        echo "<div class='content alert alert-primary'> Profesor/a Insertado/a: $name </div>";
    }
    else
    {
        echo "<div class='content alert alert-danger'> No es posible Insertar Profesor/a </div>";
    }
}

public function modify_teacher($id_teacher,$name,$surname,$telephone,$nif,$email) {
    $sql="UPDATE `teachers` SET `id_teacher`=:id_teacher,`name`=:name,`surname`=:surname,`telephone`=:telephone,`nif`=:nif,`email`=:email WHERE `teachers`.`id_teacher`=:id_teacher";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_teacher',$id_teacher,PDO::PARAM_INT); 
    $query->bindParam(':name',$name,PDO::PARAM_STR,50); 
    $query->bindParam(':surname',$surname,PDO::PARAM_STR,50); 
    $query->bindParam(':telephone',$telephone,PDO::PARAM_STR,9);
    $query->bindParam(':nif',$nif,PDO::PARAM_STR,7);
    $query->bindParam(':email',$email,PDO::PARAM_STR,50);
    $query -> execute();
    $lastInsertId = $this->conexion->lastInsertId();
    echo $query->rowCount(). "Modificado Correctamente";
}

}

?>
