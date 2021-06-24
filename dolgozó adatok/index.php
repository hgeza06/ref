<?php

include('conn.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST['email']))) {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Kérem írja be az e-mail címét!');\n";
        echo "window.location='index.php'";
        echo "</script>";
    } elseif (empty(trim($_POST['passw']))) {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Kérem írja be a jelszavát!');\n";
        echo "window.location='index.php'";
        echo "</script>";
    } else {


        $email = $_POST['email'];
        $passw = password_hash($_POST['passw'], PASSWORD_BCRYPT);
        
        if ($conn->connect_error) {
            die('Nem sikreült az adatbázishoz való kapcsolódás: (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }

        $sql_1 = "SELECT * FROM users WHERE email='$email'";
    
        $res_1 = mysqli_query($conn, $sql_1);
        
        if (mysqli_num_rows($res_1) > 0) {
        } else {
            if (!($sql = $conn->prepare("INSERT INTO users(email, password) VALUES (?, ? ) "))) {
                echo "Hiba!: (" . $mysqli->errno . ") " . $mysqli->error;
            }
        
            if (!$sql->bind_param('ss', $email, $passw)) {
                die('Hiba!: (' . $conn->errno . ') ' . $conn->error);
            }
        
            if (!$sql->execute()) {
                die('Hiba! ' . $conn->error);
            }
            $sql->close();
            $conn->close();
            header("location: http://localhost/doga/index2.php");
        }
    }
}
?>  

<!DOCTYPE html>
<html lang="hu">
<head>
        <title>Regisztráció</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="index3.css" type="text/css">
    </head>
<body>
</form>
<div id="container">
        <form id="reg" action="index.php" method="post">
            <fieldset >
                <legend>Regisztráció</legend>
                <ol>
                    <li>
                        <label for="email">E-mail<em>*</em></label>
                        <input type="email" name="email" id="email">
                    </li><li>
                        <label for="passw">Jelszó<em>*</em></label>
                        <input id="passw" type="password" name="passw"/>
                    </li>
                </ol>
            </fieldset>
            <input type="submit" value="Regisztráció"/>
            <a href="index2.php">Bejelentkezés</a>
            <a href="useradmin.php">Vissza</a>
        </form>
    </div>
</body>
</html>