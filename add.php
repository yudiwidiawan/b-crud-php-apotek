<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$kode_obat = $_POST['kode_obat'];
	$nama_obat = $_POST['nama_obat'];
	$jenis = $_POST['jenis'];
	$harga = $_POST['harga'];
	$loginId = $_SESSION['kd_supplier'];
		
	// checking empty fields
	if(empty($kode_obat) || empty($nama_obat) || empty($jenis) || empty($harga)) {
				
		if(empty($kode_obat)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($nama_obat)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($jenis)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		
		if(empty($harga)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO obat(kode_obat, nama_obat, jenis, kd_supplier) VALUES('$kode_obat','$nama_obat','$jenis', '$loginId')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>
</body>
</html>
