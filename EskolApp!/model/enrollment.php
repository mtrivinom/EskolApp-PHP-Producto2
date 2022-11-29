<?php

require_once('./model/conexion.php');
require_once('./model/student.php');
require_once('./model/course.php');

class enrollment {
    public $id_enrollment;
    public $id_student;
    public $id_course;
    public $status;
    private $enrollments;
    private $conexion;
    
    public function __construct(int $id_enrollment = null, int $id_student = null, int $id_course = null, string $status = null) {
        $this->id_enrollment = $id_enrollment;
        $this->id_student = $id_student;
        $this->id_course = $id_course;
        $this->status = $status;
        $this->enrollments = array();
        $this->conexion = new conexion();
    }

public function get_enrollment($id_erollment) {
    $sql = "SELECT * FROM `enrollment` WHERE `enrollment`.`id_enrollment`=:id_enrollment";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_enrollment',$id_enrollment,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function get_enrollment_all() {
    $sql = "SELECT * FROM enrollment";
    $query = $this->conexion -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if(count($results)>0) {
        foreach($results as $result) {
            $this->enrollments[] = $result;
        }
    }
    else
    {
        echo 'Sin Resultados';
    }
    return $this->enrollments;
}

}

?>
