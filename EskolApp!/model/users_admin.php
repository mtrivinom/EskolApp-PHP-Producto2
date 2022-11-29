<?php

require_once('./model/conexion.php');

class user_admin {
    public $id_user_admin;
    public $username;
    public $name;
    public $email;
    public $pass;
    private $users_admin;
    private $conexion;
    
    public function __construct(int $id_user_admin = null, string $username = null, string $name = null, string $email = null, string $pass = null) {
        $this->id_user_admin = $id_user_admin;
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
        $this->users_admin = array();
        $this->conexion = new conexion();
    }

public function get_user_admin($id_user_admin) {
    $sql = "SELECT * FROM `usesr_admin` WHERE `user_admin`.`id_user_admin`=:id_user_admin";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_user_admin',$id_user_admin,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function get_user_admin__all() {
    $sql = "SELECT * FROM users_admin";
    $query = $this->conexion -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if(count($results)>0) {
        foreach($results as $result) {
            $this->users_admin[] = $result;
        }
    }
    else
    {
        echo 'Sin Resultados';
    }
    return $this->users_admin;
}

public function delete_user_admin($id_user_admin) {
    $sql = "DELETE FROM `users_admin` WHERE `users_admin`.`id_user_admin`=:id_user_admin";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_user_admin',$id_user_admin,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function insert_user_admin($id_user_admin,$username,$name,$email,$pass) {
    $sql = "insert into users(id_user,username,name,email,pass) values(:id_user_admin,:username,:name,:email,:pass)";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_user_admin',$id_user_admin,PDO::PARAM_INT); 
    $query->bindParam(':username',$username,PDO::PARAM_STR,50);
    $query->bindParam(':name',$name,PDO::PARAM_STR,50); 
    $query->bindParam(':email',$email,PDO::PARAM_STR,50);
    $query->bindParam(':pass',$pass,PDO::PARAM_STR,50);
    $query -> execute();
    $lastInsertId = $this->conexion->lastInsertId();
    if($lastInsertId>0) {
        echo "<div class='content alert alert-primary'> Usuario Insertado/a: $name </div>";
    }
    else
    {
        echo "<div class='content alert alert-danger'> No es posible Insertar Usuario </div>";
    }
}

public function modify_user_admin($id_user_admin,$username,$name,$email,$pass) {
    $sql="UPDATE `users_admin` SET `id_user_admin`=:id_user_admin,`username`=:username,`name`=:name,`email`=:email,`pass`=:pass WHERE `users_admin`.`id_user_admin`=:id_user_admin";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_user_admin',$id_user_admin,PDO::PARAM_INT); 
    $query->bindParam(':username',$username,PDO::PARAM_STR,50);
    $query->bindParam(':name',$name,PDO::PARAM_STR,50); 
    $query->bindParam(':email',$email,PDO::PARAM_STR,50);
    $query->bindParam(':pass',$pass,PDO::PARAM_STR,50);
    $query -> execute();
    $lastInsertId = $this->conexion->lastInsertId();
    echo $query->rowCount(). "Modificado Correctamente";
}

}

?>