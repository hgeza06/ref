<?php
include('conn.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nev = $_POST['nev'];
    $ID = $_POST['ID'];
    $szerKelt = $_POST['szerKelt'];
    $szerLe = $_POST['szerLe'];
    $fizetes = $_POST['fizetes'];
    $ido = $_POST['ido'];
    $megj = $_POST['megj'];
    

    if ($conn->connect_error) {
        die('Nem sikreült az adatbázishoz való kapcsolódás: (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }

    $sql_0 = "SELECT * FROM dolgozokadmin WHERE szemigSzam='$ID'";
    $res_0 = mysqli_query($conn, $sql_0);

if(mysqli_num_rows($res_0)>0){

}   else {
    if ($conn) {
        $sql=mysqli_query($conn, "INSERT INTO dolgozokadmin (nev, szemigSzam, szerzodesKelt, szerzodesLejart, fizetes, munkaido, megjegyzes) 
            VALUES('$nev', '$ID', '$szerKelt', '$szerLe', '$fizetes', '$ido', '$megj')");
    } else {
        echo "Hiba!";
    }
    if (!$sql) {
        die('Error: ' . mysqli_error($conn));
        exit();
    } else {
        header("location: main1.php");
        exit();
    }
} 
 
    header("location: adatok.php");
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>További adatok felvitele</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="index3.css" type="text/css">
    </head>
    <body>
    <div id="container">
        <form id="reg" action="adatok.php" method="post">
            <fieldset>
                <legend>Dolgozó Adatai - egyéb</legend>
                <ol>
                    <li>
                        <label for="nev">Név<em>*</em></label>
                        <input id="nev" type="text"  name="nev"/>
                    </li><li>
                        <label for="ID">Személyigazolvány szám<em>*</em></label>
                        <input id="ID" type="text"  name="ID"/>
                    </li> <li>
                        <label for="szerKelt">Szerződés Kelt:<em>*</em></label>
                        <input id="szerKelt" type="text"  name="szerKelt" />
                    </li><li>
                        <label for="szerLe">Szerződés Lejárt:<em>*</em></label>
                        <input id="szerLe" type="text" name="szerLe" />
                    </li>
                   <li>
                        <label for="fizetes">Fizetés(/hó)<em>*</em></label>
                        <input id="fizetes" type="text" name="fizetes" />
                    </li><li>
                        <label for="ido">Munkaidő(/nap)<em>*</em></label>
                        <input id="ido" type="text"  name="ido" />
                    </li><li>
                        <label for="megj">Megjegyzés<em>*</em></label>
                        <textarea id="megj" rows="4" cols="30" name="megj"></textarea>
                    </li>            
                </ol>
            </fieldset>
            <input type="submit" name ="OK" value="OK"/>
            <a href="main.php">Vissza</a>
        </form>
    </div>
</table> 
</body>
</html>