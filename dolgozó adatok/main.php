<?php
include('conn.php');

if (isset($_POST['Kijelentkezés'])) {
    session_destroy();
    header('Location: index2.php');
}

if (isset($_POST['további'])) {
    header('Location: adatok.php');
}

if (isset($_POST['megtekintés'])) {
    header('Location: main1.php');
}

?>
<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="main.css" type="text/css">
    </head>
    
        <h1>Dolgozók(Admin)</h1>
        <form method='post' action="">
            <input  type="submit" value="Kijelentkezés" name="Kijelentkezés">
            <input  type="submit" value="további adatok felvitele" name="további">
            <input  type="submit" value="megtekintés" name="megtekintés">
        </form>

<?php


$select =mysqli_query($conn, "SELECT * FROM dolgozo");

?>
<br><br>
<table align="center" cellpadding="10" border="1" id="user_table">
<tr>
<th>Név</th>
<th>Telefonszám</th>
<th>E-mail</th>
<th>Személyigazolvány szám</th>
<th>TAJ-szám</th>
<th>Adószám</th>
<th>Bankszámlaszám</th>
<th>Anyja neve</th>
<th>Születési hely</th>
<th>Születési idő</th>
<th>Lakcím</th>
</tr>
<?php
while ($row=mysqli_fetch_assoc($select)) {
    ?>
 
  <td id="nev_val<?php echo $row['id']; ?>"><?php echo $row['nev']; ?></td>
  <td id="phNumber_val<?php echo $row['id']; ?>"><?php echo $row['tel']; ?></td>
  <td id="email_val<?php echo $row['id']; ?>"><?php echo $row['email']; ?></td>
  <td id="ID_val<?php echo $row['id']; ?>"><?php echo $row['szemigSzam']; ?></td>
  <td id="taj_val<?php echo $row['id']; ?>"><?php echo $row['TAJ']; ?></td>
  <td id="tax_val<?php echo $row['id']; ?>"><?php echo $row['ado']; ?></td>
  <td id="baNumber_val<?php echo $row['id']; ?>"><?php echo $row['bankszsz']; ?></td>
  <td id="mName_val<?php echo $row['id']; ?>"><?php echo $row['aNeve']; ?></td>
  <td id="pob_val<?php echo $row['id']; ?>"><?php echo $row['szulHely']; ?></td>
  <td id="dof_val<?php echo $row['id']; ?>"><?php echo $row['szulIdo']; ?></td>
  <td id="address_val<?php echo $row['id']; ?>"><?php echo $row['lakcim']; ?></td>
 </tr>
 <?php
}
?>