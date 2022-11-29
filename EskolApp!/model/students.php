<?php

require_once('./model/conexion.php');

class student {
    public $id_student;
    public $username;
    public $pass;
    public $email;
    public $name;
    public $surname;
    public $telephone;
    public $nif;
    public $date;
    private $students;
    private $conexion;
    
    public function __construct(int $id_student = null, string $username = null, string $pass = null, string $email = null, string $name = null, string $surname = null, string $telephone = null, string $nif = null, string $date = null) {
        $this->id_student = $id_student;
        $this->username = $username;
        $this->pass = $pass;
        $this->email = $email;
        $this->name = $name;
        $this->surname = $surname;
        $this->telephone = $telephone;
        $this->nif = $nif;
        $this->date = $date;
        $this->students = array();
        $this->conexion = new conexion();
    }

public function get_student($id_student) {
    $sql = "SELECT * FROM `students` WHERE `students`.`id_student`=:id_student";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_student',$id_student,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function get_student_all() {
    $sql = "SELECT * FROM students";
    $query = $this->conexion -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if(count($results)>0) {
        foreach($results as $result) {
            $this->students[] = $result;
        }
    }
    else
    {
        echo 'Sin Resultados';
    }
    return $this->students;
}

}

?>
