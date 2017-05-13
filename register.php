<html>
<head>
	<title>Register Supplier</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="bootstrap-3.3.7-dist\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="javascript/jquery.min.js"></script>
	<script src="javascript/main.js"></script>
</head>

<body>
<div id="header" style="text-align: center;margin-bottom: 30px;">
	<a href="index.php"><img src="images/apotek-b.png" alt="Apotek-B"/></a>
</div>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$kode = $_POST['kode'];
	$name = $_POST['name'];
	$notelp = $_POST['notelp'];
	$almt = $_POST['alamat'];
	$pass = $_POST['password'];

	if($kode == "" || $pass == "" || $name == "" || $notelp == "" || $almt == "") {
		echo "<div id='account-form'>";
		echo "<div class='alert alert-danger'>Semua field harus diisi. Beberapa field ditemukan kosong.</div>";
		echo "<br/>";
		echo "<a href='register.php'>Kembali</a>";
		echo "</div>";
	} else {
		mysqli_query($mysqli, "INSERT INTO supplier(kd_supplier, nama_supplier, no_telp, alamat_kantor, password) VALUES('$kode', '$name', '$notelp', '$almt', md5('$pass'))")
			or die("Could not execute the insert query.");
		echo "<div id=\"container\">";
		echo "Pendaftaran akun berhasil!";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
		echo "</div>";
	}
} else {
?>
	<div id="account-form" style="width:700px;">
	<form name="form1" method="post" action="" >
		<h4>Pendaftaran Akun Supplier</h4>
		<br/>
		<table width="100%" border="0">
			<tr> 
				<td width="100%">
					<input type="text" name="kode" placeholder="Kode Supplier">
				</td>
			</tr>	
			<tr> 
				<td><input type="text" name="name" placeholder="Nama Lengkap"></td>
			</tr>			
			<tr> 
				<td><input type="text" name="notelp" placeholder="No. Telp"></td>
			</tr>
			<tr> 
				<td><textarea name="alamat" placeholder="Alamat Kantor"></textarea></td>
			</tr>
			<tr> 
				<td><input type="password" name="password" placeholder="Password"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
	</div>
<?php
}
?>
</body>
</html>
