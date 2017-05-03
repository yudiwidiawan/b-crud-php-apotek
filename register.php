<html>
<head>
	<title>Register Supplier</title>
</head>

<body>
<a href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$kode = $_POST['kode'];
	$name = $_POST['name'];
	$notelp = $_POST['notelp'];
	$almt = $_POST['alamat'];
	$pass = $_POST['password'];

	if($kode == "" || $pass == "" || $name == "" || $notelp == "" || $almt == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO supplier(kd_supplier, nama_supplier, no_telp, alamat_kantor, password) VALUES('$kode', '$name', '$notelp', '$almt', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
	<p><font size="+2">Register Supplier</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Kode</td>
				<td><input type="text" name="kode"></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="name"></td>
			</tr>			
			<tr> 
				<td>No Hp</td>
				<td><input type="text" name="notelp"></td>
			</tr>
			<tr> 
				<td>Alamat Kantor</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
