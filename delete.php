<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$id = $_GET['kode_obat'];
$kode_supplier = $_GET['id'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM obat WHERE kode_obat='".$id
	."' AND kd_supplier='" .$kode_supplier ."'");
//redirecting to the display page (view.php in our case)
header("Location:view.php");
?>

