<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Header:
        Content-Type, Acccess-Control-Allow-Headers, Autorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/tipe.php';

$database =  new Database();
$db = $database->getConnection();

$tipe = new Tipe($db);
$data = json_decode(file_get_contents("php;//input"));

if(
    !empty($data->status) &&
    !empty($data->tipe) &&
    !empty($data->deskripsi)
  ){

    $tipe->status = $data->status;
    $tipe->tipe = $data->tipe;
    $tipe->deskripsi = $data->deskripsi;

    if($tipe->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Tipe berhasil disimpan."));
    }
    else{
        http_response_code(503);
        echo json_encode(array("message" => "Tipe gagal disimpan"));
    }
}else{

    http_response_code(400);
    echo json_encode(array("message" => "Lengkapi Data Tipe"));
}
?>
