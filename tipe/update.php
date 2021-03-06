<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Control-Type,
        Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/type.php';

$database = new Database();
$db = $database->getConnection();
$tipe = new Tipe($db);

$data = json_decode(file_get_contents("php://input"));
$tipe->id = $data->id;
$tipe->status = $data->status;
$tipe->tipe = $data->tipe;
$tipe->deskripsi = $data->$deskripsi;

if($tipe->update()){
  http_response_code(200);
  echo json_encode(array("message" => "Tipe Sudah Diubah"));
}else{
  http_response_code(503);
  echo json_encode(array("message" => "Tipe GAGAL Diubah."));
}
?>
