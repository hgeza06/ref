<?php
include('conn.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST['email']))) {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Kérem írja be az e-mail címét!');\n";
        echo "window.location='index2.php'";
        echo "</script>";
    } elseif (empty(trim($_POST['passw']))) {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Kérem írja be a jelszavát!');\n";
        echo "window.location='index2.php'";
        echo "</script>";
    } else {
        $email = $_POST['email'];
        

        $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        $jelszo = mysqli_fetch_assoc($select);
        $passw = password_verify($_POST['passw'], $jelszo);
        
        if (!mysqli_num_rows($select)>0) {
            echo "Sikertelen bejelentkezés!";
            exit();
        } else {
            if (password_verify($_POST['passw'], $jelszo['password'])) {
                header("location: main.php");
                exit();
            }
        }
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
        <title>Bejelentkezés</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="index3.css" type="text/css">
    </head>
<body>
</form>
<div id="container">
        <form id="reg" action="index2.php" method="post">
            <fieldset >
                <legend>Bejelentkezés</legend>
                <ol>
                    <li>
                        <label for="email">E-mail<em>*</em></label>
                        <input type="email" name="email" id="email" required>
                    </li><li>
                        <label for="passw">Jelszó<em>*</em></label>
                        <input id="passw" type="password" name="passw" required/>
                    </li>
                </ol>
            </fieldset>
            <input type="submit" value="Bejelentkezés" name="Bejelentkezés"/>
            <a href="index.php">Regisztráció</a>
        </form>
    </div>
</body>
</html>