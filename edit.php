<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
$judulHal = "Edit Data Obat";
include_once("connection.php");
include("header.php");

if(isset($_POST['update']))
{	
	$kode_obat = $_POST['kode_obat'];
	
	$nama_obat = $_POST['nama_obat'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];	
	
	// checking empty fields
	if(empty($nama_obat) || empty($stok) || empty($harga)) {
				
		if(empty($nama_obat)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($stok)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($harga)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE obat SET nama_obat='$nama_obat', stok='$stok', harga='$harga' WHERE kode_obat='$kode_obat'");
		echo "UPDATE obat SET nama_obat='$nama_obat', stok='$stok', harga='$harga' WHERE kode_obat='$kode_obat'";
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['kode_obat'];
$kode_supplier = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM obat WHERE kode_obat='$id' AND kd_supplier='$kode_supplier'");
if($res = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$name = $res['nama_obat'];
	$stok = $res['stok'];
	$harga = $res['harga'];
}
?>
<div id="content">
	<a class="btn btn-primary" href="index.php">Home</a> / <a class="btn btn-primary" href="view.php">View Products</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input class="form-control" type="text" name="nama_obat" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input class="form-control" type="number" name="stok" value="<?php echo $stok;?>"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input class="form-control" type="text" name="harga" value="<?php echo $harga;?>"></td>
			</tr>
			<tr>
				<td><input class="form-control" type="hidden" name="kode_obat" value=<?php echo $_GET['kode_obat'];?>></td>
				<td><input class="btn btn-primary" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>
