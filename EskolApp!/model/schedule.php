<?php

require_once('./model/conexion.php');
require_once('./model/class.php');

class schedule {
    public $id_schedule;
    public $id_class;
    public $time_start;
    public $time_end;
    public $day;
    private $schedules;
    private $conexion;
    
    public function __construct(int $id_schedule = null, int $id_class = null, string $time_start = null, string $time_end = null, string $day = null) {
        $this->id_schedule = $id_schedule;
        $this->id_class = $id_class;
        $this->time_start = $time_start;
        $this->time_end = $time_end;
        $this->day = $day;
        $this->schedules = array();
        $this->conexion = new conexion();
    }

public function get_schedule($id_schedule) {
    $sql = "SELECT * FROM `schedule` WHERE `schedule`.`id_schedule`=:id_schedule";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_schedule',$id_schedule,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function get_schedule_all() {
    $sql = "SELECT * FROM schedule";
    $query = $this->conexion -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if(count($results)>0) {
        foreach($results as $result) {
            $this->schedules[] = $result;
        }
    }
    else
    {
        echo 'Sin Resultados';
    }
    return $this->schedules;
}

}

?>
