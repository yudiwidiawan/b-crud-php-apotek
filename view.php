<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM obat WHERE kd_supplier='".$_SESSION['kd_supplier']."' ORDER BY kode_obat DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Kode Obat</td>
			<td>Nama Obat</td>
			<td>Jenis Obat</td>
			<td>Harga(Rupiah)</td>
			<td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['kode_obat']."<td>";
			echo "<td>".$res['nama_obat']."</td>";
			echo "<td>".$res['jenis']."</td>";
			echo "<td>".$res['harga']."</td>";	
			echo "<td><a href=\"edit.php?kd_supplier=$res[kd_supplier]\">Edit</a> | <a href=\"delete.php?kode_obat=$res[kode_obat]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
