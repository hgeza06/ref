<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once('../Model/Film.php');
require_once('../Connect/Connect.php');

$database = new Database();
$db = $database->getConnection();

$film = new Film($db);
$data = json_decode(file_get_contents("php://input"));

if(	 !empty($data->cim) &&!empty($data->szabadhely) &&!empty($data->jegyar)){
	
	$film->cim=$data->cim;
	$film->szabadhely=$data->szabadhely;
	$film->jegyar=$data->jegyar;
	
	if($film->create()){
		http_response_code(201);
		echo json_encode(array("massage"=>"Film feltöltve!"));
	
	}else{
		http_response_code(503);
		echo json_encode(array("massage"=>"nem sikerült létrehozni a filmet"));
	}
}else{
		http_response_code(400);
		echo json_encode(array("massage"=>"nem sikerült létrehozni a filmet"));
	}	
?>