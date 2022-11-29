<?php

require_once('./model/conexion.php');

class user {
    public $id_user;
    public $username;
    public $name;
    public $email;
    public $pass;
    private $users;
    private $conexion;
    
    public function __construct(int $id_user = null, string $username = null, string $name = null, string $email = null, string $pass = null) {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
        $this->users = array();
        $this->conexion = new conexion();
    }

public function get_user($id_user) {
    $sql = "SELECT * FROM `users` WHERE `user`.`id_user`=:id_user";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_user',$id_user,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function get_user_all() {
    $sql = "SELECT * FROM users";
    $query = $this->conexion -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if(count($results)>0) {
        foreach($results as $result) {
            $this->users[] = $result;
        }
    }
    else
    {
        echo 'Sin Resultados';
    }
    return $this->users;
}

}

?>
