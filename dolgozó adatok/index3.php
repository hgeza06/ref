<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nev = $_POST['nev'];
    $phNumber = $_POST['phNumber'];
    $email = $_POST['email'];
    $ID = $_POST['ID'];
    $taj = $_POST['taj'];
    $tax = $_POST['tax'];
    $baNumber = $_POST['baNumber'];
    $mName = $_POST['mName'];
    $pob = $_POST['pob'];
    $dof = $_POST['dof'];
    $address = $_POST['address'];


    if ($conn->connect_error) {
        die('Nem sikreült az adatbázishoz való kapcsolódás: (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }

   // $sql_0 = "SELECT * FROM dolgozo WHERE nev='$nev'";
    $sql_1 = "SELECT * FROM dolgozo WHERE email='$email'";
    $sql_2 = "SELECT * FROM dolgozo WHERE szemigSzam='$ID'";
    $sql_3 = "SELECT * FROM dolgozo WHERE TAJ='$taj'";
    $sql_4 = "SELECT * FROM dolgozo WHERE ado='$tax'";
    $sql_5 = "SELECT * FROM dolgozo WHERE bankszsz='$baNumber'";

    
   // $res_0 = mysqli_query($conn, $sql_0);
    $res_1 = mysqli_query($conn, $sql_1);
    $res_2 = mysqli_query($conn, $sql_2);
    $res_3 = mysqli_query($conn, $sql_3);
    $res_4 = mysqli_query($conn, $sql_4);
    $res_5 = mysqli_query($conn, $sql_5);

   /* if (mysqli_num_rows($res_0) > 0) {
    }*/ if (mysqli_num_rows($res_1) > 0) {
    } elseif (mysqli_num_rows($res_2) > 0) {
    } elseif (mysqli_num_rows($res_3) > 0) {
    } elseif (mysqli_num_rows($res_4) > 0) {
    } elseif (mysqli_num_rows($res_5) > 0) {
    } else {
        if ($conn) {
            $sql=mysqli_query($conn, "INSERT INTO dolgozo (nev, tel, email, szemigSzam, TAJ, ado, bankszsz, aNeve, szulHely, szulIdo,
        lakcim) VALUES('$nev', '$phNumber', '$email', '$ID', '$taj', '$tax', '$baNumber', '$mName', '$pob', 
        '$dof', '$address')");
        } else {
            echo "Hiba!";
        }
        if (!$sql) {
            die('Error: ' . mysqli_error($conn));
            exit();
        } else {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Az adatokat siekresen rögzítettünk!');\n";
            echo "window.location='http://www.nagyvaty.hu'";
            echo "</script>";
            exit();
        }
    }

    header("location: index3.php");
    mysqli_close($conn);
}
?>
<script>
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

<!DOCTYPE html>
<html>
    <head>
        <title>Dolgozó adatai</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="index3.css" type="text/css">
    </head>
    <body>
    <div id="container">
        <form id="reg" action="index3.php" method="post">
            <fieldset>
                <legend>Dolgozó Adatai</legend>
                <ol>
                    <li>
                        <label for="nev">Név<em>*</em></label>
                        <input id="nev" type="text"  name="nev" required/>
                    </li> <li>
                        <label for="phNumber">Telefonszám<em>*</em></label>
                        <input id="phNumber" type="text"  name="phNumber" required/>
                    </li><li>
                        <label for="email">E-mail<em>*</em></label>
                        <input id="email" type="email" name="email" required/>
                    </li>
                   <li>
                        <label for="ID">Személyigazolvány szám<em>*</em></label>
                        <input id="ID" type="text" name="ID" required/>
                    </li>                    <li>
                        <label for="taj">TAJ-szám<em>*</em></label>
                        <input id="taj" type="text"  name="taj" required/>
                    </li><li>
                        <label for="tax">adószám<em>*</em></label>
                        <input id="tax" type="text" name="tax" required/>
                    </li>                    <li>
                        <label for="baNumber">Bankszámlaszám<em>*</em></label>
                        <input id="baNumber" type="text"  name="baNumber" required/>
                    </li><li>
                        <label for="mName">Anyja Neve<em>*</em></label>
                        <input id="mName" type="text" name="mName" required/>
                    </li>                    <li>
                        <label for="pob">Születési hely<em>*</em></label>
                        <input id="pob" type="text"  name="pob" required/>
                    </li><li>
                        <label for="dof">Születési idő<em>*</em></label>
                        <input id="dof" type="text" name="dof" required/>
                    </li>                    <li>
                        <label for="address">Lakcím<em>*</em></label>
                        <input id="address" type="text"  name="address" required/>
                    </li><li>

                </ol>
            </fieldset>
            <input type="submit" value="OK"/>
            <a href="useradmin.php">Vissza</a>
        </form>
    </div>
</table> 
</body>
</html>