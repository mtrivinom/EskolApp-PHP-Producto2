<?php
class conexion extends PDO {
    private $bbdd = 'mysql';
    private $db_host = 'uocx-icc02-p8.uoclabs.uoc.es';
    private $db_name = 'wordpress8';
    private $db_user = 'wordpress8';
    private $db_pass = 'RywMfOeyg7INtz7b';
    public function __construct() {

        try {
            parent::__construct("{$this->bbdd}:dbname={$this->db_name};host={$this->db_host};charset=utf8", $this->db_user, $this->db_pass);
        } catch (PDOException $e) {
            echo 'No se puede Conectar con la Base de Datos. Detalle:' . $e->getMessage();
            exit;
        }
    }
}

?>
