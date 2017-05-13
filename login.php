<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="bootstrap-3.3.7-dist\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="javascript/jquery.min.js"></script>
	<script src="javascript/main.js"></script>
</head>

<body>
<div id="header" style="text-align: center;margin-bottom: 50px;">
	<a href="index.php"><img src="images/apotek-b.png" alt="Apotek-B"/></a>
</div>
<div id="content">
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$kode_supplier = mysqli_real_escape_string($mysqli, $_POST['kode_supplier']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($kode_supplier == "" || $pass == "") {
		echo "<div id='account-form'>";
		echo "<div class='alert alert-danger'>";
		echo "Kode_supplier atau password kosong.";
		echo "</div>";
		echo "<br/><br/>";
		echo "<a href='login.php'>Kembali </a>";
		echo "</div>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM supplier WHERE kd_supplier='$kode_supplier' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['kd_supplier'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nama_supplier'] = $row['nama_supplier'];
			$_SESSION['kd_supplier'] = $row['kd_supplier'];
		} else {
			echo "<div id='account-form'>";
			echo "<div class='alert alert-danger'>";
			echo "Kode_supplier atau password salah.";
			echo "</div>";
			echo "<br/><br/>";
			echo "<a href='login.php'>Kembali </a>";
			echo "</div>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
	echo "<div id=\"account-form\">";
	echo "<form name=\"form1\" method=\"post\" action=\"login.php\">
		<h4>Masuk Akun</h4>
		<table width=\"100%\" border=\"0\">
			<tr> 
				<td><input type=\"text\" name=\"kode_supplier\" placeholder=\"Kode Supplier\"></td>
			</tr>
			<tr> 
				<td><input type=\"password\" name=\"password\" placeholder=\"Password\"></td>
			</tr>
			<tr> 
				<td><input type=\"submit\" name=\"submit\" value=\"Submit\"></td>
			</tr>
			<tr>
				<td id=\"tanyaakun\">Belum memiliki akun? <a href=\"register.php\">Daftar disini.</a></td>
			</tr>
		</table>
	</form>
	</div>";
}
?>
</div>
</body>
</html>
