<?php
$host = "localhost";
$userName = "root";
$pw = "";
$dbName = "user";



$conn = mysqli_connect($host, $userName, $pw, $dbName);


$conn->query("SET NAMES UTF8");
$conn->query("SET character set UTF8");
$conn->query("set collation_connection='UTF8_hungary_ci'");
/*
if (!($conn)) {
    echo "Hiba!";
} else {
    echo "Siker";
}*/
?>
