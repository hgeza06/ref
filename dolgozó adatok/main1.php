<?php include('conn.php'); 
if (isset($_POST['vissza'])) {
    header('Location: main.php');
}?>
<!doctype html>
<html>
    <head>
        <title>Dolgozók adatai - Admin</title>
    </head>
    <link rel="stylesheet" href="main.css" type="text/css">
        <h1>Egyéb adatok(Admin)</h1>
        <form method='post' action="">
        <input  type="submit" value="vissza" name="vissza">
        </form>
        

<?php


$select =mysqli_query($conn, "SELECT * FROM dolgozokadmin");

?>
<br><br>
<table align="center" cellpadding="10" border="1" id="user_table">
<tr>
<th>Név</th>
<th>Személyigazolvány szám</th>
<th>Szerződés Kelt:</th>
<th>Szerződés Lejár:</th>
<th>Fizetés</th>
<th>Munkaidő</th>
<th>Megjegyzés</th>
</tr>
<?php
while ($row=mysqli_fetch_assoc($select)) {
    ?>
  <td id="nev_val<?php echo $row['id']; ?>"><?php echo $row['nev']; ?></td>
  <td id="ID_val<?php echo $row['id']; ?>"><?php echo $row['szemigSzam']; ?></td>
  <td id="szerKelt_val<?php echo $row['id']; ?>"><?php echo $row['szerzodesKelt']; ?></td>
  <td id="szerLe_val<?php echo $row['id']; ?>"><?php echo $row['szerzodesLejart']; ?></td>
  <td id="fizetes_val<?php echo $row['id']; ?>"><?php echo $row['fizetes']; ?></td>
  <td id="ido_val<?php echo $row['id']; ?>"><?php echo $row['munkaido']; ?></td>
  <td id="megj_val<?php echo $row['id']; ?>"><?php echo $row['megjegyzes']; ?></td>
</td>
 </tr>
 <?php
}
?>