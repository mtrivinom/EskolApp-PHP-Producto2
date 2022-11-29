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

public function delete_user($id_user) {
    $sql = "DELETE FROM `users` WHERE `users`.`id_user`=:id_user";
    $query = $this->conexion -> prepare($sql);
    $query -> bindParam(':id_user',$id_user,PDO::PARAM_INT);
    $query -> execute();
    $results = $query -> fetch(PDO::FETCH_ASSOC);
    return $results;
}

public function insert_user($id_user,$username,$name,$email,$pass) {
    $sql = "insert into users(id_user,username,name,email,pass) values(:id_user,:username,:name,:email,:pass)";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_user',$id_user,PDO::PARAM_INT); 
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

public function modify_user($id_user,$username,$name,$email,$pass) {
    $sql="UPDATE `users` SET `id_user`=:id_user,`username`=:username,`name`=:name,`email`=:email,`pass`=:pass WHERE `users`.`id_user`=:id_user";
    $query = $this->conexion -> prepare($sql);
    $query->bindParam(':id_user',$id_user,PDO::PARAM_INT); 
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
