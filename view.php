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
$judulHal = 'Lihat Data Obat';
include('header.php');
include('form_add.php');
$result = mysqli_query($mysqli, "SELECT * FROM obat WHERE kd_supplier='".$_SESSION['kd_supplier']."' ORDER BY kode_obat DESC");
?>
	<div id="content">
	<a class="btn btn-primary" href="index.php">Home</a>
	<br/><br/>
	<h3>Data Obat </h3>
	<table width='100%' class='table-bordered'>
		<tr>
			<th>Kode Obat</th>
			<th>Nama Obat</th>
			<th>Jenis Obat</th>
			<th>Harga(Rupiah)</th>
			<th>Update</th>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {		
			echo "<tr>";
			echo "<td>".$res['kode_obat']."</td>";
			echo "<td>".$res['nama_obat']."</td>";
			echo "<td>".$res['jenis']."</td>";
			echo "<td>".$res['harga']."</td>";
			echo "<td><a href=\"edit.php?kode_obat=$res[kode_obat]&id=$res[kd_supplier]\">Edit</a> | <a href=\"delete.php?kode_obat=$res[kode_obat]&id=$res[kd_supplier]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
	<a id="tambah-button" class="btn btn-success add-button">Tambah Obat</a>
	</div>
</body>
</html>
<?php 
include('footer.php');
?>