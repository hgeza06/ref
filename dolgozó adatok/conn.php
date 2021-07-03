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


Class Database {
   private $hostName;
   private $userName;
   private $password;
   private databaseName;

   public $conn;
  


  function getConnection(){
    $this->conn;

     try{
       $db = mysqli_connect($hostName, $userName, $password, $databaseName);
       if($db){
          echo 'Sikeres csatlakozás az adatbázishoz';
      }else{
          throw new Exception('Sikertelen kapcsolat az adatbázishoz');
      }
     }catch(Exception $e){
        echo $e->getMessage();
     }

      return $this->conn;

}

}
?>
