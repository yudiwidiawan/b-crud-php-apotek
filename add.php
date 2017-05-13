<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php
//including the database connection file
$judulHal = 'Form Tambah Data Obat';
include('header.php');
include_once("connection.php");
echo "<div id='content'>";
if(isset($_POST['Submit'])) {	
	$kode_obat = $_POST['kode_obat'];
	$nama_obat = $_POST['nama_obat'];
	$jenis = $_POST['jenis'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$loginId = $_SESSION['kd_supplier'];
		
	// checking empty fields
	if(empty($kode_obat) || empty($nama_obat) || empty($jenis) || empty($harga) || empty($stok)) {
				
		if(empty($kode_obat)) {
			echo "<div class='alert alert-danger'>Kode obat kosong.</div>";
		}
		
		if(empty($nama_obat)) {
			echo "<div class='alert alert-danger'>Nama obat kosong.</div>";
		}
		
		if(empty($jenis)) {
			echo "<div class='alert alert-danger'>Jenis obat kosong.</div>";
		}
		
		if(empty($harga)) {
			echo "<div class='alert alert-danger'>Harga obat kosong.</div>";
		}

		if(empty($stok)) {
			echo "<div class='alert alert-danger'>Stok obat belum di isi.</div>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Kembali </a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO obat(kode_obat, nama_obat, jenis, harga, kd_supplier) VALUES('$kode_obat','$nama_obat','$jenis', '$harga', '$loginId')");
		
		//display success message

		echo "<div class='alert alert-success'>Data berhasil ditambahkan.</div>";
		echo "<br/><a href='view.php'>Lihat Hasil</a>";
	}
} else {

?>
<div id="account-form" class="data-obat">
	<form action="" method="post" name="form1">
		<h4>Tambah Data Obat</h4>
		<table width="100%" border="0">
			<tr> 
				<td><p>Kode Obat</p></td>
				<td><input type="text" name="kode_obat"></td>
			</tr>
			<tr> 
				<td><p>Nama Obat</p></td>
				<td><input type="text" name="nama_obat"></td>
			</tr>
			<tr> 
				<td><p>Jenis</p></td>
				<td><input type="text" name="jenis"></td>
			</tr>
			<tr>
				<td><p>Harga</p></td>
				<td><input type="text" name="harga"></td>
			</tr>
			<tr>
				<td><p>Stok</p></td>
				<td><input type="number" name="stok"></td>
			</tr>
			<tr>  
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	</div>
<?php 
}
echo "</div>";
include('footer.php');
?>
</body>
</html>
