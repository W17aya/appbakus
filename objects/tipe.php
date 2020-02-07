<?php
class Tipe{

    private $conn;
    private $table_name = "tipe";

    private $id;
    private $created_at;
    private $updated_at;
    private $status;
    private $tipe;
    private $deskripsi;

    public function __construct($db){
        $this->conn = $db;
    }
    

    function read(){
        $query =" SELECT * FROM ". $this->table_name." ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt = execute();
        
        return $stmt;
    }
}?>