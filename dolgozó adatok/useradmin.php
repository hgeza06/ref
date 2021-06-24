<?php

if (isset($_POST['admin'])) {
    $writePassword = $_POST['passw'];
    $password = "1564891651AD";
 
    if ($writePassword == $password) {
        header("location: index.php");
        exit();
    } elseif ($writePassword != $password || $writePassword == '') {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Helytelen jelszó, vagy üresen hagyott mező!');\n";
        echo "window.location='useradmin.php'";
        echo "</script>";
        exit();
    }
}

    if (isset($_POST['dolgozó'])) {
        $writePassword1 = $_POST['passw1'];
        $passwordDolgozo = "1564891651ADa";

        if ($writePassword1 == $passwordDolgozo) {
            header("location: index3.php");
            exit();
        } elseif ($writePassword != $passwordDolgozo) {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Helytelen jelszó, vagy üresen hagyott mező!');\n";
            echo "window.location='useradmin.php'";
            echo "</script>";
            exit();
        }
    }
?>
<script>

function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
<!DOCTYPE html>
<html lang="hu">
<head>
        <title>Dolgozói Űrlap</title>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="useradmin.css" type="text/css">
    </head>
<body>
<div id="container">
    <form id="reg" action="useradmin.php" method="post">
    <legend>
        <fieldset>
         <ol>
                    <li>
                        <label for="passw">Admin - Jelszó</label>
                        <input id="passw" type="password" name="passw" />
                    </li>
        </ol>
        </fieldset>
        <fieldset>
            <ol>
                    <li>
                        <label for="passw1">Dolgozó - Jelszó</label>
                        <input id="passw1" type="password" name="passw1" />
                    </li>
            </ol>
                    </fieldset>
          
           <input type="submit" value="admin" name="admin"/>

           <input type="submit" value="dolgozó" name="dolgozó"/>    
            
            
    </legend>
    </form>
</div>
<br>

</body>
</html>