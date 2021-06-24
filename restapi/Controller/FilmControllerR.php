<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../Model/Film.php');
require_once('../Connect/Connect.php');

$database = new Database();
$db = $database->getConnection();

$film = new Film($db);


//$filmekszama = $filmek->RowCount();

    $filmek = $film->read();


    while ($row = $filmek->fetch(PDO::FETCH_ASSOC)) {
        $tarolo = array(

        "cim" =>  $row['cim'],
        "szabadhely" => $row['szabadhely'],
        "jegyar" => $row['jegyar']
        );
            
        echo json_encode($tarolo);
    }
?>