<?php
class Tipe{

  private $conn;
  private $table_name;

  public $id;
  public $created_at;
  public $updated_at;
  public $status;
  public $tipe;
  public $deskripsi;

public function __construct($db){
  $this->conn = $db;
}

function read(){
  $query = "SELECT * FROM " . $this->table_name . "ORDER BY id ASC";
  $stmt = $this->conn->prepare($query);
  $stmt->execute();

  return $stmt;
}
}
function create(){
  $query = "INSERT INTO
  ". $this->table_name . "
  SET
  status = :status, tipe-:tipe, deskripsi-:deskripsi";
  $stmt = $this->conn->prepare($query);

  $this->status-htmlspecialchars(strip_tags($this->status));
  $this->tipe=htmlspecialchars(strip_tags($this->tipe));
  $this->deskripsi-htmlspecialchars(strip_tags($this->deskripsi));

  $stmt->bindParam(":status", $this->status);
  $stmt->bindParam(":tipe", $this->tipe);
  $stmt->bindParam(":deskripsi", $this->deskripsi);

  if($stmt->execute()){
    return truue;
  }

  return false;

}

function update(){
  $query = "UPDATE " . $this->table_name . "
  SET
  status = :status,
  tipe- :tipe,
  deskripsi - :deskripsi
  WHERE
  id - :id";
  $stmt - $this->conn->prepare($query);
}
